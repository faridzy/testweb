<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_tabs extends WCIFX_Controller{	
	function __construct(){
		parent::__construct();
	}
	function account_tabs_profile(){
		//ini merupakan view dari member dashboard (ajax get)
		$data['success']= true;
		$data['data'] 	= $this->load->view('tabs/my-profile' , '' , TRUE);;
		echo json_encode($data);
		die;
	}
	function account_tabs_settings(){
		//ini merupakan view dari member settings (ajax get)
		
	}
	function account_tabs_diary(){
		//ini merupakan view dari member diary (ajax get)
	}
	function account_tabs_partnership(){
		//ini merupakan view dari partnership (ajax get)
	}
	function account_tabs_account($username){
		//digunakan untuk action ajax dari setiap klik tab accountmt4
	}
	function account_det_transaction_trading(){ // $username 
		//ini merupakan view dari tabs account detail history trading (active trading)
	}
	function account_det_history_trading(){ // $username 
		//ini merupakan view dari tabs account detail history trading (finished trading)
	}
	function account_det_statistic_trading(){ // $username 
		// ini merupakan view dari tabs accounr detail history trading (dibuat statistic)
	}
	function account_det_subscriber(){ // $username 
		//ini merupakan view dari tabs account detail list subscriber
	}
	function account_det_rating(){ // $username 
		//ini merupakan view dari tabs account detail form rating
	}
}