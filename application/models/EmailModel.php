<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class EmailModel extends WCIFX_Model{
	function __construct(){
		parent::__construct();
	}
	function getDatatable(){

    }
	function sendEmail(){
		
	}
	function wcifxMail($email){//function
		$defaults = array(
					'name_from'	=> '',
					'email_from'=> '',
					'email_to' 	=> '',
					'subject' 	=> '',
					'message' 	=> '',
					'attach' 	=> '',
				);
		$email 	= array_merge($defaults , $email); // override value
		$config = array(        //nanti config nya di buatkan di admin 
            'protocol'      => '', 
            'smtp_host'     => '',
            'smtp_port'     => ,
            'smtp_user'     => '',
            'smtp_pass'     => '',
            'smtp_timeout'  => '2',
            'mailtype'      => 'html', 
            'charset'       => 'iso-8859-1'
        );
		$this->load->library('email');
		$this->email->initialize($config);
		$this->email->clear();
        $this->email->set_newline("\r\n");
        $this->email->from($email['email_from'] , $email['name_from']); 
        $this->email->to($email['email_to']); 
        $this->email->subject($email['subject']);
        $this->email->message($email['message']);

        if($email['attach'] != ''){
            $this->email->attach($email['attach']);
        }

        if($this->email->send()){
            return true;
        }else{
            return $this->email->print_debugger();
            // return false;
        }  
	}
}