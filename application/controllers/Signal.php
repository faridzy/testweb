<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Signal extends Front{	
	function __construct(){
		parent::__construct();
	}
	function index($type){ //pamm-manager|signal-provider|
		//get trader AccountMT4Model.getTopAccount();
		//get pamm manager PammManagerModel.getTopPammManager()
		//get singnal provider SignalModel.getTopSignalProvider();
		//$this->renderpage();
	}
}