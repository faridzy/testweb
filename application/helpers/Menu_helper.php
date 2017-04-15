<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function primaryMenu($data){
	if($data == null)
		return '';
	$ret = dropdownSubmenu($data, 'nav navbar-nav' );
	return $ret;
}
function footer1MenuLeft($data){
	//render string html menu
}
function footer1MenuRight($data){
	//render string html menu
}
function footer2Menu($data){
	if($data == null)
		return '';
	$ret = '';
	$base_url = base_url();
	foreach ($data as $item) {
		if( !isset($item['child']) || $item['child'] == null ){
			$ret .='<div class="company-link"><h4 class="company-link__title">'.$item['title'].'</h4></div>';
		}else{
			$ret .= '<div class="company-link">';
			$ret .= '<h4 class="company-link__title">'.$item['title'].'</h4>';
			$ret .= dropdownSubmenu($item['child'] , 'company-link__list list-unstyled');
			$ret .='</div>';
		}
	}
	return $ret;
}
function dropdownSubmenu($data , $ulClass = ''){
	if($data == null)
		return '';
	$ret = '<ul class="'.$ulClass.'">';
	$base_url = base_url();
	foreach ($data as $item) {
		if( !isset($item['child']) || $item['child'] == null ){
			$ret .='<li><a href="'.$base_url.$item['slug'].'">'.$item['title'].'</a></li>';
		}else{
			$ret .= '<li class="dropdown">';
			$ret .= '<a href="'.$base_url.$item['slug'].'" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$item['title'].'</a>';
			$ret .= dropdownSubmenu($item['child'] , 'dropdown-menu');
			$ret .='</li>';
		}
	}
	$ret .='</ul>';
	return $ret;
}

//Admin
function formNested($CI , $data = null){
	$ret = '<ol class="sortable ui-sortable wcifx-menu-nested">';
	if($data != null){
		foreach ($data as $item) {
			$ret .= itemNested($CI,$item['type'],$item['item_id'],$item['title'],$item['object'],$item['child']);
		}
	}
	$ret .='</ol>';
	return $ret;
}
function itemNested($CI ,$type , $item_id , $item_title , $object , $child = null,$new = false){
	$ret = '<li id="menuItem_'.$item_id.'">
               <div class="menuDiv">
                   	<span class="disclose ui-icon ui-icon-minusthick"></span>
                   	<span data-id="'.$item_id.'" class="expandEditor ui-icon ui-icon-triangle-1-n"></span>
                   	<span>
                   		<span class="title">'.translate($CI , $item_title).'</span>
                    	<span data-id="'.$item_id.'" class="deleteMenu ui-icon ui-icon-closethick"></span>
                   	</span>
                   	<div class="menuEdit"  id="menuEdit'.$item_id.'">
                        '.contentNested($CI , $type , $item_id , $item_title , $object , $new).'
                   	</div>
               </div>';
               if($child !== null){
	               	$ret .='<ol>';
	               	foreach ($child as $itmChild) {
	               		$ret .= itemNested($CI,$itmChild['type'],$itmChild['item_id'],$itmChild['title'],$itmChild['object'],$itmChild['child']);
	               	}
	               	$ret .='</ol>';
               }
    $ret .='</li>';
    return $ret;
}
function contentNested($CI ,$type , $item_id , $item_title , $object , $new = false){
	$input = '';
	switch ($type) {
		case 'custom':
			$input .= formGroup('Title' , wcifxInput('text', 'item_title_'.$item_id ,$item_title,['class'=>'form-control'] , false) );
			$input .= formGroup('Link' , form_input([ 'type'=>'text','name'=>'item_object_'.$item_id, 'value' => $object ,'class'=>'form-control' ]) );
		break;
		case 'page':
		// var_dump($object);die;
			$input .= formGroup('Title' , wcifxInput('text', 'item_title_'.$item_id ,$item_title,['class'=>'form-control'] , false) );
			$input .= formGroup('Link' , '<br><a href="'.myPermalink($CI,$object).'" target="_blank">'.translate($CI,$item_title).'</a>');
			$input .= form_input([ 'type'=>'hidden','name'=>'item_object_'.$item_id, 'value' => $object ]);
			
		break;
	}
	$input 	.= form_input([ 'type'=>'hidden','name'=>'item_type_'.$item_id, 'value' => $type ]);
	if($new){
		$input 	.= form_input([ 'type'=>'hidden','name'=>'item_new_'.$item_id, 'value' => 'true' ]);	
	}
	return $input;
}