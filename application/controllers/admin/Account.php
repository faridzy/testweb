<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends Admin{	
	function __construct(){
		parent::__construct();
		$this->load->model('AccountMT4Model');
		$this->load->helper('url');
	}
	function index(){
		//render view list account		
		$this->renderPage('contents/account');
	}
	function add($account_id = ''){
		//menampilkan form add atau edit account
		//if $account_id == '' Add else Edit
		//if $this->_post('submit') && $account_id =='' maka AccountMT4Model.addAccount($member_id);
		//if $this->_post('submit') && $account_id !='' maka AccountMT4Model.editAccount($accont_id);
		//$get = AccountMT4Model.getAccount($account_id)
	}
	function delete($account_id){
		//AccountMT4Model.deleteAccount($account_id)
	}
	function datatable(){
		//ajax action dari datatable serverside
		//AccountMT4Model.getDatatable()
		$data = $this->AccountMT4Model->getDatatable();
		echo json_encode($data);
	}
	function account_category(){
		//show list account category
		//render view list category
	}
	function account_category_add($category_id){
		//menampilkan form add category
		//if $this->_post('submit') && $category_id =='' maka AccountMT4Model.addAccountCategory($member_id);
		//if $this->_post('submit') && $category_id !='' maka AccountMT4Model.editAccountCategory($member_id);
		//get = AccountMT4Model.getAccountCategory();

	}
	function account_category_delete($category_id){
		// AccountMT4Model.deleteAccountCategory($category_id)
	}
	function account_category_datatable(){
		//AccountMT4Model.datatableAccountCategory()
	}
}