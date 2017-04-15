<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MemberModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function countMember(){
		return 10;

	}
	function getDatatable(){
		$array=array('member_id','username','phone','email','status');
		$start=$this->_post('start');
		$offset=$this->_post('length');
		if($start!=null && $offset!=null){
			$this->db->limit($start,$offset);
		}

		$search=$this->_post('search');
		if($search['value'] !=''){
			$key=$search['value'];
			$this->db->like('member_id',$key);
			$this->db->or_like('username',$key);
			$this->db->or_like('phone',$key);
			$this->db->or_like('email',$key);
			$this->db->or_like('status',$key);

		}
		$order = $this->_post('order');
	    $column = isset($order[0]['column'])?$order[0]['column']:-1;
	    if($column >= 0 && $column < count($array)){
	        $ord = $array[$column];
	        $by = $order[0]['dir'];
	        $this->db->order_by($ord , $by);
	    }

	    $this->db->select("SQL_CALC_FOUND_ROWS member_id, username, phone, email, status" ,FALSE);
	    $this->db->from("member");
	    $sql = $this->db->get();
	    $q = $sql->result();
	    $this->db->select("FOUND_ROWS() AS total_row");
	    $row = $this->db->get()->row();

	    $sEcho = $this->_post('draw');
	    $getCountAll = $this->countMember();
	    $output = array(
	        "draw" => intval($sEcho),
	        "recordsTotal" => $getCountAll,
	        "recordsFiltered" => $row->total_row,
	        "data" => array()
	    );

	    foreach ($q as $val) {
        $act = '<a href="'.site_url('admin/members/delete/'.$val->member_id).'" class="btn btn-danger">Delete</a>
        		<a href="'.site_url('admin/members/add/'.$val->member_id).'" class="btn btn-warning">Edit</a>';
        $output['data'][] = array(
            $val->member_id,
            $val->username,
            $val->phone,
            $val->email,
            statusStaff($val->status),
            $act
            );
    	}
        return $output;
		
	}
	function addMember($data){
		$data['password']=myPassword($data['password']);
		$data['date_created']=myDate();
		return $this->db->insert('member',$data);

	}
	function editMember($where,$table){

		if($table['password'] !=''){
			$table['password']=myPassword($table['password']);
		}else{
			unset($table['password']);
		}
		$this->db->where('member_id',$where);
		$this->db->update('member',$table);

	}
	function deleteMember($member_id){
		$this->db->where('member_id',$member_id);
		$this->db->from('member');
		$this->db->delete();
	}
	function getMember($val, $by='member_id'){
		$this->db->select('*');
		$this->db->from('member');
		$this->db->where($by,$val);
		$result=$this->db->get()->result();
		return $result;

	}
	function activationMember($member_id , $status = '1'){

	}
	function editMemberByCols($member_id , $data = array()){
		$this->db->where('member_id' , $member_id);
		$this->db->update('member' , $data);
	}
	function checkEmail($val, $by = 'email'){
		//from table member
		$get = $this->db->get_where('member', [$by => $val]);
		return $get->row();
	}
	function login($email, $pass){
		$memberdata = $this->checkEmail($email);
		if($memberdata == null){
			$data['valid']   = false;			
		}else{
			$member_id  = $memberdata->member_id;
			$password = $memberdata->password;
			$data['valid']   = $pass == $password; //password verify
			if ($data['valid']){
				$this->session->set_userdata('ID' , $member_id);
				$this->session->set_userdata('isLogin' , true);
				$this->session->set_userdata('isMember' , true);				
			}
		}
		if($data['valid'] == false){
			$data['message'] = myAlert('Wrong Password or Email.', 'danger');
		}
		return $data;
		//untuk login member
	}

	function lostPassword(){
		//get from member
		//if true send email with token reset password
		//
	}
	function recoveryPassword(){
		//update member password
		//
	}
	function uploadCertification($doc){
		//insert into webdocument table
		//category nya di set di term(certification) dan taxonomy(document_type)
	}
	function uploadInvestmentAggrement($doc){
		//insert into webdocument table
		//category nya di set di term(investment_aggrement) dan taxonomy(document_type)
	}

}