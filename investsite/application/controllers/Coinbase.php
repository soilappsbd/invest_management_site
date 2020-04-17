<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coinbase extends CI_Controller {

	public function index(){
		echo "Conbase tester";
	}
	
	
	public function generateaddress(){
		$coinapi = ""; 
		require_once APPPATH.'third_party/Coinbase/Address.php';
		$this->coinapi = new Address();

		echo $v =  $this->coinapi->GenerateNewAddress();
		
	}
	
	
	public function priceusd(){
		echo file_get_contents("https://api.coinbase.com/v1/prices/spot_rate?currency=USD");
	}
	
	
	

	public function getbalancebyid(){
		$accountId = $this->uri->segment(3);
		$coinapi = ""; 
		require_once APPPATH.'third_party/Coinbase/Account.php';
		$this->coinapi = new Account();

		echo $v =  $this->coinapi->GetAccountBalanceById($accountId);
		
	}
	
	
	
	public function getreceivedata(){
		$data = $_POST;
		
		$this->load->library('email');

		$this->email->from('inf@investment-lover.com', 'Invest lover');
		$this->email->to('softgeekzteam@gmail.com');


		$this->email->subject('Coinbase Receive test');
		$this->email->message($data);

		$this->email->send();
		
	}
	
	
	
}
