<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AccountMT4Model extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function getCountAccount($type_account = null){
		//admin
	}
	function getDatatable(){

	}
	function deleteAccount($account_id){
		$this->db->where('account_id',$account_id);
		$this->db->from('accountmt4');
		$this->db->delete();
	}
    function getAccount($val , $field = 'account_id'){
    	//admin-front
        $this->db->select('*');
        $this->db->from('accountmt4');
        $this->db->where('username' , $username);
        
        return $data;
    }
	function addAccount($member_id){
		//$type_account
		//open account in mt4 server , via Mt4manager library
		//open wallet
		//if success add account juga di database 
	}
	function editAccount($account_id){
		//edit account di mt4 sever
		//if success edit account di database
	}
	function getAccountList($val,$field,$limit = -1){
		
	}
	function getTopAccount(){
		//front
	}
	function getAccountCategory($val , $field='accountmt4category_id'){

	}
	function addAccountCategory(){
		//admin
	}
	function editAccountCategory(){
		//admin
	}
	function deleteAccountCategory($category_id){
		//admin
	}
	function datatableAccountCategory(){
		//
	}
	function getAccountHistoryTrading($account_id){
		//admin-front
	}

	//
	function addRatingReview(){

	}
	function deleteRatingReview(){
		
	}
	function changeStrategy(){

	}
}