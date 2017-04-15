<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends WCIFX_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('UserModel');
	}
	function index(){
		if($this->_post('submit')){
			$this->do_login();
		}
		$data['message'] = $this->session->flashdata('err-login');
		// $this->viewData = $data;
		$this->load->view('backoffices/login', $data);
	}
	function do_login(){
		$admUrl = $this->config->item('WCIFX_admin_url');;
		$user  = $this->_post('username');
		$pass  = $this->_post('password');
		$check = $this->UserModel->login($user, $pass);
		// var_dump($check);
		if($check['valid']){
			redirect(base_url().$admUrl);
		}else{
			$this->session->set_flashdata('err-login', $check['message']);
			redirect(base_url().$admUrl.'/login');
		}
		// UserModel.login()
		//if true redirect ke admin
		//if false show alert error
		// $usr = $_POST['username'];
		// $pass = $_POST['password'];
		// var_dump($usr);
		// var_dump($pass);
	}
}