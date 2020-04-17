<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signout extends CI_Controller {
	
///Signout
	public function index(){
		$this->session->sess_destroy(); 
		$destination = base_url();
		redirect($destination);
	}
	
	
	
}
