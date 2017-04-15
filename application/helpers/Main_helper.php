<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
	function myDate($params = "Y-m-d H:i:s"){
		date_default_timezone_set("Asia/Jakarta");
		return date($params);
	}
	
	/*
	 * Create form token
	 * @paramater object class security
	 */
	function csrfToken($CI) {
	    echo '<input type="hidden" name='.$CI->security->get_csrf_token_name().' value='.$CI->security->get_csrf_hash().'>';
	}
	function myAlert($msg, $type = 'success'){
		if($msg == ''){
			return '';
		}
		return '<div class="alert alert-dismissable alert-'.$type.'"><a class="close" data-dismiss="alert" aria-label="close">×</a>'.$msg.'</div>';
	}
	function myCountryList(){
		global $CFG;
		$path = $CFG->config['cache_path'].'country/';
		$fname= 'country.json';
		if(file_exists($path.$fname)){
			return json_decode(file_get_contents($path.$fname));
		}
		if(!is_dir($path))
			mkdir($path , 0777 , true);
		$get_content = file_get_contents('http://country.io/names.json');
		file_put_contents($path.$fname, $get_content);
		return json_decode($get_content);
	}
	function myPassword($password, $crypt = PASSWORD_BCRYPT){
		return password_hash($password, $crypt);
	}
	function myImageConfig($imgFor = null){
		global $CFG;
		$imageConf = $CFG->config['WCIFX_image_config'];
		if($imgFor != null){
			return isset($imageConf[$imgFor]) ? $imageConf[$imgFor] : false;
		}else{
			return $imageConf;
		}
	}
	function getImage($image , $size , $imgFor , $fullpath = true){
		global $CFG;
		$imageConf= $CFG->config['WCIFX_image_config'];
		$exImg  	= explode(".", $image);
		if(count($exImg) < 2)
		    return $image;
		if(!isset($imageConf[$imgFor]['size'][$size]))
		    return $image;
		$ext    	= array_pop($exImg);
		$newImage	= implode(".", $exImg);
		$getSize	= $imageConf[$imgFor]['size'][$size];
		$newImage	= $newImage.'-'.implode("x",$getSize).'.'.$ext;
		if($fullpath){
			return site_url($imageConf[$imgFor]['path'] .'/'.$newImage );
		}else{
			return $newImage;
		}
	}
	function gender($val){
		switch ($val) {
			case 'L':
				return 'Laki - laki';
				break;			
			case 'P':
				return 'Perempuan';
				break;
		}
	}
	function statusStaff($val){
		switch ($val){
			case '0':
				return 'Tidak Aktif';
				break;
			case '1':
				return 'Aktif';
				break;
			case '2':
				return 'Block';
			break;
		}
	}
	function statusPost($sts){
		switch ($sts) {
			case 0:
				$data = 'Draf';;
			break;
			case 1:
				$data = 'Publish';;
			break;
			default:
				$data = 'Unknown';
			break;
		}
		return $data;
	}
	function myExplode($string){
		$explode = explode("\n", $string);
		return $explode;
	}
	function mySlider($CI, $sliders){
		$sld = '';
		$nav = '';
		foreach ($sliders as $slider) {
		$imgSlider = getImage($slider->meta['img_slider'] , 'large' , 'post'); 
		$sld .='<div class="slider-homepage-item" data-bg-image="'.$imgSlider.'" style="background-image: url(\''.$imgSlider.'\');">';
		  $sld .='<div class="container">';
		    $sld .='<div class="row">';
		      $sld .='<div class="col-md-6">';
		        $sld .='<div class="silder-home-content">';
		          $sld .='<h4>'.translate($CI, $slider->title).'</h4>';
		          $sld .='<p>'.translate($CI, $slider->content).'</p>';
		          	  $sld .='<div class="slider-home-action">';
		               $sld .='<a href="'.translate($CI, $slider->meta['slider_btn1_link']).'" class="btn btn-primary">'.translate($CI, $slider->meta['slider_btn1']).'</a>';
		               $sld .='<a href="'.translate($CI, $slider->meta['slider_btn2_link']).'" class="btn btn-primary">'.translate($CI, $slider->meta['slider_btn2']).'</a>';
		              $sld .='</div>';
		        $sld .='</div>';
		      $sld .='</div>';
		    $sld .='</div>';
		  $sld .='</div>';
		$sld .='</div>';
		$nav .='<li class="col-md-3">';
		$nav .='<a class="slider-nav__headtitle" href="#">'.translate($CI, $slider->meta['title_slider']).'<span class="slider-nav__sublabel">'.translate($CI, $slider->meta['desc_slider']).'</span></a>';
		$nav .='</li>';
		}
		$data = array('slider' => $sld, 'nav' => $nav);
		return $data;
	}
	function myPermalink($CI, $postid , $getPost = null){
		if($getPost === null){
			$getPost = $CI->PostModel->getSinglePost($postid);
		}
		$url = '';
		if($getPost != null){
			switch ($getPost->post_type) {
				case 'page':
					$url = base_url().$getPost->slug;
					break;			
				case 'diary':
					$url = base_url().'diary/'.$getPost->slug;
					break;
				case 'news':
					$url = base_url().'news/single/'.$getPost->slug;
					break;
			}
		}
		return $url;
	}
	function myAvatar($image, $fieldname, $size = 'medium'){
		$avatar  = '<div class="avatar">';
			$avatar .= '<img src="'.getImage($image, $size, 'post').'" alt="Avatar" class="img-avatar img-responsive">';
			$avatar .= '<button class="btn btn-primary btn-avatar del-img-dz">Remove Image</button>';
			$avatar .= '<input type="hidden" name="'.$fieldname.'" value="'.$image.'">';
		$avatar .= '</div>';
		return $avatar;
	}