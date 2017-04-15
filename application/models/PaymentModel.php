<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PaymentModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function getDatabable(){
		
	}
	function doPayment($type ,$payment_id, $data){

		$defData = array(
					'payment_id'		=> 0,
					'trans_type_id'		=> 0,
					'wallet_receiver'	=> 0,
					'wallet_sender'		=> 0,
					'amount'			=> 0,
					'date'				=> myDate(),
					'status'			=> 1
				);
		$trans_type_id = $this->getTransType($type);
		
	}
	function getTransType($type){
		// return trans_type_id
	}
	function addPaymentMember(){
		//untuk add payment system di member
	}
	function deletePaymentMember(){
		//delete payment system member
	}
	function getPayment($val , $field = 'payment_id'){

	}
	function addPayment(){

	}
	function editPayment(){

	}
	function deletePayment(){
		
	}
}