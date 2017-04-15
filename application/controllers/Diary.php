<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Diary extends Front{
	function __construct(){
		parent::__construct();
	}
	function index(){
		//get list diary
		//DiaryModel.getListDiary();
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'search-article'
						);
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'popular-post',
							'data'		=>array(), //WidgetModel.popularPost()
						);
		$this->widgetList[] = array(
							'position'	=>'sidebar',
							'view'		=>'category-tag',
							'data'		=>array(), //WidgetModel.categoryTag()
						);
		$this->widgetList[] = array(
							'position'	=>'footer',
							'view'		=>'contest-result',
							'data'		=>array(), //WidgetModel.contestResult()
						);
		$this->renderPage('contents/diary-list-pages');
	}
	function single($slug = ''){
		$get = '';
		//get single diary
		//PostModel.getSinglePost($slug , 'slug' , 'diary');
		if($get != null){
			$this->widgetList[] = array(
								'position'	=>'sidebar',
								'view'		=>'search-article',
							);
			$this->widgetList[] = array(
								'position'	=>'sidebar',
								'view'		=>'popular-post',
								'data'		=>array(),//WidgetModel.popularPost()
							);
			$this->widgetList[] = array(
								'position'	=>'sidebar',
								'view'		=>'category-tag',
								'data'		=>array(),//WidgetModel.categoryTag()
							);
			$this->widgetList[] = array(
								'position'	=>'footer',
								'view'		=>'contest-result',
								'data'		=>array(),//WidgetModel.categoryResult()
							);
			$this->renderPage('contents/diary-pages');
		}else{
			//show 404
		}
	}
	

}