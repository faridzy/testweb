<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PostModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function addPost($post_type , $post_data){
		$defaults = array(
				'title' 	=> '',
				'content' 	=> '',
				'parent' 	=> 0,
				'status' 	=> 1,
		);
		$data = array_merge($defaults , $post_data);
		$data['author']	= $this->ID;
        $slug           = ($data['slug'] == '')?(translate($this , $data['title'] , $data['title'])) : $data['slug'];
		$data['slug']	= $this->generateSlug($slug  , $post_type);
		$data['date_created']	= myDate();
		$data['date_updated']	= myDate();
		$data['post_type']		= $post_type;
		$this->db->insert('post' , $data);
		return $this->db->insert_id();
	}
	function updatePost($post_id , $post_data){
        $slug           = ($post_data['slug'] == '')?(translate($this , $post_data['title'] , $post_data['title'])) : $post_data['slug'];
        $post_data['slug']   = $this->generateSlug( $slug  , $post_type);
        $this->db->where('post_id' , $post_id);
        $this->db->update("post" , $post_data);
	}
	function deletePost($post_id){
        $checkmeta = $this->getAllPostMeta($post_id);
        if ($checkmeta != null) {
            $this->db->from('postmeta');
            $this->db->where('post_id', $post_id);
            $this->db->delete();
        }
        $this->db->from('post');
        $this->db->where('post_id', $post_id);
        $this->db->delete();
        //delete form post
        //delete form term relation
        //delete postmeta
	}
	function setPostMeta($post_id , $meta_key , $val){
		$data['meta_value']	= $val;
		$check = $this->getPostMeta($post_id , $meta_key);
		if($check === false){
			$data['post_id'] 	= $post_id;
			$data['meta_key'] 	= $meta_key;
			$this->db->insert('postmeta' , $data);
		}else{
			$this->db->where('post_id' , $post_id);
			$this->db->where('meta_key' , $meta_key);
			$this->db->update('postmeta' , $data);
		}
	}
	function getPostMeta($post_id , $meta_key){ //$meta_key bisa single atau array
		$this->db->select('meta_key , meta_value');
		$this->db->from('postmeta');
		if(is_array($meta_key)){
			$this->db->where_in('meta_key' , $meta_key );
            $this->db->where("post_id" , $post_id);
			$q = $this->db->get()->result();
			if($q != null){
				foreach ($q as $item) {
					$data[$item->meta_key] = $item->meta_value;
				}
			}
			$meta_key = array_flip($meta_key);
			$meta_key = array_map(function($val){ return false;}, $meta_key); // to reset val to false
			$data 	= array_merge($meta_key , $data);
		}else{
            $this->db->where("post_id" , $post_id);
			$this->db->where("meta_key" , $meta_key);
			$q = $this->db->get()->row();
			$data = ($q != null) ? $q->meta_value : false;
		}
		return $data;
	}
	function getAllPostMeta($post_id){
        $this->db->select("meta_key , meta_value");
        $this->db->from('postmeta');
        $this->db->where("post_id" , $post_id);
        $q      = $this->db->get()->result();
        $data   = array();
        if($q){
            foreach ($q as $value) {
                $data[$value->meta_key] = $value->meta_value;
            }
            return $data;
        }else{
            return false;
        }
        return ($q != null) ? $q->meta_value : null;
	}
	function generateSlug($name , $post_type , $old_ID = null){
        if($old_ID != null){
            $get = $this->getSinglePost(  $old_ID );
            if($get != null){
                if(strtolower($name) == strtolower($get->name))
                    return $get->slug;
            }
        }
        $slug       = url_title($name , "-" , TRUE);
        $args 	= array(
        				'post_type' => $post_type,
        				'limit' 	=> -1,
        				'where' 	=> array(
                                            array(
    	        								'operator'	=> 'and',
    	        								'key'		=> 'title',
    	        								'value'		=> $name,
        								    )
                                        )
        			);
        $getPosts    = $this->getPosts($args);
        $count      = count($getPosts);
        $slug       = ($count > 0) ? $slug."-".($count + 1) : $slug;
        return $slug;
    }
    function getSinglePost($val , $key = 'post_id' , $post_type = null , $postmeta = false){
    	$this->db->select("*");
    	$this->db->from('post');
    	if($post_type != null){
    		$this->db->where( 'post_type' , $post_type);
    	}
    	$this->db->where($key , $val);
    	$data = $this->db->get()->row();
        if($data != null && $postmeta){
            $data->meta = $this->getAllPostMeta($data->post_id);
        }
        return $data;
    }
    function getPosts($args){
    	$defaults = array(
    				'post_type' => 'post',
    				'limit' 	=> 100,
    				'order_by' 	=> '',
    				'order' 	=> 'DESC',
    				'where'		=> array(),
                    'postmeta'  => false
    			);
    	$cond = array_merge($defaults , $args);
    	$this->db->select("*");
    	$this->db->from("post");
    	if($cond['post_type'] != ''){
    		$this->db->where("post_type" , $cond['post_type']);
    	}
    	if($cond['order_by'] != ''){
    		$this->db->order_by($cond['order_by'] , $cond['order']);
    	}
    	if($cond['limit'] > 0 ){
    		$this->db->limit($cond['limit']);
    	}
    	if($cond['where'] != null){
    		foreach ($cond['where'] as $val) {
    			if(strtolower($val['operator']) == 'and'){
    				$this->db->where($val['key'] , $val['value']);
    			}else{
    				$this->db->or_where($val['key'] , $val['value']);
    			}
    		}
    	}
        $data = $this->db->get()->result();
        if($cond['postmeta']){
            if($data != null){
                foreach ($data as $key => $val) {
                    $val->meta = $this->getAllPostMeta($val->post_id);
                    $data[$key] = $val;
                }
            }
        } 
    	return $data;
    }
}