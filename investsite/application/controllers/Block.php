<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Block extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_account");
		$this->load->model("Model_common");
		
		//$this->check_isvalidated();
	}
	
	
	// Common Data	
	public function commondata(){
		$memberid = $this->session->userdata("id");
		
		$data['memberinfo'] = $this->Model_common->databysql("SELECT * FROM `member` WHERE `id`='$memberid'");
		$data['activedeposit'] = $this->Model_account->activedeposit($memberid);
		return $data;
	}

	public function index()
	{
		$data['title'] = "Blocked!";
		$memberid = $this->session->userdata("id");
		$data['commondata'] = $this->commondata();
		$data['package'] = $this->Model_common->databysql("SELECT `package`.* FROM `package`");
		$data['content'] = $this->load->view("account/block_view", $data, true);
		$this->load->view("home/main_view", $data);
	}	


	
	
// Home Page
	public function ddd()
	{
		if($this->session->userdata("login")==true){
			redirect("account");
		}else{
			$data['title'] = "Home Page";
			
			// Set referal Cookie
			$this->load->helper('cookie');
			$link =  $_SERVER['REQUEST_URI'];
			$pos = strpos($link, "ref=");
			$username = substr($link,$pos+4);
			
			$refid = $this->Model_home->useridbyuname($username);
			
			$affiliate = $this->input->set_cookie('affiliate', $refid , 3600);
			
			// Cokie end//
			
			$data['package'] = $this->Model_common->databysql("SELECT `package`.* FROM `package`");
			$data['content'] = $this->load->view("home/homepage_view", $data, true);
			$this->load->view("home/main_view", $data);
		}
		
	}
	




	
	
}
