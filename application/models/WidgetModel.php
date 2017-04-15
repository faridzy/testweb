<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class WidgetModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function popularPost(){
		$query = 'select popular post';
		$data['data'] = $query;
		return $data;
	}
	function newsCategory(){
		
	}
}