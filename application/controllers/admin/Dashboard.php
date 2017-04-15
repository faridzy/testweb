<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends Admin{
	function __construct(){
		parent::__construct();
	}
	function index(){
		//account trader_total = AccountMT4Model.getCountAccount("trader")
		//account partnership total= AccountMT4Model.getCountAccount("partnership")
		$this->renderPage('contents/page');
		// $this->renderPage('contents/dashboard');
	}
}