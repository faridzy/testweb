<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallet extends Api{	
	function __construct(){
		parent::__construct();
	}
	function add_wallet(){
		// WalletModel.addWallet();
	}
	function deposit(){
		//melakukan transaksi deposit dari bank local ke wallet
		// PaymentModel.doPayment(deposit)
	}
	function withdraw(){
		//melakuakn transaksi withdraw dari wallet ke bank local
		// PaymentModel.doPayment(withdraw)
	}
	function delete_wallet(){
		// delete wallet
		// PaymentModel.deleteWallet()
	}
}