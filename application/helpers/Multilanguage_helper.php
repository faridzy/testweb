<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function translate($CI , $content , $default = '' ,$lang = null ){
	$lang = ($lang != null) ? $lang : $CI->session->userdata("langID");
	$content= parseTranslate($content);
	return isset($content[$lang]) ? $content[$lang] : $default;
}
function setTranslate($inputArray = array() ){
	global $CFG;
	$lang = $CFG->config['WCIFX_language'];
	$data = '';
	if(! is_array($inputArray))
		return $inputArray;
	
	foreach ($inputArray as $key => $val) {
		if(isset($lang[$key])){
			$data 	.= "[:{$key}]" . $val . "[/:{$key}]";
		}else{
			$data[$key]	= $val;
		}
	}
	return $data;
}
function parseTranslate($content){
	preg_match_all('/\[:(.*?)]((.|\s)*?)\[\/:(.*?)]/', $content, $match);
	if(!isset($match[2]))
		return $content;
	$data = array();
	foreach ($match[2] as $key => $text) {
		$data[ $match[1][$key] ] = $text;
	}
	return $data;
}
function wcifxLangSelect(){
	$listLang = array('id' => 'Indonesia','en' => 'English');
	$sel = '<select class="wcifx-change-lang">';
	foreach ($listLang as $idLang => $lang) {
		$sel .= '<option value="'.$idLang.'">'.$lang.'</option>';
	}
	$sel .= '</select>';
	echo $sel;
}
function wcifxInput($type,$name,$value = '',$attr = array() , $echo = true ){
	$listLang = array('id' => 'Indonesia','en' => 'English');
	$valueLang = parseTranslate($value);
	$classInput = 'input-lang'; // for Javascript hidden field when languange changed
	if(isset($attr['class'])){
		$classInput.=' '.$attr['class'];
		unset($attr['class']);
	}
	$data = '';
	foreach ($listLang as $idLang => $lang) {
		$thisVal 	= isset($valueLang[$idLang]) ? $valueLang[$idLang] : '';
		// $thisVal 	= $valueLang;
		switch ($type) {
			case 'textarea':
				$inpAttr = array(
								'name'	=> $name."[{$idLang}]",
								'value'	=> $thisVal,
								'class'	=> $classInput.' '.$idLang,
							); 
				$data	.= form_textarea($inpAttr , $thisVal , $attr);
			break;
			case 'editor':
				$inpAttr = array(
								'name'	=> $name."[{$idLang}]",
								'value'	=> $thisVal,
								'class'	=> 'wcifx-editor '.$classInput.' '.$idLang,
							); 
				$data 	.= form_textarea($inpAttr , $thisVal , $attr);
			break;
			default:
				$inpAttr = array(
							'type'	=> $type,
							'name'	=> $name."[{$idLang}]",
							'value'	=> $thisVal,
							'class'	=> $classInput.' '.$idLang,
						); 
				$data	.= form_input($inpAttr , $thisVal , $attr);
			break;
		}
	}
	if($echo){
		echo $data;
	}else{
		return $data;
	}
}

function formGroup($title , $input){
	$ret = '<div class="form-group">'."\n";
	$ret.= '<label  class="control-label"> '.$title.' </label>'."\n";
	$ret.= $input;
	$ret.= '</div>'."\n";
	return $ret;
}