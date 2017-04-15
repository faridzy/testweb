<?php
class Posttype{
	protected $metaBox 	= array();
	public $formAction;
	protected $data;
	protected $postType;
	public $defaultsField = array('object' => '-','name'=> '' , 'title' => '' , 'type' => '' , 'value'=>'' , 'extra' => array() );
	
	function init($post_type , $data = null){
		$this->data 	= $data; 
		$this->postType = $post_type;
	}
	function setAction($act){
		$this->formAction = $act;
	}
	function addMetaBox($meta = array()){
		$defaults = array(
						'title' 	=> '',
						'position' 	=> 'left',
						'fields' 	=> array()
					);
		$meta 	= array_merge($defaults , $meta);
		$this->metaBox[] = $meta;
	}
	function renderForm(){
		$ret = form_open_multipart($this->formAction);
		$ret.= '<div class="col-md-7">'."\n";
		$ret.= $this->_hiddenInput();
		$ret.= $this->_formLeft();
		$ret.= '</div>'."\n";
		$ret.= '<div class="col-md-5">'."\n";
		$ret.= $this->_formRight();
		$ret.= '</div>'."\n";
		$ret.= form_close();
		return $ret;
	}
	function _formLeft(){
		$metaLeft = array_filter($this->metaBox , function($v){ return $v['position']== 'left'; });
		$data ='';
		if($metaLeft != null){
			foreach ($metaLeft as $meta) {
				$data .= $this->_formMetaBoxOpen($meta['title']);
				$fields = isset($meta['fields']) ? $meta['fields'] : null;
				if($fields != null){
					foreach ($fields as $field) {
						$data .= $this->_formGroup($field);
					}
				}
				$data .= $this->_formMetaBoxClose();
			}
		}
		return $data;
	}
	function _formRight(){
		$metaRight= array_filter($this->metaBox , function($v){ return $v['position']== 'right'; }); 
		$data ='';
		if($metaRight != null){
			foreach ($metaRight as $meta) {
				$data .= $this->_formMetaBoxOpen($meta['title']);
				$fields = isset($meta['fields']) ? $meta['fields'] : null;
				if($fields != null){
					foreach ($fields as $field) {
						$data .= $this->_formGroup($field);
					}
				}
				$data .= $this->_formMetaBoxClose();
			}
		}
		return $data;
		
	}
	function _renderField($field){
		$data 	= '';
		$mainClass 	= ' form-control ';
		$attr 		= $field['extra'];
		switch ($field['type']) {
			case 'view':
				$data = '<p>'.$field['value'].'</p>';
			break;
			case 'text':
				isset($attr['class']) ? $attr['class'] .= $mainClass : $attr['class'] = $mainClass; //inject class form-control
				$data = wcifxInput('text' , $field['name'] , $field['value'] , $attr , FALSE);
			break;
			case 'textarea':
				isset($attr['class']) ? $attr['class'] .= $mainClass : $attr['class'] = $mainClass; //inject class form-control
				$data = wcifxInput('textarea' , $field['name'] , $field['value'] , $attr , FALSE);
			break;
			case 'editor':
				isset($attr['class']) ? $attr['class'] .= $mainClass : $attr['class'] = $mainClass;
				$data = wcifxInput('editor' , $field['name'] , $field['value'] , $attr , FALSE);
			break;
			case 'select':
				isset($attr['class']) ? $attr['class'] .= $mainClass : $attr['class'] = $mainClass;
				$selData = array(
							'name' => $field['name']
						);
				$options = isset($field['options']) ? $field['options'] : null;
				$data = form_dropdown($selData , $options , $field['value'] , $attr);
			break;
			case 'submit':
			case 'button':
				$mainAttr = array('name'=>$field['name'],'type'=>$field['type']);
				$attr = array_merge($attr , $mainAttr); 
				$data = form_button($attr ,$field['value']);
			break;
			case 'upload':
				$attr = array_merge( ['data-url'=>'web-content/upload', 'is-large' => '0'] , $attr);
				$data = "<div class='wcifx-upload dropzone ".(($field['value']!= '')?'hidden':'' )."' data-name='".$field['name']."' data-url='".$attr['data-url']."' is-large='".$attr['is-large']."'></div>";
				if($field['value'] != ''){
					$size = ($attr['is-large'] == '1')? 'large' : 'medium';
					$imgSrc = getImage($field['value'] , $size , 'post' );
					$data.='<div class="avatar">
						      <img src="'.$imgSrc.'" class="img-avatar img-responsive">
						      <button class="btn btn-primary btn-avatar del-img-dz">Remove Image</button>
						      <input type="hidden" name="'.$field['name'].'" value="'.$field['value'].'">
						    </div>';
				}
			break;
			case 'slug':
				isset($attr['class']) ? $attr['class'] .= $mainClass : $attr['class'] = $mainClass;
				$data = form_input( [ 'type'=>'text' , 'name'=>$field['name'] ] , $field['value'] , $attr);
			break;
			default: // field input
				isset($attr['class']) ? $attr['class'] .= $mainClass : $attr['class'] = $mainClass;
				$data = wcifxInput($field['type'] , $field['name'] , $field['value'] , $attr , FALSE);
			break;
		}
		return $data;
	}
	function _formGroup($field){
		$field = array_merge($this->defaultsField , $field);
		if($this->data != null){
			if($field['value'] == ''){
				$newVal = '';
				switch ($field['object']) {
					case 'main':
						$newVal = isset($this->data[$field['name']] ) ? $this->data[$field['name']] : '';
					break;
					case 'meta':
						$newVal = isset($this->data['meta'][$field['name']]) ? $this->data['meta'][$field['name']] : ''; 
					break;
					case 'taxonomy':
						$filtVal = array_filter((array) $this->data['taxonomy'] , function($item) use($field){
							return ($item->taxonomy == $field['name']);
						});
						if($filtVal != null){
							foreach ($filtVal as $item) {
								$newVal[] = $item->term_id;
							}
						}
					break;
				}
				$field['value'] = $newVal;
			} 
		}
		$ret = '<div class="form-group">'."\n";
		$ret.= '<label  class="control-label"> '.$field['title'].' </label>'."\n";
		$ret.= $this->_renderField($field);
		$ret.= '</div>'."\n";
		return $ret;
	}
	function _formMetaBoxOpen($title){
		$ret = '<div class="box-metabox">'."\n";
		$ret.= '<h2>'.$title.'</h2>'."\n";
		return $ret;
	}
	function _formMetaBoxClose(){
		$ret = '</div>'."\n";
		return $ret;
	}
	function _hiddenInput(){
		$ret = '';
		$ret.= '<input type="hidden" name="post_id" value="'. (($this->data) ? $this->data['post_id'] :'') .'">';
		$ret.= '<input type="hidden" name="post_type" value="'. $this->postType .'">';
		return $ret;
	}
}