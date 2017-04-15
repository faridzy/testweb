<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Web_content extends Admin{	
	function __construct(){
		parent::__construct();
		$this->load->model('PosttypeModel');
	}
	function add_post($post_type = ''){
		$regPostType = $this->PosttypeModel->registerPostType($post_type);
		if($regPostType != false){
			$data['message']	= $this->session->flashdata('message');
			$data['wcifx_form']	= $regPostType;
			$this->viewData = $data;
			$this->renderPage('contents/web-content-add-post');
		}else{
			//show 404
		}
	}
	function set_post(){
		$confField	=[
						['field' => 'title[]' , 'label' => 'TItle' ],
					];
		$postDT = $this->WCIFXPostDT($confField);
		if($postDT['valid']){
			$this->PosttypeModel->setPost();
		}else{
			$this->session->set_flashdata('message' , myAlert($postDT['message'] , 'danger') );
			redirect(site_url($this->admUrl.'/web-content/add-post/'.$this->_post('post_type')));
		}
	}
	function edit_post($post_id = ''){
		$data['message']	= $this->session->flashdata('message');

		$postData = $this->PosttypeModel->postData($post_id);
		if($postData != null){
			$post_type	= $postData['post_type'];
			$data['wcifx_form']	= $this->PosttypeModel->registerPostType($post_type , $postData);
			$this->viewData = $data;
			$this->renderPage('contents/web-content-add-post');
		}else{
			//show 404
		}
	}
	function show($post_type = ''){
		$dataPostType = $this->PosttypeModel->dataPostType($post_type , 'datatable');
		if($dataPostType != null){
			$data['postType'] 		= $post_type;
			$data['datatableField'] = $dataPostType['datatable'];
			$data['message'] = $this->session->flashdata('del-msg');
			$this->viewData	= $data;
			$this->renderPage('contents/web-content-show');
		}else{
			//show 404
		}
	}
	function delete_post($post_type, $post_id){
		//PostModel.deletePost()
		if ($post_id != ''){
			$admUrl = $this->admUrl;
			$this->load->model('PostModel');
			$this->PostModel->deletePost($post_id);
			$msg = myAlert('Data Berhasil Dihapus', 'warning');
			// $msg = $this->_post('post_type');
			$this->session->set_flashdata('del-msg', $msg);
			redirect(base_url().$admUrl.'/web-content/show/'.$post_type);
		}
	}
	function datatable($post_type = ''){
		switch ($post_type) {
			case 'page':
				$this->load->model('PageModel');
				$data = $this->PageModel->getDatatable();
			break;
			case 'news':
				$this->load->model('NewsModel');
				$data = $this->NewsModel->getDatatable();
			break;
			case 'diary':
				$this->load->model('DiaryModel');
				$data = $this->DiaryModel->getDatatable();
			break;
			case 'slider':
				$this->load->model('SliderModel');
				$data = $this->SliderModel->getDatatable();
			break;
		}
		echo json_encode($data);
	}
	function upload(){
		$data = $this->WCIFXUploadImage('file' , 'post');
		echo json_encode($data);
		die;
	}

}