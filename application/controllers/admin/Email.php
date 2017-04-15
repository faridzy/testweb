<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email extends Admin{
	function __construct(){
		parent::__construct();
	}
	function email_template(){
		//menampilkan list email template
	}
	function email_template_add($email_id){
		//menampilkan form add email template
		//if $email_id == '' PostModel.addPost('email_template')
		//if $email_id != '' PostModel.updatePost()
		//get = PostModel.getSinglePost()
	}
	function datatable(){ 
		// ajax action dari email template list
		// EmailModel.getDatatable()
	}
	function email_contact(){
		// get from webcore (table core)
	}
	
	function inbox(){ 	
	}
	function outbox(){  }
}