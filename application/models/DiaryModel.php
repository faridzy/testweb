<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class DiaryModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function like(){

	}
	function unlike(){ }
	function comment(){

	}
	function deleteComment(){

	}
	function addDiary(){
		//postModel.addPost()
		//foreach(diary_tag as tag){
		//	getTermByName(tag) if false addTerm
		//  TermModel.setTermRelation($post_id , $term_id, 'diary_tag','post') 
		//}
	}
	function share(){

	}
	function editDiary(){ }
	function getDatatable(){
		$array = array("post_id", "title", "date_created");
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
			$this->db->or_like('date_created', $key);
		}

		$order = $this->_post('order');
	    $column = isset($order[0]['column'])?$order[0]['column']:-1;
	    if($column >= 0 && $column < count($array)){
	        $ord = $array[$column];
	        $by = $order[0]['dir'];
	        $this->db->order_by($ord , $by);
	    }

	    $this->db->select("SQL_CALC_FOUND_ROWS post_id, title, date_created" ,FALSE);
	    $this->db->where('post_type', 'diary');
	    $this->db->from("post");
	    $sql = $this->db->get();
	    $q = $sql->result();
	    $this->db->select("FOUND_ROWS() AS total_row");
	    $row = $this->db->get()->row();

	    $sEcho = $this->_post('draw');
	    $getCountAll = $this->getCountDiary();
	    $output = array(
	        "draw" => intval($sEcho),
	        "recordsTotal" => $getCountAll,
	        "recordsFiltered" => $row->total_row,
	        "data" => array()
	    );

	    foreach ($q as $val) {
        $act = '<a href="'.site_url('admin/web-content/delete-post/diary/'.$val->post_id).'" class="btn btn-danger">Delete</a>
        		<a href="'.site_url('admin/web-content/edit-post/'.$val->post_id).'" class="btn btn-warning">Edit</a>';
        $tags 	= 'tags';
        $member = 'member';

        $output['data'][] = array(
            $val->post_id,
            translate($this, $val->title),
            $val->date_created,
            $tags,
            $member,
            $act
            );
    	}
        return $output;
	}
	function getCountDiary(){
		return 10;
	}
	
	function getListDiary($limit = 10 , $where = array()){

	}
}