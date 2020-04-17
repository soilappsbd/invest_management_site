<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_common");
		$this->load->model("Model_account");
	}
	
	
// Home Page
	public function index()
	{
		echo "No Direct Access";
	}
	



	

///Cron


	
}
