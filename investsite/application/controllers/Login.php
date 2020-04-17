<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_login");
	}
	
	

	public function index()
	{
		if($this->input->post()){
			$this->Model_login->validate();
			$url = base_url()."account";
			if($this->session->userdata('login')==true){
		    	redirect($url, 'refresh');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Wrong Username or Password
              </div>');
			  	redirect('welcome');
			}
			
		}else{
			$data['title'] = "Login";
			$this->load->view('login_view');
			
		}
		
	
	}
	

	
}
