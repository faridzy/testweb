<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends Api{
	function __construct(){
		parent::__construct();
	}
	function add_rating_review(){
		//add rating dan review
		// AccoountMT4Model.addRatingReview()
	}
	function delete_rating_review(){
		// AccountMT4Model.deleteRatingReview()
	}
	function change_strategy(){
		//AccoountMT4Model.changeStategy()
	}

	function edit_account(){
		//AccountMT4Model.editAccount()
		// $account_id
	}	
	function delete_account(){
		//$account_id
		//AccountMT4Model.deleteAccount()
	}
	function open_account_trading(){
		//AccountMT4Model.addAccount('trader')
	}
	function open_account_pamm_manager(){
		//AccountMT4Model.addAccount(pamm_manager)
	}
	function open_account_pamm_investor(){
		//AccountMT4Model.addAccount(pamm_investor)
	}
	function invest(){
		// PammInvestorModel.invest();
	}
	function uninvest(){
		// PammInvestorModel.uninvest();
	}
	function open_account_signal_provider(){
		//AccountMT4Model.addAccount(signal_provider)
	}
	function open_account_signal_subsciber(){
		//AccountMT4Model.addAccount(signal_subscriber)
	}
	function subscribe(){
		// SignalModel.subscriber() 
	}
	function unsubscribe(){
		// SignalModel.unSubscribe();
	}
	function open_account_contest(){
		//AccountMT4Model.addAccount(contest)
	}
	function join_contest(){
		// ContestModel.joinContest();
	}
	function unjoin_contest(){
		// ContestModel.unjoinContest();
	}
	
	function account_deposit(){
		//PaymentModel.doPayment(deposit_account)
	}
	function account_withdraw(){
		//PaymentModel.doPayment(withdraw_account)
	}
	function account_internal_transfer(){
		//PaymentModel.doPayment(internal_transfer)
	}

}	