<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends Front{
	private $dummy;	
	function __construct(){
		parent::__construct();
		$this->dummy['about'] 	= array('page_template'	=> 'about');
		$this->dummy['bussiness'] 	= array('page_template'	=> 'bussiness');
		$this->dummy['contest'] 	= array('page_template'	=> 'contest');
		$this->dummy['generate-password'] 	= array('page_template'	=> 'generate-password');
		$this->dummy['investment-program-01'] 	= array('page_template'	=> 'investment-program-01');
		$this->dummy['investment-program-02'] 	= array('page_template'	=> 'investment-program-02');
		$this->dummy['partnership'] 	= array('page_template'	=> 'partnership');
		$this->dummy['trading-demo-account'] 	= array('page_template'	=> 'trading-demo-account');
		$this->dummy['trading-instruments'] 	= array('page_template'	=> 'trading-instruments');
		$this->dummy['trading-payment'] 	= array('page_template'	=> 'trading-payment');
		$this->dummy['trading-platforms'] 	= array('page_template'	=> 'trading-platforms');
		$this->dummy['trading-real-account'] 	= array('page_template'	=> 'trading-real-account');
		$this->dummy['lost-password'] 	= array('page_template'	=> 'lost-password');
		$this->load->model('PageModel');
	}
	function base($parent = '', $child1=''){
		// var_dump($child1);die;
		//get page template by slug
		//pageModel.getPageTemplate
		$slug = ($child1 != '') ? $child1 : $parent;
		$pageData = $this->PageModel->getPageTemplate($slug);
		// $data = $this->PageModel->getPageTemplate($slug);
		// if(isset($this->dummy[$slug])){
		if ($pageData != null){
			if(!file_exists(APPPATH.'views/templates/'.$pageData->meta['page_template'].'.php')){
				$pageData->meta['page_template'] = 'default.php';
			}
			$this->viewData= $this->setData($pageData);
			$this->renderPage('templates/'.$pageData->meta['page_template']);
		}else{
			show_404();
		}
	}
	function setData($pageData = null){
		// var_dump($pageData);
		$data['content'] = $pageData;
		$data['themeOptions'] = $this->themeOptions;
		switch ($pageData->meta['page_template']) {
			case 'bussiness':
				$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'trading-investment',
							'data'		=>array(),
						);
				$this->widgetList[] = array(
							'position'	=>'footer',
							'view'		=>'contest-result',
							'data'		=>array(),
						);
				
			break;
			case 'about':
				$this->widgetList[] = array(
							'position'	=>'footer',
							'view'		=>'contest-result',
							'data'		=>array(),
						);
				// $data['themeOptions'] = $this->themeOptions;

			break;
			case 'contest':
				$this->widgetList[]	= array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				// $data['themeOptions'] = $this->themeOptions;
			break;
			case 'generate-password':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				break;
			case 'investment-program-01':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				//benefit from webcore
				//get top signal model pammManagerModel.getTopPammManager[GET TOP 5]
				$this->load->model('PammManagerModel');
				$data['top_pamm'] = $this->PammManagerModel->getTopPammManager('5');

			break;
			case 'investment-program-02':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				//get top signal model pammManagerModel.getTopPammManager[GET by Acak]
			break;
			case 'partnership':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				// $data['themeOptions'] = $this->themeOptions
			break;
			case 'trading-demo-account':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				// $data['themeOptions'] = $this->themeOptions
				$data['country_list'] = myCountryList();
				//get country list = Main_helper.myCountryList() //Helper
			break;
			case 'trading-real-account':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				// $data['themeOptions'] = $this->themeOptions
				$data['country_list'] = myCountryList();
				//get country list = Main_helper.myCountryList() //Helper
				//registration intruction from webcoe
			break;
			case 'trading-instruments':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
				// $data['themeOptions'] = $this->themeOptions

			break;
			case 'lost-password':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
			break;
			case 'default':
				$this->widgetList[] = array(
						'position'	=>'footer',
						'view'		=>'contest-result',
						'data'		=>array(),
					);
			break;
		}
		return $data;
	}
}