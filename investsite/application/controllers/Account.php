<?php
date_default_timezone_set('Asia/Dhaka');
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_account");
		$this->load->model("Model_common");
		
		$this->check_isvalidated();
	}
	
// Common Data	
	public function commondata(){
		$memberid = $this->session->userdata("id");
		$data['memberinfo'] = $this->Model_common->databysql("SELECT * FROM `member` WHERE `id`='$memberid'");
		$data['activedeposit'] = $this->Model_account->activedeposit($memberid);
		$data['totaldeposit'] = $this->Model_account->totaldeposit($memberid);
		$data['totalactivebalance'] = $this->Model_account->totalactivebalance($memberid);
		$data['totalprofitbymemberid'] = $this->Model_account->totalprofitbymemberid($memberid);
		$data['totalwithdraw'] = $this->Model_account->totalwithdraw($memberid);
		$data['lastdeposit'] = $this->Model_account->lastdeposit($memberid);
		$data['lastwithdraw'] = $this->Model_account->lastwithdraw($memberid);
		$data['totalearning'] = $this->Model_account->totalearning($memberid);
		return $data;
	}
	
// Common Data	
	public function index()
	{
		$data['title'] = "Dashboard";
		$data['commondata'] = $this->commondata();
		$data['referralcomission']  = $this->Model_common->databysql("SELECT SUM(`referralcomission`.comission) as totalcomission 
																			  FROM `referralcomission`");
		$data['content'] = $this->load->view("account/dashboard_view", $data, true);
		$this->load->view("account/common/main_view", $data);
	}
	


// Deposti
	public function deposit()
	{
		$data['title'] = "MAKE A DEPOSIT";
		$data['id'] = $this->session->userdata("id");
		$memberid = $this->session->userdata("id");
		
		if($this->input->post()){
			//pd($this->input->post());
			
			$payoption = $this->input->post("payoption");
			$packageid = $this->input->post("packageid");
			$investamount = $this->input->post("investamount"); 
			
			if($payoption=="abpm"){
				echo  "invest from perfectmoney balance";
			}elseif($payoption=="abbtc"){
				echo  "invest from perfectmoney balance";
			}elseif($payoption=="pm"){
				echo "perfect";
			}elseif($payoption=="btc"){
			 	$link = base_url()."Coinbase/generateaddress";
				$var =  file_get_contents($link);
				
				$realmal = explode("\":\"",$var);
			
				$finaladdress =  explode("\",\"",$realmal[1]);
				
				$data['address'] = $finaladdress[0]; 
				
				// rate
				$rateurl =  base_url()."Coinbase/priceusd";
				$ratedata =  file_get_contents($rateurl);
				$ratearray = json_decode($ratedata);
				$rate = $ratearray->amount;
				
				$amounttopay =  $investamount / $rate ;
				$data['amounttopay'] = $amounttopay ;
				
				$this->Model_common->insertdata($tablename,$data);
			}else{
				echo "No Option Selected";
			}
					
			$data['packageid'] = $packageid ;
			$data['packagename'] = $this->input->post("packagename");
			$data['tagline'] = $this->input->post("tagline");
			$data['payoption'] = $payoption ;
			$data['investamount'] = $investamount;
			$data['commondata'] = $this->commondata();
			$data['content'] = $this->load->view("account/depositprocess_view", $data, true);
			$this->load->view("account/common/main_view", $data);

		}else{

			$data['commondata'] = $this->commondata();
			$data['package'] = $this->Model_common->databysql("SELECT * FROM `package`");
			$data['balancepm'] =  $this->Model_account->balancepm($data['id']);
			$data['balancebtc'] =  $this->Model_account->balancebtc($data['id']);
			$data['content'] = $this->load->view("account/deposit_view", $data, true);
			$this->load->view("account/common/main_view", $data);
		}
	}

	

	public function depositsuccess(){
		// Post method e validation dite hobe
			$memberid = $this->session->userdata("id");
			$amount =  $this->input->post("PAYMENT_AMOUNT");
			$data = array(
						'memberid'=>$memberid,
						'packageid'=>$this->input->post("planid"),  
						'amount'=>$amount, 
						'updatetime'=>time(),
						'paymentway'=>"pm",
						'flag'=>1 
						);

			$investid = $this->Model_common->insertdata("invest",$data);
			
			$upline = $this->Model_common->databysql("SELECT `referid` FROM `member` WHERE `id`='$memberid'");
			
			$uplinemember = $upline[0]->referid;
			
			$commisssion =  ($amount / 100) * 5;
			$commissiondata = array(
						'memberid'=>$uplinemember,
						'downline'=>$memberid,  
						'depositamoun'=>$amount, 
						'investid'=>$investid, 
						'comission'=>$commisssion, 
						'updatetime'=>time(),
						'flag'=>1 
						);
			
			$this->Model_common->insertdata("referralcomission",$commissiondata);
			
			$data['title'] = "Deposit Success";
			$data['commondata'] = $this->commondata();
			$data['content'] = $this->load->view("account/depositsuccess_view", $data, true);
			$this->load->view("account/common/main_view", $data);
	}
	
	
	
	public function depositfrompmbalancepm(){
		// Post method e validation dite hobe
			$memberid = $this->session->userdata("id");
			$amount =  $this->input->post("amount");
			$packageid =  $this->input->post("packageid");
			$data = array(
						'memberid'=>$memberid,
						'packageid'=>$packageid,  
						'amount'=>$amount, 
						'updatetime'=>time(),
						'paymentway'=>"pm_balance",
						'flag'=>1 
						);
			// PM balance check kore dekhe cut korte hobe
						
			$investid = $this->Model_common->insertdata("invest",$data);
			
			$upline = $this->Model_common->databysql("SELECT `referid` FROM `member` WHERE `id`='$memberid'");
			
			$uplinemember = $upline[0]->referid;
			
			$commisssion =  ($amount / 100) * 5;
			$commissiondata = array(
						'memberid'=>$uplinemember,
						'downline'=>$memberid,  
						'depositamoun'=>$amount, 
						'investid'=>$investid, 
						'comission'=>$commisssion, 
						'updatetime'=>time(),
						'flag'=>1 
						);
			
			$this->Model_common->insertdata("referralcomission",$commissiondata);
			
			$data['title'] = "Deposit Success";
			$data['commondata'] = $this->commondata();
			$data['content'] = $this->load->view("account/depositsuccess_view", $data, true);
			$this->load->view("account/common/main_view", $data);
	}



	public function depositfrompmbalancebtc(){
		// Post method e validation dite hobe
			$memberid = $this->session->userdata("id");
			$amount =  $this->input->post("amount");
			$packageid =  $this->input->post("packageid");
			$data = array(
						'memberid'=>$memberid,
						'packageid'=>$packageid,  
						'amount'=>$amount, 
						'updatetime'=>time(),
						'paymentway'=>"pm_balance",
						'flag'=>1 
						);
			// Bitcoin balance check kore dekhe cut korte hobe
						
			$investid = $this->Model_common->insertdata("invest",$data);
			
			$upline = $this->Model_common->databysql("SELECT `referid` FROM `member` WHERE `id`='$memberid'");
			
			$uplinemember = $upline[0]->referid;
			
			$commisssion =  ($amount / 100) * 5;
			$commissiondata = array(
						'memberid'=>$uplinemember,
						'downline'=>$memberid,  
						'depositamoun'=>$amount, 
						'investid'=>$investid, 
						'comission'=>$commisssion, 
						'updatetime'=>time(),
						'flag'=>1 
						);
			
			$this->Model_common->insertdata("referralcomission",$commissiondata);
			
			$data['title'] = "Deposit Success";
			$data['commondata'] = $this->commondata();
			$data['content'] = $this->load->view("account/depositsuccess_view", $data, true);
			$this->load->view("account/common/main_view", $data);
	}

// Widtdraw
	public function withdraw()
	{

		if($this->input->post()){
			$currentbalance = $this->input->post("currentbalance");
			$amount =  $this->input->post("amount");

			if($currentbalance >= $amount){
				$data = array(
							'memberid'=>$this->input->post("id"),
							'amount'=>$this->input->post("amount"),
							'gateway'=>$this->input->post("gateway"), 
							'updatetime'=>time(),
							'flag'=>1 
							);

				$action =$this->Model_common->insertdata("withdraw",$data);

				if($action){
					sfr("Withdraw Request Submitted  Successfully", "account/withdraw");
				}else{
					ufr("Information not set Correctly", "account/withdraw");
				}

				
			}else{
				ufr("Current Balance is Lower than request", "account/withdraw");
			}
			

		}else{
			$data['title'] = "Withdraw";
			$data['id'] = $this->session->userdata("id");
			$data['commondata'] = $this->commondata(); 
			$memberid = $this->session->userdata("id");
			$data['totalactivebalance'] =  $this->Model_account->totalactivebalance($data['id']);
	
			$data['profitinfopm'] = $this->Model_account->profitinfopm($data['id']);
			$data['withdrawpm'] = $this->Model_account->withdrawpm($data['id']);

			$data['profitinfobtc'] = $this->Model_account->profitinfobtc($data['id']);
			$data['withdrawbtc'] = $this->Model_account->withdrawbtc($data['id']);

			$data['totalwithdraw'] =  $this->Model_account->totalwithdraw($data['id']);
			$data['referralcomissionpm']  = $this->Model_common->databysql("SELECT SUM(`referralcomission`.comission) as totalcomissionpm 
																			  FROM `referralcomission` WHERE `investid` IN (SELECT `id` FROM `invest` WHERE `paymentway`='pm') AND `memberid`='$memberid'");
																			  
																			  
			$data['referralcomissionbtc']  = $this->Model_common->databysql("SELECT SUM(`referralcomission`.comission) as totalcomissionbtc 
																			  FROM `referralcomission` WHERE `investid` IN (SELECT `id` FROM `invest` WHERE `paymentway`='btc') AND `memberid`='$memberid'");
			$data['content'] = $this->load->view("account/withdraw_view", $data, true);
			$this->load->view("account/common/main_view", $data);
		}
	
	}


// deposit list
	public function deposit_list()
	{
		$data['title'] = "Your Deposits";
		$data['id'] = $this->session->userdata("id");
		$data['commondata'] = $this->commondata();
		$data['list'] =  $this->Model_account->deposit($data['id']);
		$data['content'] = $this->load->view("account/depositlist_view", $data, true);
		$this->load->view("account/common/main_view", $data);
	}



// earnings
	public function earnings()
	{
		$data['title'] = "Earning History";
		$data['commondata'] = $this->commondata();
		$data['id'] = $this->session->userdata("id");
		$data['list'] =  $this->Model_account->earning($data['id']);
		$data['content'] = $this->load->view("account/earning_view", $data, true);
		$this->load->view("account/common/main_view", $data);
	}


// withdraw history
	public function withdraw_history()
	{
		$data['title'] = "Withdraw History";
		$data['commondata'] = $this->commondata();
		$data['id'] = $this->session->userdata("id");
		$memberid = $this->session->userdata("id");
		$data['list'] =  $this->Model_common->databysql("SELECT `withdraw`.* FROM `withdraw` WHERE `memberid`='$memberid' ORDER BY id DESC");
		$data['content'] = $this->load->view("account/withdrawhistory_view", $data, true);
		$this->load->view("account/common/main_view", $data);
	}




// Your referals 
	public function referals()
	{
		$data['title'] = "Your Referrals";
		$data['commondata'] = $this->commondata();
		$memberid = $this->session->userdata("id");
		$data['list'] =  $this->Model_common->databysql("SELECT `member`.username,`member`.id as memberid  FROM `member` 
														 WHERE `member`.referid='$memberid'");										

		$data['totalreferal'] =  $this->db->query("SELECT `member`.id  FROM `member` WHERE `member`.referid='$memberid'")->num_rows();					
		$data['totalcomission'] =  $this->Model_common->databysql("SELECT SUM(`referralcomission`.comission) as totalcomission FROM `referralcomission`
																WHERE `referralcomission`.memberid='$memberid'");
																
		$data['activereferal'] = $this->Model_common->countrows("SELECT `member`.id FROM  `member` WHERE id IN (SELECT `memberid` FROM `invest`) AND `member`.referid='$memberid'");
		$data['content'] = $this->load->view("account/referals_view", $data, true);
		$this->load->view("account/common/main_view", $data);
	}

// referallinks
	public function referallinks()
	{
		$data['title'] = "Promotional Links";
		$data['commondata'] = $this->commondata();
		$data['content'] = $this->load->view("account/referallinks_view", $data, true);
		$this->load->view("account/common/main_view", $data);
	}


// Settings
	public function settings()
	{
		if($this->input->post()){
			$id = $this->input->post("id");

			$data = array(
						'fullname'=>$this->input->post("fullname"),
						'password'=>$this->input->post("password"),  
						'sq'=>$this->input->post("sq"),
						'sa'=>$this->input->post("sa"),
						'pmid'=>$this->input->post("pmid"),
						'btcid'=>$this->input->post("btcid"),
						'updatetime'=>time()
						);

			$action = $this->Model_common->updatedata('member',$data, "id", $id);
			if($action){
				sfr("Profile Updated Successfully", "account/settings");
			}else{
				ufr("Information not set Correctly", "account/settings");
			}

		}else{
			$data['title'] = "Settings";
			$data['commondata'] = $this->commondata();
			$data['content'] = $this->load->view("account/settings_view", $data, true);
			$this->load->view("account/common/main_view", $data);
		}

		
	}

// Default
// validation check 	
	private function check_isvalidated(){
		if($this->session->userdata('login')!=true){
			$url = base_url()."welcome";
			redirect($url);
		}elseif($this->session->userdata('flag')==0){
			$url = base_url()."block";
			redirect($url);
		}else{
			if($this->session->userdata('login')!=true){
				$this->session->set_flashdata('msg','<div class="alert alert-warning" role="alert">
													<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
													<strong>Thanks !</strong> You are Logged Out 
													</div>');
				$url = base_url();
				redirect($url);
			}
			
		}	
		
		
	}

	
	
	
}
