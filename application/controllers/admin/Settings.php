<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends Admin{
	function __construct(){
		parent::__construct();
		$this->load->model('GlobalModel');
		$this->load->helper('menu');
		$this->load->model(['MenuModel']);
	}
	function menu(){
		//menampilkan list menu 
		$this->renderPage('contents/settings_menu');
	}
	function menu_add($menu_id = ''){
		$this->loaderJS[] = site_url('dist/admin/scripts/nested-sortable.js');
		$this->loaderJS[] = site_url('dist/admin/scripts/admin.settings.menu.js');
		$data['data'] 	= null;
		$menuData 		= null;
		if($this->_post('submit')){
			if($menu_id == ''){
				$this->MenuModel->addMenu();
			}else{
				$this->MenuModel->editMenu($menu_id);
			}
		}
		if($menu_id != ''){
			$data['data']	= $this->MenuModel->getMenu($menu_id);
			if ($data['data'] == null) {
				redirect(site_url($this->admUrl.'/settings/menu-add'));
			}
			$menuData 		= $this->MenuModel->setMenuHierarchy($data['data']);
		}
		$data['pages']	= $this->PostModel->getPosts(['post_type'=>'page']);
		$data['formNested'] = formNested($this ,$menuData);	
		$this->viewData = $data;
		$this->renderPage('contents/settings_menu_add');
	}
	function menu_delete($menu_id = ''){
		$this->MenuModel->deleteMenu($menu_id);
	}
	function menu_datatable(){
		$data = $this->MenuModel->getDatatable();
		echo json_encode($data);
		die;
	}
	function general_settings(){
		//disimpang di table webcore
		$fields = array(
			'phone',
			'email',
			'link_gplay',
			'link_appsstore',
			'link_facebook',
			'link_twitter',
			'link_youtube',
			'link_linkedin',
			'link_pinterest',
			'link_instagram',
			'link_gplus',
			'link_wp',
			'parallax_body_homepage',
			'homepage_content',
			'link_copy_trade',
			'link_investment',
			'link_contest',
			'link_about',
			'title_participants_forex',
			'participants_forex',
			'title_how_do_transactions',
			'how_do_transactions',
			'more_about',
			'quality',
			'reliability',
			'general_email',
			'general_phone',
			'technical_email',
			'technical_phone',
			'financial_email',
			'financial_phone',
			'partnership_email',
			'partnership_phone',
			'parallax_body_contest',
			'cnts_about',
			'cnts_how_to',
			'cnts_real_price',
			'cnts_term_part',
			'cnts_begin_end',
			'cnts_term_trade',
			'cnts_not_allow',
			'cnts_define_win',
			'cnts_prize_fund',
			'cnts_complaint',
			'cnts_receive_prize',
			'cnts_miscellaneous',
			'benefits_investment',
			'detail_demo_account',
			'info_demo_account',
			'detail_real_account',
			'info_real_account',
			'parallax_android_platforms',
			'parallax_iphone_platforms',
			'term_of_trading',
			'payment_of_solution',
			'investment',
			'partnership_program',
			'demo_account',
			'real_account',
			'trading_instrument',
			'payment_method',
			'investment_program_1',
			'investment_program_2',
			'register',
			'signal_provider',
		);
		$fldData = '';
		foreach ($fields as $fld){
			$fldData[$fld] = setTranslate($this->_post($fld, false));
		}
		if($this->_post('submit')){
			$this->GlobalModel->setCore('general', json_encode($fldData));
			$msg = myAlert('data berhasil disimpan', 'success');
			$this->session->set_flashdata('data-saved', $msg);
		}
			$coreData = $this->GlobalModel->getCore('general');
			$oldData = array_merge($fldData, (array)json_decode($coreData));
		$args = array(
				'post_type' => 'page',
				'limit' 	=> 100,
				'order' 	=> 'DESC',
			);
		$oldData['listPage'] = $this->PostModel->getPosts($args); // untuk ditampilkan di setting
			// var_dump($oldData);die;
		$oldData['message'] = $this->session->flashdata('data-saved');
		$this->viewData = $oldData;
		$this->renderPage('contents/general_settings');
	}
	function mt4_settings(){
		//disimpang di table webcore
		$this->renderPage('contents/mt4_settings');
	}
	function server_status(){
		//disimpang di table webcore
		
	}
	function ajax_menu_item_add(){
		$type 		= $this->_post('type');
		$item_id	= $this->_post('item_id');
		$item_title	= setTranslate($this->_post('item_title'));
		$object		= $this->_post('object');
		$data['success']= false;
		$data['data']	= '';
		if($type != 'custom'){
			$getPost= $this->PostModel->getSinglePost($object);
			if($getPost != null){
				$item_title = $getPost->title;
			}
		}
		$input = itemNested($this ,$type , $item_id , $item_title , $object , null , true);
		if($input != ''){
			$data['success'] = true;
			$data['data']	= $input;
		}
		echo json_encode($data);
		die;
	}
}