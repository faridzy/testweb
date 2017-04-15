<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class WCIFX_Model extends CI_Model{
	protected $ID;
	protected $isLogin 	= false;
	protected $isAdmin 	= false;
	protected $isMember = false;
	protected $langID 	= false;
    protected $admUrl; //untuk settingan url admin , karena nanti dibuat acak
	function __construct(){
		parent::__construct();
        $this->admUrl   = $this->config->item('WCIFX_admin_url');
        $this->ID       = 1;
		// $this->ID = $this->session->userdata('ID');
	}
	function _post($f , $xss = true){
		return $this->input->post($f , $xss);
	}
	function setCore($key , $value){
        $cek = $this->getCore($key);
        $ins['webcore_value']  = $value;
        if($cek === false){
            $ins['webcore_key']	= $key;
            $this->db->insert('webcore' , $ins);
        }else{
	        $this->db->where('webcore_key' , $key);
	        $this->db->update('webcore' , $ins);
        }
    }
    
    function getCore($key){
        // $this->db->cache_on(); Enable this in production
        $this->db->select("webcore_value");
        $this->db->from("webcore");
        $this->db->where("webcore_key" , $key);
        $q = $this->db->get();
        if($q->num_rows() > 0){
            $dt = $q->row();
            return $dt->webcore_value;
        }else{
            return false;
        }
    }
    function deleteCore(){  }
    function myProfile($member_id){

    }
}