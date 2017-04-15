<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cabinet extends Member{	
	function __construct(){
		parent::__construct();
		$this->load->helper('Tabs');
		$this->load->model('MemberModel');
	}
	function index(){
		if(!$this->isLogin){
			redirect("/");
		}
		//AccountMT4Model.getAccountList()
		$data['Cabinet']	= true;
		$this->loaderJS[] 	= site_url('dist/member.js');
		$data['Tabs'] 		= array_merge(tabsData() , dummyAccount()) ;
		$data['Tabs']['profile']['class'].=' active'; //inject active class
		$this->viewData		= $data;
		$this->renderPage("contents/member-details");
		//ini nanti untuk details cabinet
		//get profile , settings , diary , partnership(if join prtnership system) and list account 
	}
	function login(){
		//ini action ajax dari login
		//MemberModel.login()
		$confField =[
						['field' => 'email' ,'label' => 'Email Address', 'rules' => 'required|valid_email'],
						['field' => 'password' ,'label' => 'Password' ,'rules' => 'required|min_length[6]']
					];
		$postDT = $this->WCIFXPostDT($confField);
		$data['valid'] = false;
		if ($postDT['valid']){
			$check = $this->MemberModel->login($postDT['data']['email'], $postDT['data']['password']);
			if ($check['valid']){
				$data['valid'] = true;
				$data['message'] = myAlert('Redirecting...', 'success');
			}else{
				$data['message'] = $check['message'];
			}
		}else{			
			$data['message'] = myAlert($postDT['message'], 'danger');			
		}

		echo json_encode($data);
	}
	function register(){
		//ini action ajax untuk register member
		//MemberModel.addMember()
	}
	function activation_member($token = ''){
		//ini untuk action ajax activation member setelah register
		//MemberModel.getMember($token,'token')
		//if true > 
		//MemberModel.activationMember();
	}
	function logout(){
		//destroy all session
	}
	function lost_password(){
		//ini untuk ajax action lost password
		//ModelMember.lostPassword()
	}
	function recovery_password(){
		//ini untuk ajax action recovery password
		//ModelMember.recoveryPassword()
	} 
}