<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_popup extends WCIFX_Controller{	
	function __construct(){
		parent::__construct();
	}
	function login(){
		//ininanti untuk ambil html dari popup login (ajax get)
		// -file view nya popups/login.php
		// -action button login nya nanti ke controller account.login 
		$data['success']= true;
		$data['data'] 	= $this->load->view('popups/login' , '' , TRUE);
		echo json_encode($data);
		die;
	}
	function register(){
		$data['success']= true;
		$data['data'] 	= $this->load->view('popups/register' , '' , TRUE);
		echo json_encode($data);
		die;

		// -untuk popup register member
	}
	function wallet_add_new_wallet(){
		// untuk popup tambah wallet
	}
	function wallet_add_payment_system(){
		// untuk popup add payment system member
	}
	function wallet_deposit_withdraw(){
		// untuk popup deposit dan withdraw from/to external (bank offfline)
	}
	function wallet_history(){
		//untuk popup wallet history
	}
	function edit_account(){
		// untuk popup edit accountmt4
	}	
	function open_account_trading(){
		//untuk popup open account trading 
	}
	function open_account_pamm_manager(){
		//untuk popup open account pamm manager
	}
	function open_account_signal_provider(){
		//untuk popup open account signal provider
	}
	function open_account_pamm_investor(){
		//untuk popup open pamm investor
	}
	function open_account_signal_subsciber(){
		//untuk popup open account signal subscriber
	}
	function open_account_contest(){
		//untuk popup open account contest
	}
	function account_deposit_withdraw(){
		//untuk popup deposit & withdraw form/to account
	}

	function partnership_withdraw(){
		//popup withdraw partnership
	}
	function partnership_withdraw_history(){
		//popup partnership withdraw history
	}
	function partnership_rebate(){

	}
	function partnership_generate_affiliate_link(){
		//popup generate link affiliate
	}
	function partnership_promotial_material(){
		//popup generate banner affiliate
	}
	function contest_history(){
		
	}
	
	
}