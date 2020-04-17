<?php if( !defined('BASEPATH') ) exit( 'No direct script access allowed' );
// application/controllers/test.php

class Calculator extends CI_Controller 
{
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_common");
	}
	
	//Calculator
	public function index(){
		if($this->input->post()){
			$packageid = $this->input->post('packageid');
			$depositamount = $this->input->post('depositamount');
			
			$packagedata = $this->Model_common->databysql("SELECT `package`.profitpercentage , `package`.expiry FROm `package` WHERE `id`='$packageid'");
			
			//pd($packagedata);
			 $percentage = $packagedata[0]->profitpercentage * $depositamount;
			 $totalprofit = ($packagedata[0]->profitpercentage * $packagedata[0]->expiry);

			echo $caldata =  json_encode(array('totalprofit'=>$percentage." $" , 'percentage'=>$totalprofit." %" ));	
			
		}else{
			echo "No Direct Access";
		}
	}
	
	
}