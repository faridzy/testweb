<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PageModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function getPageTemplate($slug){
		//get postmeta "page_template" 
		$data = $this->PostModel->getSinglePost($slug , 'slug' , null , true);
		return $data;
	}
	function getDatatable(){
		$array = array("post_id", "title", "author", "status");
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

	    $this->db->select("SQL_CALC_FOUND_ROWS post_id, title, author, status" ,FALSE);
	    $this->db->where('post_type', 'page');
	    $this->db->from("post");
	    $sql = $this->db->get();
	    $q = $sql->result();
	    $this->db->select("FOUND_ROWS() AS total_row");
	    $row = $this->db->get()->row();

	    $sEcho = $this->_post('draw');
	    $getCountAll = $this->getCountPage();
	    $output = array(
	        "draw" => intval($sEcho),
	        "recordsTotal" => $getCountAll,
	        "recordsFiltered" => $row->total_row,
	        "data" => array()
	    );

	    foreach ($q as $val) {
        $act = '<a href="'.site_url('admin/web-content/delete-post/page/'.$val->post_id).'" class="btn btn-danger">Delete</a>
        		<a href="'.site_url('admin/web-content/edit-post/'.$val->post_id).'" class="btn btn-warning">Edit</a>';

        $output['data'][] = array(
            $val->post_id,
            translate($this,$val->title),
            $val->author,
            statusPost($val->status),
            $act
            );
    	}
        return $output;
	}
	function getCountPage(){
		return 10;
	}	
}