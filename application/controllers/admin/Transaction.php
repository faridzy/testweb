<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaction extends Admin{
	function __construct(){
		parent::__construct();
	}
	function index(){
		// render list trasnsation user
	}
	function update_status(){
		// TransactionModel.updateStatus()
	}
	function datatable(){
		// TransactionModel.getDatatable()
	}
}