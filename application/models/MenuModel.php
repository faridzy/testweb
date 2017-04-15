<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MenuModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
		$this->load->helper("Menu");
	}
	function getMenuHtml($menu_pos){
		$data = '';
		switch ($menu_pos) {
			case 'primary':
				$getMenu = $this->getCore('wcifx_menu_primary');
				$getMenu = ($getMenu) ? $this->setMenuHierarchy(unserialize($getMenu)) : null ;
				$data 	= primaryMenu($getMenu);
			break;
			case 'footer1-left':
				$data = footer1MenuLeft($getMenu);
			break;
			case 'footer1-right':
				$data = footer1MenuRight($getMenu);
			break;
			case 'footer2':
				$getMenu = $this->getCore('wcifx_menu_footer2');
				$getMenu = ($getMenu) ? $this->setMenuHierarchy(unserialize($getMenu)) : null ;
				$data = footer2Menu($getMenu);
			break;
		}
		return $data;
	}
	function setMenuHierarchy($listMenu){
		if($listMenu == null)
			return $listMenu;
		$data = array();
		$base_url = base_url();
		foreach ($listMenu as $menu) {
			$slug = '';
			$parentID = (int)$menu->parent;
			if($menu->type == 'custom'){
				$slug = $menu->object;
			}else{
				$slug 	= myPermalink($this , $menu->object);//get slug from tb_post
			}
			if(isset($data[$parentID])){ // submenu level 1
				$slug = $data[$parentID]['slug'].'/'.$slug;
				$data[$menu->parent]['child'][$menu->menu_item_id] = array(
																'item_id'=>$menu->menu_item_id,
																'title' => $menu->name,
																'type' 	=> $menu->type,
																'slug' 	=> $slug,
																'object'=> $menu->object,
																'child' => array()
															);
			}else{ // top level

				$data[$menu->menu_item_id] = array(
											'item_id'=>$menu->menu_item_id,
											'title' => $menu->name,
											'type' 	=> $menu->type,
											'slug' 	=> $slug,
											'object'=> $menu->object,
											'child' => array()
										);
			}
		}
		return $data;
	}
	function getDatatable(){
		$array = array("menu_id", "name", "status");
		$start = $this->_post('start');
		$offset = $this->_post('length');
		if($start !=null && $offset !=null){
			$this->db->limit($start,$offset);
		}

		$search = $this->_post('search');
		if ($search['value'] !=''){
			$key = $search['value'];
			$this->db->like('post_id', $key);
			$this->db->or_like('title', $key);
			$this->db->or_like('author', $key);
		}

		$order = $this->_post('order');
	    $column = isset($order[0]['column'])?$order[0]['column']:-1;
	    if($column >= 0 && $column < count($array)){
	        $ord = $array[$column];
	        $by = $order[0]['dir'];
	        $this->db->order_by($ord , $by);
	    }

	    $this->db->select("SQL_CALC_FOUND_ROWS *" ,FALSE);
	    $this->db->from("menu");
	    $sql = $this->db->get();
	    $q = $sql->result();
	    $this->db->select("FOUND_ROWS() AS total_row");
	    $row = $this->db->get()->row();

	    $sEcho = $this->_post('draw');
	    $getCountAll = $this->getCountMenu();
	    $output = array(
	        "draw" => intval($sEcho),
	        "recordsTotal" => $getCountAll,
	        "recordsFiltered" => $row->total_row,
	        "data" => array()
	    );

	    foreach ($q as $val) {
        $act = '<a href="'.site_url($this->admUrl.'/settings/menu-delete/'.$val->menu_id).'" class="btn btn-danger">Delete</a>
        		<a href="'.site_url($this->admUrl.'/settings/menu-add/'.$val->menu_id).'" class="btn btn-warning">Edit</a>';

        $output['data'][] = array(
            $val->menu_id,
            translate($this,$val->name),
            statusPost($val->status),
            $act
            );
    	}
        return $output;
	}
	function getCountMenu(){
		$this->db->select("count(*) as total");
		$this->db->from("menu");
		$q = $this->db->get()->row();
		return $q->total;
	}
	function getMenu($val , $field = 'mn.menu_id'){
		$this->db->select('item.* , mn.name as menu_title');
		$this->db->from('menu_item as item');
		$this->db->join('menu as mn' , 'mn.menu_id=item.menu_id');
		$this->db->where($field , $val);
		return $this->db->get()->result();

	}
	function addMenu(){
		//add menu ke table menu
		$menuTitle	= setTranslate($this->_post('menu_title'));
		$this->db->insert('menu' , [ 'name'=>$menuTitle , 'status'=>1 ]);
		$menuId 	= $this->db->insert_id();
		$this->setMenuItem($menuId);
		redirect(site_url($this->admUrl.'/settings/menu-add/'.$menuId));
	}
	function editMenu($menu_id){
		$menuTitle	= setTranslate($this->_post('menu_title'));
		$this->db->where('menu_id' , $menu_id);
		$this->db->update('menu' , [ 'name'=>$menuTitle]);
		$this->setMenuItem($menu_id);
		redirect(site_url($this->admUrl.'/settings/menu-add/'.$menu_id));
	}
	function deleteMenu($menu_id){
		$this->db->where('menu_id' , $menu_id);
		$this->db->delete('menu');
		redirect(site_url($this->admUrl.'/settings/menu'));
	}
	function setMenuItem($menu_id){
		$menuItemAdd= [];
		$menuItemUpd= [];
		$menuItemDel= $this->_post('item_delete');
		$menuData 	= json_decode($this->_post('menu_data')); 
		if($menuData != null){
			$no = 0;
			foreach ($menuData as $item) {
				$no++;
				$itemTitle	= setTranslate($this->_post('item_title_'.$item->item_id)); 
				$itemType	= $this->_post('item_type_'.$item->item_id); 
				$itemObj	= $this->_post('item_object_'.$item->item_id); 
				$itemNew	= $this->_post('item_new_'.$item->item_id); 
				$menuItem 	= [
								'menu_id' 	=> $menu_id,
								'name' 		=> $itemTitle,
								'type' 		=> $itemType,
								'object' 	=> $itemObj,
								'parent' 	=> (int)$item->parent_id,
								'sort_order'=> $no
							];
				if($itemNew == 'true'){
					$menuItemAdd[] 	= $menuItem;
				}else{
					$menuItem['menu_item_id']	= $item->item_id;
					$menuItemUpd[]	= $menuItem;
				}
			}
		}
		if($menuItemAdd != null){
			$this->db->insert_batch('menu_item' , $menuItemAdd);
		}
		if($menuItemUpd != null){
			$this->db->update_batch('menu_item' , $menuItemUpd , 'menu_item_id');
		}
		if($menuItemDel != null){
			$this->db->where_in('menu_item_id' , $menuItemDel);
			$this->db->delete('menu_item');
		}
	}
}

// $menu_item = array(
// 					array(
// 						'item_id'	=> 'nomor urut',
// 						'type' 	=> 'post|custom',
// 						'title' => 'title',
// 						'object'=> 'post_id|link',
// 						'parent'	=> 'item_id',
// 					),
// 					array(
// 						'item_id'	=> 'nomor urut',
// 						'type' 	=> 'post|custom',
// 						'title' => 'title',
// 						'object'=> 'post_id|link',
// 						'parent'	=> 'item_id',
// 					)
// 				)
//referensi menu : http://ilikenwf.github.io/example.html