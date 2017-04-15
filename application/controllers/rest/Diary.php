<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Diary extends Api{
	function __construct(){
		parent::__construct();
	}
	function like(){
		//DiaryModel.like()
	}
	function unlike(){
		//DiaryModel.unlike()
	}
	function comment(){
		//DiaryModel.comment()
	}
	function delete_comment(){
		//DiaryModel.deleteComment()
	}
	function share(){
		//DiaryModel.share()
	}
	function unshare(){ 
		//PostModel.deletePost()
	}
	
	function add_diary(){
		//DiaryModel.addDiary()
	}
	function delete_diary(){
		//PostModel.deletePost()
	}
	function edit_diary(){
		//DiaryModel.editDiary()
	}
}	