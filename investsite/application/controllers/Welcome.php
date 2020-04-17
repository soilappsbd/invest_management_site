<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//https://gourl.io/bitcoin-payment-gateway-api.html#p8  //https://block.io/
class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_login");
		$this->load->model("Model_home");
		$this->load->model("Model_common");
	}
	
	
// Home Page
	public function index()
	{
		//force_ssl();
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
			
			$data['totalmember'] = $this->Model_common->countrows("SELECT `id` FROM `member`");
			
			$data['totaldeposit'] = $this->Model_common->databysql("SELECT SUM(amount) as totaldeposit FROM `invest`");
			$data['totalwithdraw'] = $this->Model_common->databysql("SELECT SUM(amount) as totalwithdraw FROM `withdraw`");
			$data['lastmember'] = $this->Model_common->databysql("SELECT `username` FROM `member` ORDER BY `id` DESC LIMIT 1");
			$data['lastdeposit'] = $this->Model_common->databysql("SELECT `invest`.memberid,`invest`.amount , `member`.username FROM `invest` JOIN `member` ON `member`.id=`invest`.memberid ORDER BY invest.id DESC LIMIT 5");
			$data['lasthwithdraw'] = $this->Model_common->databysql("SELECT `withdraw`.memberid,`withdraw`.amount , `member`.username FROM `withdraw` JOIN `member` ON `member`.id=`withdraw`.memberid ORDER BY withdraw.id DESC LIMIT 5");
			
			$data['package'] = $this->Model_common->databysql("SELECT `package`.* FROM `package`");
			$data['content'] = $this->load->view("home/homepage_view", $data, true);
			$this->load->view("home/main_view", $data);
		}
		
	}
	
	
	
	public function signup()
	{
		if($this->input->post()){
			$username = $this->input->post("username");
			$email = $this->input->post("email");
			$fullname = $this->input->post("fullname");
			$password = $this->input->post("password");
			$referralid = ($this->uri->segment(3))?$this->uri->segment(3):0;
			$ip = $this->input->ip_address();

			$checkemail = $this->Model_common->countrows("SELECT `email` FROM `member` 
														  WHERE `email`='$email'");
														  
			$checkusername = $this->Model_common->countrows("SELECT `username` FROM `member` 
														  WHERE `username`='$username'");											  

			$referralid= $this->input->cookie('affiliate');
			
			if($referralid==null || $referralid=="" ){
				$referralid =1;
			}

			if($checkemail == false && $checkusername == false ){  // email validation 
					$data = array(
								'username'=>$username,
								'fullname'=>$fullname,
								'email'=>$email,
								'password'=>$password,
								'referid'=>$referralid,
								'sq'=>$this->input->post("sq"),
								'sa'=>$this->input->post("sa"),
								'btcid'=>$this->input->post("btcid"),
								'pmid'=>$this->input->post("pmid"),
								'isblock'=>0,
								'ip'=>$ip,
								'updatetime'=>time(),
								'flag'=>1,
							);
				
				$action = $this->Model_home->signup($data);	
				
				if($action){
					$this->session->set_flashdata('msg','<div class="alert alert-success alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<p><i class="icon fa fa-check"></i> Signup Successfully. </p>
													  </div>');

					$sessiondata = array(
							'id' => $action,
							'email' => $email,
							'fullname' => $fullname,
							'referid' => $referralid,
							'flag' => 1,
							'login' => true
						);	

						$this->session->set_userdata($sessiondata);	
						$url = base_url()."account";
						
						//welcome message
						//$this->load->library('email');
						//$this->email->set_mailtype("html");
						//$this->email->from('support@dfdf.us', "Earn Line");
						//$this->email->to($email);


						//$this->email->subject("Congralutaion !!  Signup Successfully ");
						//$message = "Dear Member <br/> Thanks for your Signup";
						//$this->email->message($message);

						//$this->email->send();
						
						
				    	redirect($url, 'refresh');		
					} //end of action if
			
										  
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-warning alert-dismissible">
														<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
														<p><i class="icon fa fa-times"></i> Email or Username Already Exist !!!</p>
													  </div>');
				redirect("welcome/signup");
			}// end of email validation 
			
			
		}else{
			$data['title'] = "Signup Page";
		
			$referralid = $this->input->cookie('affiliate');
			if($referralid){
				$data['referredby'] =  $this->Model_common->databysql("SELECT `username` FROM `member` WHERE `id`='$referralid'");
			}
			
			if($referralid==null || $referralid=="" ){
				$referralid =1;
			}
			
			$data['content'] = $this->load->view("home/signup_view", $data, true);
			$this->load->view("home/main_view", $data);
		}	
		
		
	}


	
	
	
	public function login(){
		if($this->input->post()){
			$this->Model_login->validate();
			if($this->session->userdata('login')==true){
				$url = base_url()."account";
		    	redirect($url, 'refresh');
			}else{
				$this->session->set_flashdata('msg','<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Wrong Username or Password
              </div>');
			  	redirect('welcome/login');
			}
		}else{
			$data['title'] = "Login Page";
			$data['content'] = $this->load->view("home/login_view", $data, true);
			$this->load->view("home/main_view", $data);
		}

	}
	
	

	public function about(){
		$data['title'] = "About Page";
		$data['content'] = $this->load->view("home/about_view", $data, true);
		$this->load->view("home/main_view", $data);
	}
	
	
	public function terms(){
		$data['title'] = "About Page";
		$data['content'] = $this->load->view("home/terms_view", $data, true);
		$this->load->view("home/main_view", $data);
	}

	public function faq(){
		$data['title'] = "Freequently Ask Question";
		$data['content'] = $this->load->view("home/faqs_view", $data, true);
		$this->load->view("home/main_view", $data);
	}


	public function support(){
		$data['title'] = "Freequently Ask Question";
		$data['content'] = $this->load->view("home/support_view", $data, true);
		$this->load->view("home/main_view", $data);
	}
	


	
}
