<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_admin");
		$this->load->model("Model_common");
		$this->check_isvalidated();
	}
	
// HELPER FUNCTION LIST myfunction_helper	
	// sfr($action, $msg, $redirect) = set flashsata and redirect

//Dashboard	
	public function index()
	{
		$data['title'] = "Dashboard";
		$data['totalmember'] = $this->Model_common->countrows("SELECT `id` FROM `member`");
		$data['activemember'] = $this->Model_common->countrows("SELECT `id` FROM `member` WHERE `id` IN (SELECT `memberid` FROM `invest`)");
		$data['totaldeposit'] = $this->Model_common->databysql("SELECT SUM(amount) as totaldeposit FROM `invest`");
		$data['totaldepositpm'] = $this->Model_common->databysql("SELECT SUM(amount) as totaldepositpm FROM `invest` WHERE `paymentway`='pm'");
		$data['totaldepositbtc'] = $this->Model_common->databysql("SELECT SUM(amount) as totaldepositbtc FROM `invest` WHERE `paymentway`='btc'");
		$data['totalwithdraw'] = $this->Model_common->databysql("SELECT SUM(amount) as totalwithdraw FROM `withdraw`");
		$data['totalwithdrawpm'] = $this->Model_common->databysql("SELECT SUM(amount) as totalwithdrawpm FROM `withdraw` WHERE `gateway`='pm'");
		$data['totalwithdrawbtc'] = $this->Model_common->databysql("SELECT SUM(amount) as totalwithdrawbtc FROM `withdraw` WHERE `gateway`='btc'");
		$data['referralcomission'] = $this->Model_common->databysql("SELECT SUM(comission) as referralcomission FROM `referralcomission`");
		$data['content'] = $this->load->view("admin/dashboard_view", $data, true);
		$this->load->view("admin/common/main_view", $data);
	}
	
//Active Member	
	public function activemember()
	{
		$data['title'] = "Active Member";
		$data['list'] = $this->Model_common->databysql("SELECT `member`.* FROM `member` WHERE `member`.id IN(SELECT `memberid` FROM `invest`) AND `flag`='1'");

		$data['content'] = $this->load->view("admin/member_view", $data, true);
		$this->load->view("admin/common/main_view", $data);
	}

//In Active Member	
	public function inactivemember()
	{
		$data['title'] = "Inactive Member";
		$data['list'] = $this->Model_common->databysql("SELECT `member`.* FROM `member` WHERE `member`.id NOT IN(SELECT `memberid` FROM `invest`) AND `flag`='1'");

		$data['content'] = $this->load->view("admin/member_view", $data, true);
		$this->load->view("admin/common/main_view", $data);
	}			
	
//In Active Member	
	public function allmember()
	{
		$data['title'] = "All Member";
		$data['list'] = $this->Model_common->databysql("SELECT `member`.* FROM `member`");

		$data['content'] = $this->load->view("admin/member_view", $data, true);
		$this->load->view("admin/common/main_view", $data);
	}		

// Suspend member	
	public function suspend()
	{
		$id =  $this->uri->segment(3);

		$data = array(
			'flag'=>0
			);

		$action = $this->Model_common->updatedata('member', $data, 'id', $id);
		
			if($action){
					sfr("Member Susspended  Successfully", "admin/allmember");
			}else{
					ufr("Member Susspended Error", "admin/allmember");
			}


	}

	

	// Suspend member	
	public function activate()
	{
		$id =  $this->uri->segment(3);

		$data = array(
			'flag'=>1
			);

		$action = $this->Model_common->updatedata('member', $data, 'id', $id);
		
			if($action){
					sfr("Member Activated  Successfully", "admin/allmember");
			}else{
					ufr("Member Activation Error", "admin/allmember");
			}


	}
//Mange Package
	public function package()
	{
		if($this->input->post()){
				$data = array(
						'packagename'=>$this->input->post("packagename"),
						'tagline'=>$this->input->post("tagline"),  
						'mindeposit'=>$this->input->post("mindeposit"), 
						'maxdeposit'=>$this->input->post("maxdeposit"), 
						'profitpercentage'=>$this->input->post("profitpercent"), 
						'periodoption'=> $this->input->post("periodoption"), 
						'expiry'=> $this->input->post("expiry"),
						'updatetime'=>time(), 
						'flag'=>1 
						);
				$action = $this->Model_common->insertdata("package",$data);
			
				if($action){
						sfr("Gateway Added Successfully", "admin/package");
				}else{
						ufr("Gateway Added Successfully", "admin/package");
				}

		}else{
			$data['title'] = "Manage Package";
			$data['list'] = $this->Model_common->databysql("SELECT `package`.* FROM `package`");
			$data['content'] = $this->load->view("admin/managepackage_view", $data, true);
			$this->load->view("admin/common/main_view", $data);
		}
	}


	//	
	public function editpackage(){
		if($this->input->post()){

			$id = $this->input->post("id") ;

			$data = array(
					'packagename'=> $this->input->post("packagename"),
					'tagline'=>$this->input->post("tagline"),
					'mindeposit'=>$this->input->post("mindeposit"),
					'maxdeposit'=>$this->input->post("maxdeposit"),
					'profitpercentage'=>$this->input->post("profitpercentage"),
					'periodoption'=>$this->input->post("periodoption"),
					'expiry'=>$this->input->post("expiry"),
					'updatetime'=>time(),
					'flag'=>1,
			);

			$action = $this->Model_common->updatedata("package",$data, "id", $id);
				
				if($action){
					$msg = '<div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<strong>Well done!</strong>  <a href="" class="alert-link">Packag Edited Successfully</a></div>';
					
					$this->session->set_flashdata('msg',$msg);
					redirect("Admin/package");
				}else{
					ufr("Information not set Correctly", "Admin/package");
				}
		

		}else{
			$data['title'] = "Edit Notification";
			$id = $this->uri->segment(3);
			$data['list'] = $this->Model_common->databysql("SELECT `package`.* FROM `package` 
				                                            WHERE `id`='$id'");
			$data['content'] = $this->load->view("admin/editpackage_view", $data, true);
			$this->load->view("admin/common/main_view", $data);
		}
	}


//Mange Withdrawal
	public function withdrawal()
	{
		if($this->input->post()){
		

		}else{
			$data['title'] = "Withdrawal Management";
			
			$data['list'] = $this->Model_common->databysql("SELECT `withdraw`.*,
															`member`.fullname,`member`.username FROM `withdraw` JOIN `member` ON `member`.id=`withdraw`.memberid");
			$data['content'] = $this->load->view("admin/managewithdrawal_view", $data, true);
			$this->load->view("admin/common/main_view", $data);
			
		}


	}



///Profit history	
public function profithistory()
	{
		if($this->input->post()){
		

		}else{
			$data['title'] = "Profit History";
			
			$sql = "SELECT `profit`.* ,`member`.fullname,`member`.username,
					`package`.packagename, `package`.profitpercentage,`package`.expiry ,
					`invest`.amount as depositamount
					FROM `profit` 
					JOIN `member` ON `member`.id=`profit`.memberid
					JOIN `invest` ON `invest`.id=`profit`.investid
					JOIN `package` ON `package`.id=`invest`.packageid
					ORDER BY `profit`.id DESC LIMIT 100
					";
			$data['list'] = $this->Model_common->databysql($sql);
	
			$data['content'] = $this->load->view("admin/profithistory_view", $data, true);
		
			$this->load->view("admin/common/main_view", $data);
			
		}


	}

// Deposit
public function deposit()
	{
		if($this->input->post()){
			$userid = $this->Model_admin->useridbyuname($this->input->post('username'));
			$package = $this->input->post('package');
			$amount = $this->input->post('amount');
			$payoption = $this->input->post('payoption');
			
			$data = array(
						'memberid'=>$userid,
						'packageid'=>$package,  
						'amount'=>$amount, 
						'paymentway'=>$payoption, 
						'depositby'=>'admin', 
						'updatetime'=>time(), 
						'flag'=>1 
						);
			$action = $this->Model_common->insertdata("invest",$data);
				
				
			$upline = $this->Model_common->databysql("SELECT `referid` FROM `member` WHERE `id`='$userid'");
			
			$uplinemember = $upline[0]->referid;
			
			$commisssion =  ($amount / 100) * 5;
			
			$commissiondata = array(
						'memberid'=>$uplinemember,
						'downline'=>$userid,  
						'depositamoun'=>$amount, 
						'investid'=>$action, 
						'comission'=>$commisssion, 
						'updatetime'=>time(),
						'flag'=>1 
						);
			
			$this->Model_common->insertdata("referralcomission",$commissiondata);	
				
			
				if($action){
						sfr("Desposit  Successfully", "admin/deposit");
				}else{
						ufr("Deposit not success", "admin/deposit");
				}
			
		}else{
			$data['title'] = "Deposit History";
			$sql = "SELECT `invest`.*,`member`.fullname, `member`.username, `package`.packagename 
					FROM `invest` 
					JOIN `member` ON `member`.id=`invest`.memberid
					JOIN `package` ON `package`.id=`invest`.packageid
					ORDER BY `invest`.id DESC";
			$data['list'] = $this->Model_common->databysql($sql);
			$data['package'] = $this->Model_common->databysql("SELECT `package`.* FROM `package`");
	
			$data['content'] = $this->load->view("admin/deposithistory_view", $data, true);
	
			$this->load->view("admin/common/main_view", $data);
			
		}
	}






// Default
	private function check_isvalidated(){
		if($this->session->userdata('admin_login')!=true){
			$this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">
												<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
												<strong>Thanks !</strong> You are Logged Out 
												</div>');
			$url = base_url()."admin_login";
		    redirect($url);
		}
	}

	
}
