<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends Front{
	function __construct(){
		parent::__construct();
	} 
	function index(){
		//get lsit news
		//NewsModel.getListNews()
		$this->load->model('NewsModel');
		$where = array( 'post_type' => 'news',						
						'postmeta' => true
					);
		$data['news'] = $this->NewsModel->getListNews(100, $where);
		// var_dump($data);die;
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'search-article',
							'data'		=>array(),
						);
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'popular-post',
							'data'		=>array(),
						);
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'category-tag',
							'data'		=>array(),
						);
		$this->widgetList[] = array(
							'position'	=>'footer',
							'view'		=>'contest-result',
							'data'		=>array(),
						);
		$this->viewData = $data;
		$this->renderPage('contents/news');
	}
	function single($slug){
		//get single news
		//PostModel.getSinglePost($slug , 'slug' , 'news');
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'search-article',
							'data'		=>array(),
						);
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'popular-post',
							'data'		=>array(),
						);
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'category-tag',
							'data'		=>array(),
						);
		$this->widgetList[] = array(
							'position'	=>'footer',
							'view'		=>'contest-result',
							'data'		=>array(),
						);
		$this->renderPage('contents/news-detail');
	}
}