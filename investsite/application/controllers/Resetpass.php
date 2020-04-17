<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpass extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_resetpass");
	}
	
	

	public function index()
	{
		if($this->input->post()){
			$username= $this->input->post("username");
			
			$query = $this->db->query("SELECT `username`,`password`,`email` FROM `member` WHERE `username`='$username' OR `email`='$username'");
			
			if($query->num_rows()>0){
					foreach($query->result() as $row){
						$username=  $row->username;
						$password = $row->password;
						$email = $row->email;
					}
					
					$this->load->library('email');

					$this->email->from('info@bdcashout.com', 'Bdcashout');
					$this->email->to($email);
		

					$this->email->subject('Bdcashout Password Recovery');
					$message =  "Your Bdcashut.com <br/> Username : ". $username . "<br/> Password " . $password . "<br/> Email : " .$email ."<br/> Thanks";
					$this->email->message($message);

					$this->email->send();
					
					$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
							Username or Email Not Exist as a Member. Please Signup.
						</div>');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
					Username or Email Not Exist as a Member. Please Signup.
				</div>');
			}
			
			
			
			  	redirect('welcome/login');
		
		}else{
			$data['title'] = "Login Page";
			$data['content'] = $this->load->view("home/resetpass_view", $data, true);
			$this->load->view("home/main_view", $data);	
		}
		
	}
	
	

	
}
