<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontpage extends Front{	
	function __construct(){
		parent::__construct();
	}
	function index(){
		$this->load->model('PostModel');
		$this->widgetList[] = array(
							'position'	=>'footer',
							'view'		=>'contest-result',
							'data'		=>array(),
						);
		//get slider = SliderModel.getSlider()
		$this->load->model('SliderModel');
		$data['sliders'] = $this->SliderModel->getSlider();
		
		//get content page
		$id = $this->themeOptions['homepage_content'];
		$data['content'] = $this->PostModel->getSinglePost($id , 'post_id', 'page');

		$data['quality'] = myExplode($this->themeOptions['quality']);
		$data['reliability'] = myExplode($this->themeOptions['reliability']);
		$this->viewData = $data;
		$this->renderPage('frontpage');
	}
}