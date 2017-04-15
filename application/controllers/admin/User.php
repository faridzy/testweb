<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends Admin{
	function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
		$this->load->helper('url');
	}
	function index(){
		// $data = $this->UserModel->getUser('user');
  //       $data = array('user' => $data);
		$data['message'] = $this->session->flashdata('del-msg');
		$this->viewData = $data;
		$this->renderPage('contents/user');
	 
	}
	function add($user_id = ''){
		$data['listCountry'] = myCountryList();
		$data['listRole'] = $this->UserModel->getRole();
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
							['field' => 'role_id' ,'label' => 'Role']
						];
			if($user_id == ''){
				$confField[] = ['field' => 'password' ,'label' => 'Password' ,'rules' => 'required|min_length[6]'];
				$postDT = $this->WCIFXPostDT($confField);
				if($postDT['valid']){
					$this->UserModel->addUser($postDT['data']);					
					$data['message'] = myAlert('Data Berhasil Ditambah');
				}else{
					$data['message'] = $postDT['message'];
				}
			}else{
				$confField[] = ['field' => 'password' ,'label' => 'Password' ,'rules' => 'min_length[6]'];
				$p ostDT = $this->WCIFXPostDT($confField);
				if($postDT['valid']){
					$this->UserModel->editUser($user_id, $postDT['data']);					
					$data['message'] = myAlert('Data Berhasil Diubah');
				}else{
					$data['message'] = $postDT['message'];
				}
			}
		}
		if($user_id == ''){
			if(set_value('avatar') != ''){
				$img  = set_value('avatar');
				$data['img_path'] = getImage($img , 'medium' , 'user');
			}
		}else{
			$data['userdata'] = $this->UserModel->getUser($user_id);
			$img  = $data['userdata'][0]->avatar;
			$data['img_path'] = getImage($img , 'medium' , 'user');
			$data['gender']   = $data['userdata'][0]->gender;
			$data['status']   = $data['userdata'][0]->status;
		}
		$this->viewData = $data;
		if($user_id == ''){
			$this->renderPage('contents/user_add');
		}else{
			$this->renderPage('contents/user_edit');
		}
	}
	function delete($user_id = ''){
		// untuk delete from user
		// UserModel.deleteUser()
		if ($user_id != ''){
			$admUrl = $this->admUrl;
			$this->UserModel->deleteUser($user_id);
			$msg = myAlert('Data Berhasil Dihapus', 'warning');
			$this->session->set_flashdata('del-msg', $msg);
			redirect(base_url().$admUrl.'/user');
		}
	}
	function datatable(){
		// untuk action dari datable ajax server side
		// UserModel.getDatatable();
		$data = $this->UserModel->getDatatable();
		echo json_encode($data);
	}
	function upload(){
		$upData = $this->WCIFXUploadImage('file' , 'user');
		echo json_encode($upData);
	}
}