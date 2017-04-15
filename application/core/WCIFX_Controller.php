<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class WCIFX_Controller extends CI_Controller{
	protected $ID;	//ID user login
	private $defLang	= 'id'; // default language
	protected $viewData = array();
	protected $isLogin 	= false;
	protected $isAdmin 	= false;
	protected $isMember = false;
	protected $langID 	= false; //defaults
	protected $loaderJS = array();	//File JS,
	protected $themeOptions = array();
	function __construct(){
		parent::__construct();
		$this->hookLanguage();
		$this->setProperty();
	}
	function setProperty(){
		$this->ID = $this->session->userdata("ID");
		$this->isLogin = $this->session->userdata("isLogin");
		$this->isAdmin = $this->session->userdata("isAdmin");
		$this->isMember= $this->session->userdata("isMember");
		$this->langID  = $this->session->userdata("langID");
		if($this->langID == null){
			$this->langID 	= $this->defLang;
			$this->session->set_userdata('langID' , $this->defLang);
		}
		$get = $this->GlobalModel->getCore('general');
		$this->themeOptions = ($get != null)? (array)json_decode($get) : array();
	}
	function getUserLogin(){
		if($this->isAdmin){
			//get from tabel user
		}elseif ($this->isMember) {
			//get from tabel member
			//
		}
		//return data user login
	}
	function hookLanguage(){
		$getLang = $this->input->get('lang');
		if($getLang){
			$this->setTranslate($getLang);
		}
	}
	function setTranslate($lang){
		$listLang = array_keys($this->config->item('WCIFX_language'));
		if(in_array($lang,$listLang)){
			$this->session->set_userdata('langID' , $lang);

		    // bindtextdomain($lang, $lang_path); // untuk po mo files
		    // textdomain($lang);
		    $this->langID = $lang;
		}
	}
	function WCIFXUploadImage($filename , $imgFor , $crop = true){
		$data['success']= false; 
		$data['data'] 	= ''; 
		$imgGet	= myImageConfig($imgFor);
		if(!$imgGet){
			$data['data'] = "image for is not set in config.php";
			return $data;
		}
		if(!is_dir(FCPATH.$imgGet['path'])){ //create dir if not exist
			mkdir(FCPATH.$imgGet['path']);
		}
		$config['upload_path']          = FCPATH.$imgGet['path'];
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($filename)){
        	$data['data']	= $this->upload->display_errors();
        }else{
        	$updata	= $this->upload->data();
        	$data['success']= true;
        	$data['data']	= $updata;
        	$imageSize = isset($imgGet['size'])?$imgGet['size']:null;
        	if($imageSize != null){
        		foreach ($imageSize as $key => $size) {
        			$this->WCIFXResizeCrop($updata['raw_name'] , $updata['file_ext'] , $updata['file_path'] ,  $size[0] , $size[1] , $crop );
        			$data['data'][ "size_".$key ] = getImage($updata['file_name'] , $key , $imgFor , false);
        		}
        	}
        	$data['data']['image_path'] = $imgGet['path']; //set image path url 
        }
        return $data;

	}
	function WCIFXUploadFile($filename){
		
	}
	private function WCIFXResizeCrop($name = "" , $ext = "" ,$path = "" , $width = 0 , $height = 0 , $crop ){
		$this->load->library('image_lib');
		$resize['image_library'] = 'gd2';
		$resize['source_image'] = $path.$name.$ext;
		$resize['create_thumb'] = FALSE;
		$resize['maintain_ratio'] = TRUE;
		$resize['new_image']	= $path.$name ."-".$width."x".$height.$ext;
		$resize['width'] = $width;
		$resize['height'] = $height;
		$get_image = getimagesize($resize['source_image']);
		if($get_image[0] > $width && $get_image[1] > $height){ // gambar lebih dari ukuran
			if( (float)($get_image[0] / $width) > (float)($get_image[1] / $height) ){ // optimal ke height
				$resize['width'] = ($get_image[0] * $get_image[1]);
				$resize['height'] = $height;
			}else{	// optimal ke width
				$resize['width'] = $width;
				$resize['height'] = ($get_image[0] * $get_image[1]);
			}
		}else{
			if( abs(($get_image[0] - $width)) >= abs( ($get_image[1] - $height) ) ){ // lebar gambar kurang dari ukuran
				$resize['width'] = $width;
				$resize['height'] = ($get_image[0] * $get_image[1]);
			}else{ // tinggi kurang
				$resize['height'] = $height;
				$resize['width'] = ($get_image[0] * $get_image[1]);
			}
		}
		$this->image_lib->initialize($resize); 
		$this->image_lib->resize();
		$this->image_lib->clear();
		if($crop){ // cropping image
			$config['image_library'] = $resize['image_library'];
			$config['source_image'] =$resize['new_image'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['width'] = $width;
			$config['height'] = $height;
			$get_image = getimagesize($config['source_image']);
			if($get_image[0] == $width){
				$config['y_axis'] = ($get_image[1]-$height)/2;
			}else{
				$config['x_axis'] = ($get_image[0]-$width)/2;
			}
			$this->image_lib->initialize($config); 
			$this->image_lib->crop();
			$this->image_lib->clear();
		}
	}
	function renderMenu($menu_pos){
		$this->load->model("MenuModel");
		return $this->MenuModel->getMenuHtml($menu_pos);
	}
	function loadJs($js =null){
		$ret = '';
		if($js != null){
			foreach ($js as $value) {
				$ret .= '<script type="text/javascript" src="'.$value.'"></script>';
			}
		}
		return $ret;
	}
	function _post($f , $xss = true){
		return $this->input->post($f , $xss);
	}
	function WCIFXPostDT($postDT){
		$defField = array(
					'field'	=> '',
					'label'	=> '',
					'rules'	=> 'required', //default rules is required
					'fieldTbl' => '', //is for table field name
					'setData' => true //is for set data return	
				);
		$valid 	= false;
		$data 	= array();
		$message= '';
		$rules 	= array();
		foreach ($postDT as $key=>$item) {
			$item 	= array_merge($defField , $item);
			$rules[]= $item;
		}
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()){
			foreach ($postDT as $item) {
				$item 	= array_merge($defField , $item);
				if(!$item['setData'])
					continue;

				$item['fieldTbl'] = ($item['fieldTbl'] == '') ? $item['field'] : $item['fieldTbl']; 
				$data[ $item['fieldTbl'] ] =  $this->_post($item['field']) ;
			}
			$valid 	= true;
			$this->form_validation->reset_validation();
		}else{
			$message= validation_errors();
		}

		return [ 'valid' => $valid, 'message' => $message, 'data' => $data];
	}

}

class Admin extends WCIFX_Controller{
	protected $admUrl; //untuk settingan url admin , karena nanti dibuat acak
	function __construct(){
		parent::__construct();
		$this->load->helper("Admin");
		$this->admUrl = $this->config->item('WCIFX_admin_url');
		if(!$this->isLogin || !$this->isAdmin){
			redirect(base_url().$admUrl);
		}
	}
	function renderPage($view){
		$this->header();		
		$this->sidebar();		
		$this->load->view('backoffices/'.$view , $this->viewData);		
		$this->footer();
	}
	function header(){
		$data['primary_menu']	= "";
		$data['adminUrl']		= site_url($this->admUrl);
		$this->load->view('backoffices/header' , $data);
	}
	function sidebar(){
		$data = array();
		$this->load->view('backoffices/sidebar' , $data);
	}
	function footer(){
		$data = array();
		$data['JSFile'] = $this->loadJs($this->loaderJS);
		$this->load->view('backoffices/footer' , $data);
	}
}

class Front extends WCIFX_Controller{
	protected $widgetList = array();
	function __construct(){
		parent::__construct();
	}
	function renderPage($view){
		$this->setWidget();		
		$this->header();
		$this->load->view($view , $this->viewData);		
		$this->footer();
	}
	function header(){
		$data['general'] = $this->themeOptions;
		// var_dump($data['general']);die;		
		$data['primary_menu']	= $this->renderMenu('primary');
		$this->load->view('header' , $data);
	}
	function footer(){
		$data['JSFile'] = $this->loadJs($this->loaderJS);
		$this->load->view('footer' , $data);
	}
	private function setWidget(){
		if($this->widgetList == null){
			$this->viewData['dataWidget'] = null;
		}else{
			$dataWidget = array();
			foreach ($this->widgetList as $widget) {
				$view = 'widgets/'.$widget['view'];
				$dataWidget[$widget['position']][] = $this->load->view($view , $widget['data'] , true);
			}
			$this->viewData['dataWidget'] = $dataWidget;
		}
	}
	private function renderBreadcrumbs(){
		
	}
}
class Member extends WCIFX_Controller{
	function __construct(){
		parent::__construct();

	}
	function renderPage($view){
		$this->header();
		$this->load->view($view , $this->viewData);		
		$this->footer();
	}
	function header(){
		$data['general'] = $this->themeOptions;
		$data['primary_menu']	= $this->renderMenu('primary');
		$this->load->view('header' , $data);
	}
	function footer(){
		$data['JSFile'] = $this->loadJs($this->loaderJS);
		$this->load->view('footer' , $data);
	}	
}
//widget usable
//$this->widgetList[] = array(
// 				'position' 	=> 'sidebar|footer',
// 				'name' 		=> 'popular_post', //template name
// 				'data' 		=> $this->WidgetModel->popularPost(),
// )
class Api extends WCIFX_Controller{
	function __construct(){
		parent::__construct();
		// $this->checkAuth();
	}
	protected function checkAuth(){
		if($this->isLogin){
			//true
		}else{
			die('Access auth needed');
		}
	}
	protected function checkHeader(){

	}
	function setResponse($data = array()){
		$def = [
					'success' 	=> false,
					'data' 		=> ''
				];
		$data = array_merge($def , (array)$data);
		echo json_encode($data);
		die;
	}

}