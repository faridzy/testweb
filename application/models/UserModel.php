<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();

	}
	function getDatatable(){
		$array = array("user_id", "username", "email", "role_id", "status");
		$start = $this->_post('start');
		$offset = $this->_post('length');
		if($start !=null && $offset !=null){
			$this->db->limit($start,$offset);
		}

		$search = $this->_post('search');
		if ($search['value'] !=''){
			$key = $search['value'];
			$this->db->like('user_id', $key);
			$this->db->or_like('username', $key);
			$this->db->or_like('email', $key);
			$this->db->or_like('role_id', $key);
			$this->db->or_like('status', $key);
		}

		$order = $this->_post('order');
	    $column = isset($order[0]['column'])?$order[0]['column']:-1;
	    if($column >= 0 && $column < count($array)){
	        $ord = $array[$column];
	        $by = $order[0]['dir'];
	        $this->db->order_by($ord , $by);
	    }

	    $this->db->select("SQL_CALC_FOUND_ROWS user_id, username, email, role_id, status" ,FALSE);
	    $this->db->from("user");
	    $sql = $this->db->get();
	    $q = $sql->result();
	    $this->db->select("FOUND_ROWS() AS total_row");
	    $row = $this->db->get()->row();

	    $sEcho = $this->_post('draw');
	    $getCountAll = $this->countUser();
	    $output = array(
	        "draw" => intval($sEcho),
	        "recordsTotal" => $getCountAll,
	        "recordsFiltered" => $row->total_row,
	        "data" => array()
	    );

	    foreach ($q as $val) {
        $act = '<a href="'.site_url('admin/user/delete/'.$val->user_id).'" class="btn btn-danger">Delete</a>
        		<a href="'.site_url('admin/user/add/'.$val->user_id).'" class="btn btn-warning">Edit</a>';
        $output['data'][] = array(
            $val->user_id,
            $val->username,
            $val->email,
            $val->role_id,
            statusStaff($val->status),
            $act
            );
    	}
        return $output;
	}
	function countUser(){
		return 10;
		//return count user
	}
	function checkUserExist($val,$by = 'email'){
		//return true|false
	}
	function getUser($val , $by = 'user_id'){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($by,$val);
		$result = $this->db->get()->result();
		return $result;
	}
	function addUser($data){
		$data['password'] = myPassword($data['password']);
		$data['date_created'] = myDate();
		return $this->db->insert('user' , $data);
	}
	function editUser($where,$table){ 
		// return $this->db->get_where($table,$where);
		if($table['password'] !=''){
			$table['password'] = myPassword($table['password']);
		}else{
			unset($table['password']);
		}
		$this->db->where('user_id', $where);
		$this->db->update('user', $table);
	}
	function deleteUser($user_id){
		$this->db->where('user_id', $user_id);
		$this->db->from('user');
		$this->db->delete();
	}

	function login($user , $pass){
		// $this->db->select('*');
		// $this->db->from('user');
		// $this->db->where('')
		// var_dump($user);
		// var_dump($pass);
		//$username 
		//$password
		//untuk login admin
		$data['message'] = '';
		$userdata = $this->db->get_where('user', array('username' => $user))->row();
		//$userdata = $this->db->get_where('user',array('password' =>$pass))->row();
		if($userdata == null){
			$data['valid']   = false;
			$data['message'] = myAlert('Username atau Password salah !!', 'danger');
		}else{
			$user_id  = $userdata->user_id;
			$password = $userdata->password;
			$data['valid']  = password_verify($pass, $password);
			if ($data['valid']){
				$this->session->set_userdata('ID' , $user_id);
				$this->session->set_userdata('isLogin' , true);
				$this->session->set_userdata('isAdmin' , true);				
			}
		}
		// var_dump($data['message']);die;
		return $data;
	}
	function getRole(){
		$this->db->select('*');
		$this->db->from('role');
		$result = $this->db->get()->result();
		return $result;
	}
}