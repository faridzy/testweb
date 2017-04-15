<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PosttypeModel extends WCIFX_Model{
	protected $postData;
	function __construct(){
		parent::__construct();
	}
	function postData($post_id = ''){
		// $dataMeta = array('test_meta'=> 'test om');
		// $postData = array('post_id'=>1 , 'title'=>'title men' , 'content'=>'content men' ,'post_type'=>'page', 'status'=>1);
		$postData = (array)$this->PostModel->getSinglePost($post_id);
		if($postData != null){
			$dataMeta = $this->PostModel->getAllPostMeta($post_id);
			$postData['meta'] = $dataMeta;
			$postData['taxonomy'] = $this->TermModel->getAllTermRelation($post_id);
		}
		return $postData;
	}
	function setPost(){ // untuk add / edit post , if $post_id < 0 maka insert else update
		$this->load->library('posttype');
		$post_type 	= $this->_post('post_type');
		$post_id 	= $this->_post('post_id');
		$metaField 	= $this->dataPostType($post_type , 'metabox');
		$insertMain	= array();
		$insertMeta	= array();
		$insertTax 	= array();
		if($metaField){
			foreach ($metaField['metabox'] as $item) {
				foreach ($item['fields'] as  $field) {
					$field 	= array_merge($this->posttype->defaultsField , $field);
					$inputPost = ($field['type'] != 'editor')?$this->_post($field['name']):$this->_post($field['name'] , false);
					switch ($field['object']) {
						case 'main': //insert table post
							$insertMain[$field['name']] = setTranslate($inputPost); //set translate
						break;
						case 'meta': //isert table meta
							$insertMeta[$field['name']] = setTranslate($inputPost);
						break;
						case 'taxonomy'://insert term
							$insertTax[$field['name']] 	= $inputPost;
						break;
					}
				}
			}
		}
		if($insertMain != null){
			if($post_id == ''){
				$post_id = $this->PostModel->addPost($post_type , $insertMain);
			}else{
				$this->PostModel->updatePost($post_id , $insertMain);
			}
			if($insertMeta != null){
				foreach ($insertMeta as $mkey => $mval) {
					$this->PostModel->setPostMeta($post_id , $mkey , $mval);
				}
			}
			if($insertTax != null){
				foreach ($insertTax as $tax => $term_id) {
					$this->TermModel->setTermRelation($post_id , $term_id , $tax);
				}
			}
		}
		redirect(site_url($this->admUrl.'/web-content/edit-post/'.$post_id));
	}
	function registerPostType($post_type , $postData = null){
		$this->postData = $postData;
		$dataPostType = $this->dataPostType($post_type , 'metabox');
		if(!$dataPostType) //invalid post_type
			return false;
		$this->load->library('posttype');
		$this->posttype->init($post_type ,$this->postData);
		$this->posttype->setAction(site_url($this->admUrl.'/web-content/set-post'));
		foreach ($dataPostType['metabox'] as $metabox) {
			$this->posttype->addMetaBox($metabox);
		}
		return $this->posttype->renderForm();
	}
	function dataPostType($post_type , $getField = 'all'){
		$data = null;
		$fDatatable = $fMetabox = false; 
		switch ($getField) {
			case 'all':
				$fDatatable = $fMetabox = true; 
			break;
			case 'datatable':
				$fDatatable = true;
			break;
			case 'metabox':
				$fMetabox 	= true;
			break;
		}
		if($fMetabox){
			$data['metabox'] = $this->defaultMetaBox($post_type); // set metabox field wajib 
		}
		switch ($post_type) {
			case 'page':
				if($fDatatable){
					$data['datatable'] 	= array('ID','Name','Author','Status','Action');
				}
				if($fMetabox){
					$getPages 	= $this->PostModel->getPosts([ 'post_type'=>'page' ]);

					$optPages[''] = '-Select Parent-';
					for ($i=0; $i < count($getPages); $i++) { 
						$optPages[$getPages[$i]->post_id] = translate($this , $getPages[$i]->title);
					}
					$filesTemplt= array_diff(scandir(FCPATH.'/application/views/templates'), array('.', '..'));
					$templates['']	= '-Select Template-';
					foreach ($filesTemplt as $key => $value) {
						$file = basename($value, ".php");
						$templates[$file]= ucwords(url_title($file , ' ' , false) );
					}
					$data['metabox'][]= array(
											'title' => 'Page Attribute',
											'position' => 'right',
											'fields' => array(
															array(
																'object'=> 'main',
																'name'	=> 'parent',
																'title'	=> 'Parent',
																'type'	=> 'select',
																'options' => $optPages
															),
															array(
																'object'=> 'meta',
																'name'	=> 'page_template',
																'title'	=> 'Page Template',
																'type'	=> 'select',
																'options' => $templates
															)										
													)
									);
					$data['metabox'][]= array(
											'title' => 'Parallax settings',
											'position' => 'right',
											'fields' => array(
															array(
																'object'=> 'meta',
																'name'	=> 'parallax_title',
																'title'	=> 'Parallax Title',
																'type'	=> 'text'
															),
															array(
																'object'=> 'meta',
																'name'	=> 'parallax_image',
																'title'	=> 'Parallax Image',
																'type'	=> 'upload',
																'extra' => ['is-large'=>'1']
															),
															array(
																'object'=> 'meta',
																'name'	=> 'parallax_description',
																'title'	=> 'Parallax Description',
																'type'	=> 'editor'
															)										
													)
									);
				}
			break;
			case 'news':
				if($fDatatable){
					$data['datatable'] 	= array('ID','Title','Language','Date','Category','Author','Action');
				}
				if($fMetabox){
					$data['metabox'][]= array(
											'title' => 'News Atribute',
											'position' => 'right',
											'fields' => array(
															array(
																	'object'=> 'meta',
																	'name'	=> 'news_thumbnail',
																	'title'	=> 'News Thumbnail',
																	'type'	=> 'upload'
																),
															array(
																	'object'=> 'meta',
																	'name' 	=> 'count_viewer',
																	'title' => 'Count Viewer',
																	'type'  => 'view'
																)
														)
									);
				}
			break;
			case 'diary':
				if($fDatatable){
					$data['datatable'] 	= array('ID','Title','Date','Tags','Member','Action');
				}
				if($fMetabox){
					$data['metabox'][] = array(
											'title' => 'Diary Attribute',
											'position' => 'right',
											'fields' => array(
															array(
																'object' => 'meta',
																'name'   => 'diary_thumbnail',
																'title'  => 'Diary Thumbnail',
																'type'   => 'upload'
															),
															array(
																'object' => 'meta',
																'name' 	 => 'count_comment',
																'title'  => 'Count Comment',
																'type'   => 'view'
															),
															array(
																'object' => 'meta',
																'name' 	 => 'count_like',
																'title'  => 'Count Like',
																'type'   => 'view'
															),
															array(
																'object' => 'meta',
																'name' 	 => 'count_share',
																'title'  => 'Count Share',
																'type'   => 'view'
															),
															array(
																'object' => 'meta',
																'name' 	 => 'count_viewer',
																'title'  => 'Count Viewer',
																'type'   => 'view'
															)
												)
									);
			}
			break;
			case 'slider':
			if ($fDatatable){
				$data['datatable'] = array('ID','Title','Status','Action');
			}
			if ($fMetabox){
				$data['metabox'][] = array(
										'title' => 'Slider Attribute',
										'position' => 'right',
										'fields' 	=> array(
															array(
																'object' => 'meta',
																'name' 	 => 'img_slider',
																'title'  => 'Image Slider',
																'type'   => 'upload',
																'extra' => ['is-large'=>'1']
															),
															array(
																'object' => 'meta',
																'name'   => 'title_slider',
																'title'  => 'Title Slider',
																'type'   => 'text'
															),
															array(
																'object' => 'meta',
																'name'   => 'desc_slider',
																'title'  => 'Description Slider',
																'type'   => 'textarea'
															),
															array(
																'object' => 'meta',
																'name'   => 'slider_btn1',
																'title'  => 'Slider Button 1',
																'type'   => 'text'
															),
															array(
																'object' => 'meta',
																'name'   => 'slider_btn1_link',
																'title'  => 'Link Slider Button 1',
																'type'   => 'text'
															),
															array(
																'object' => 'meta',
																'name'   => 'slider_btn2',
																'title'  => 'Slider Button 2',
																'type'   => 'text'
															),
															array(
																'object' => 'meta',
																'name'   => 'slider_btn2_link',
																'title'  => 'Link Slider Button 2',
																'type'   => 'text'
															)
											)
									);
			}
			break;
			case 'email':

			break;
		}
		return $data;
	}
	private function defaultMetaBox($post_type){
		$status[1] = 'Publish'; 
		$status[0] = 'No Publish'; 
		$metaBox[] = array(
						'title' => 'Action',
						'position' => 'right',
						'fields' => array(
										array(
											'object'=> 'main',
											'name'	=> 'status',
											'title'	=> 'Status',
											'type'	=> 'select',
											'options' => $status
										),
										array(
											'object'=> '-',
											'name'	=> 'submit',
											'value'	=> 'Submit',
											'type'	=> 'submit',
											'extra' => array(
															'class'	=> 'btn btn-primary',
															'id'	=> 'btn-add-post',
														)
										)
									)
					);
		$n  = ucwords(url_title($post_type ," ", TRUE ));
		$title 	=   ($this->postData == null) ? 'Add '.$n : 'Edit '.$n;
		$metaBox[] = array(
						'title' => $title,
						'position' => 'left',
						'fields' => array(
										array(
											'object'=> 'main',
											'name'	=> 'title',
											'title'	=> 'Title',
											'type'	=> 'text',
										),
										array(
											'object'=> 'main',
											'name'	=> 'slug',
											'title'	=> 'Slug',
											'type'	=> 'slug',
											'extra'	=> [
														'placeholder' => '(Opsional)'
													]
										),
										array(
											'object'=> 'main',
											'name'	=> 'content',
											'title'	=> 'Content',
											'type'	=> 'editor',
										)
									)
					);
		return $metaBox;
	}
}