<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends Admin{
	function __construct(){
		parent::__construct();
	}
	function index(){
		// render list payment method
	}
	function datatable(){
		// PaymentModel.getDatabable()
	}
	function add($payment_id=''){
		//menampilkan form add payment method
		// $this->_post('submit') && $payment_id == '' PaymentModel.addPayment()
		// $this->_post('submit') && $payment_id != '' PaymentModel.editPayment()
		// get = PaymentModel.getPayment()
	}
	function delete($payment_id){
		// PaymentModel.deletePayment($payment_id)
	}

}