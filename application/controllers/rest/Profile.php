<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Api{
	function __construct(){
		parent::__construct();
	}
	function change_status(){
		//MemberModel.editMemberByCols();
	}
	function change_password(){
		//MemberModel.editMemberByCols();
	}
	function change_phone(){
		//MemberModel.editMemberByCols();
	}
	function change_avatar(){
		//MemberModel.editMemberByCols();
	}
	function add_payment_system(){
		// PaymentModel.addPaymentMember();
	}
	function delete_payment_system(){
		// PaymentModel.deletePaymentMember();
	}
	function upload_certification(){
		//$this->WCIFXUploadFile();
		// MemberModel.uploadCertification($doc_name);
	}
	function upload_invest_agreement(){
		//$this->WCIFXUploadFile();
		// MemberModel.uploadInvestmentAggrement($doc_name);
	}
}	