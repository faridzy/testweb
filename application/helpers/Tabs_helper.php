<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function tabsData($get = null){
	$data = array(
				'profile'=>array(
							'title' => 'My Profile',
							'id' 	=> 'account-tabs-profile',
							'class' => 'tabs-private',
							'position' => 'left'
						),
				'settings'=>array(
							'title' => 'Settings',
							'id' 	=> 'account-tabs-settings',
							'class' => 'tabs-private',
							'position' => 'left'
						),
				'diary'	=>array(
							'title' => 'Diary',
							'id' 	=> 'account-tabs-diary',
							'class' => 'tabs-private',
							'position' => 'left'
						)
			);
	return ($get == null) ? $data : $data[$get];
}
function tabsAccountItem(){

}
function dummyAccount(){ //ini hanya dummy , nanti kalau udah connect db bisa pake real data
	$data = array(
				'account1'=>array(
							'title'	=>'Account 1',
							'id'	=>'account1',
							'class'	=>'tabs-account',
							'position'	=>'right',
						),
				'account2'=>array(
							'title'	=>'Account 2',
							'id'	=>'account2',
							'class'	=>'tabs-account',
							'position'	=>'right',
						),
			);
	return $data;
}