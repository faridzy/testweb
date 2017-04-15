<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Members extends Admin{
	function __construct(){
		parent::__construct();
		$this->load->model('MemberModel');
		$this->load->helper('url');
	}
	function index(){
		$data['message']=$this->session->flashdata('del-msg');
		$this->viewData=$data;
		$this->renderPage('contents/members');
	}
	function add($member_id = ''){
		$data['listCountry'] = myCountryList();
		$data['message']	= '';
		// $this->_post('submit') && $user_id == '' UserModel.addUser()
		// $this->_post('submit') && $user_id != '' UserModel.editUser()
		// get UserModel.getUser();
		if ($this->_post('submit')){
			$confField	= [
							['field' => 'username' , 'label' => 'Username' ],
							['field' => 'phone' ,'label' => 'Phone Number', 'rules' => 'required|min_length[8]'],
							['field' => 'email' ,'label' => 'Email Address', 'rules' => 'required|valid_email'],
							['field' => 'retype-pass' ,'label' => 'Retype password' ,'setData' => false , 'rules' => 'matches[password]'],
							['field' => 'firstname' , 'label' => 'First Name' ],
							['field' => 'lastname' ,'label' => 'Last Name' , 'rules'=>''],
							['field' => 'gender' ,'label' => 'Gender'],
							['field' => 'birthday' ,'label' => 'Birthday'],
							['field' => 'country' ,'label' => 'Country'],
							['field' => 'city' ,'label' => 'City'],
							['field' => 'address' ,'label' => 'Address'],
							['field' => 'avatar' ,'label' => 'Avatar'],
							['field' => 'status' ,'label' => 'Status'],
						];
			if($member_id == ''){
				$confField[] = ['field' => 'password' ,'label' => 'Password' ,'rules' => 'required|min_length[6]'];
				$postDT = $this->WCIFXPostDT($confField);
				if($postDT['valid']){
					$this->UserModel->addMember($postDT['data']);					
					$data['message'] = myAlert('Data Berhasil Ditambah');
				}else{
					$data['message'] = $postDT['message'];
				}
			}else{
				$confField[] = ['field' => 'password' ,'label' => 'Password' ,'rules' => 'min_length[6]'];
				$postDT = $this->WCIFXPostDT($confField);
				if($postDT['valid']){
					$this->UserModel->editMember($member_id, $postDT['data']);					
					$data['message'] = myAlert('Data Berhasil Diubah');
				}else{
					$data['message'] = $postDT['message'];
				}
			}
		}
		if($member_id == ''){
			if(set_value('avatar') != ''){
				$img  = set_value('avatar');
				$data['img_path'] = getImage($img , 'medium' , 'member');
			}
		}else{
			$data['userdata'] = $this->MemberModel->getMember($member_id);
			$img  = $data['userdata'][0]->avatar;
			$data['img_path'] = getImage($img , 'medium' , 'member');
			$data['gender']   = $data['userdata'][0]->gender;
			$data['status']   = $data['userdata'][0]->status;
		}
		$this->viewData = $data;
		if($member_id == ''){
			$this->renderPage('contents/members_add');
		}else{
			$this->renderPage('contents/members_edit');
		}	
	}
	function delete($member_id=''){
		if($member_id !=''){
			$admUrl=$this->admUrl;
			$this->MemberModel->deleteMember($member_id);
			$msg = myAlert('Data berhasil Dihapus','warning');
			$this->session->set_flashdata('del-msg',$msg);
			redirect(base_url().$admUrl.'/members');
		}
	}
	function datatable(){
		$data=$this->MemberModel->getDatatable();
		echo json_encode($data);
	}
	function upload_avatar(){
		$updata=$this->WCIFXUploadImage('file','members');
		echo  json_encode($updata);
	}
}