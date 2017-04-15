<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Contest extends Admin{
	function __construct(){
		parent::__construct();
	}
	function index(){
		// show list contest

	}
	function add($contest_id){
		// $contest_id
		// this->_post('submit') && $contest_id=='' ContestModel.addContest()
		// this->_post('submit') && $contest_id!='' ContestModel.editContest()
		// get = ContestModel.getContest()
	}
	function delete($contest_id){
		// ContestModel.deleteContest()
	}
	function datatable(){
		// ContestModel.getDatatableContest()
	}
	function opencontest(){
		// render list opencontest
	}
	function open($opencontest_id){
		// ifcontest                        
		// this->_post('submit') && $opencontest_id!='' ContestModel.addOpenContest()
		// this->_post('submit') && $opencontest_id!='' ContestModel.editOpenContest()
		// $get = ContestModel.getOpenContest()
	}
	function delete_opencontest($opencontest_id){
		// ContestModel.deleteOpenContest()
	}
	function datatable_opencontest(){
		// ContestModel.datatableOpenContest();
	}
	function contest_type(){
		// render list contest type
	}
	function contest_type_add(){
		// ini untuk add/edit contest type
		// this->_post('submit') && $opencontest_id=='' ContestModel.addOpenContest()
		// this->_post('submit') && $opencontest_id!='' ContestModel.editOpenContest()
		// ContestModel.getContestType()
	}
	function delete_contest_type(){
		// ContestModel.deleteContestType()
	}
	function datatable_contest_type(){
		// ContestModel.datatableContestType()
	}
	function contest_category(){
		//category contest masuk taxonomy(contestcategory) , term(Freeroll,regular,special,sit&go)
		//render list contest category
	}
	function contest_category_add($category_id){
		// this->_post('submit') && $category_id == '' TermModel.addTerm();
		// this->_post('submit') && $category_id != '' TermModel.updateTerm();
		// get = TermModel.getTermByID()
	}
	function delete_contest_category($category_id){
		// TermModel.deleteTerm()
	}
	function datatable_contest_category(){
		// datatableContestCategory
	}
}