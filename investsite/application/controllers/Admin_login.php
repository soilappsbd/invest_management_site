<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_admin");
	}
	
//Dashboard	

	public function index()
	{
		
		if($this->input->post()){
			$this->Model_admin->validate();
			$url = base_url()."Admin";
			if($this->session->userdata('admin_login')==true){
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
			$data['title'] = "Admin Login";
			$this->load->view('admin/login_view', $data);
		}
	}	
		


	
	
}
