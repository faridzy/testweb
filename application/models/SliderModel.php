<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class SliderModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
    function getSlider(){ 
        $data = $this->PostModel->getPosts(['post_type' => 'slider',
                                            'postmeta' => true,
                                            'limit' => '4'
                                            ]);
        return $data;
    }

    function getDatatable(){
    	$array = array("post_id", "title", "status");
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
    	}

    	$order = $this->_post('order');
        $column = isset($order[0]['column'])?$order[0]['column']:-1;
        if($column >= 0 && $column < count($array)){
            $ord = $array[$column];
            $by = $order[0]['dir'];
            $this->db->order_by($ord , $by);
        }

        $this->db->select("SQL_CALC_FOUND_ROWS post_id, title, status" ,FALSE);
        $this->db->where('post_type', 'slider');
        $this->db->from("post");
        $sql = $this->db->get();
        $q = $sql->result();
        $this->db->select("FOUND_ROWS() AS total_row");
        $row = $this->db->get()->row();

        $sEcho = $this->_post('draw');
        $getCountAll = $this->getCountSlider();
        $output = array(
            "draw" => intval($sEcho),
            "recordsTotal" => $getCountAll,
            "recordsFiltered" => $row->total_row,
            "data" => array()
        );

        foreach ($q as $val) {
        $act = '<a href="'.site_url('admin/web-content/delete-post/slider/'.$val->post_id).'" class="btn btn-danger">Delete</a>
        		<a href="'.site_url('admin/web-content/edit-post/'.$val->post_id).'" class="btn btn-warning">Edit</a>';

        $output['data'][] = array(
            $val->post_id,
            translate($this, $val->title),
            $val->status,
            $act
            );
    	}
        return $output;
    }
    function getCountSlider(){
    	return 10;
    }

}