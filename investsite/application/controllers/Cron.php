<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model("Model_common");
		//$this->check_isvalidated();
	}
	
	// Percentage Calculator
	 public function percent($percamount, $totalvalue) {
		 $count1 = $percamount * $totalvalue;
		 return $amount = $count1 / 100; 
     }	
	
	
	public function updateprofithourly(){
		// ALl Active Investment query
		$invest = $this->Model_common->databysql("SELECT invest.*, package.profitpercentage,package.profitpercentage,package.expiry, package.periodoption  FROM invest 
										LEFT JOIN package ON package.id=packageid
										WHERE `invest`.flag=1
										");
		$time = time();
		pd($invest);
	 if($invest){	
		foreach($invest as $row){
			$id 		= $row->id ;
			$memberid 	= $row->memberid ;
			$amount		= $row->amount ;
			$profitpercentage = $row->profitpercentage ;
			$packagtype = $row->periodoption ;
			$expiry = $row->expiry ;
			
	
			
			$profit = $this->percent($profitpercentage, $amount) ;

			if($packagtype == 1){
				$makehour = 3600;
			}elseif($packagtype == 2){
				$makehour = 86400;
			}
			
			
			
			//check last update 
			$profitlastupdatequery = $this->db->query("SELECT `updatetime` FROM `profit` WHERE `investid`='$id' ORDER BY `id` DESC LIMIT 1");
			
			$profitcount = $this->db->query("SELECT `id` FROM `profit` WHERE  `investid`='$id'")->num_rows();
			
				$investlastupdatequery = $this->db->query("SELECT `updatetime` FROM `invest` WHERE `id`='$id' ORDER BY `id` DESC LIMIT 1")->result_array();
				// Investing time
				$investtime = $investlastupdatequery[0]['updatetime'];
			
			if($profitcount==0){
				
				$firstprofittime = $investtime  + $makehour;
				if($time  >=  $firstprofittime ){
					echo "Invester por First Profit";
					$this->db->query("INSERT INTO `profit` SET `memberid`='$memberid',`investid`='$id',`amount`='$profit',`updatetime`=$time,`flag`='1'");
				}else{
					echo "Invester por profit dear time hoy nai";
				}
				
				/////
			}elseif($profitcount >= 1){
				echo "First profit  dea hoise";
				$profittimedata = $profitlastupdatequery->result_array();
				$lastupdate = $profittimedata[0]['updatetime'];
				
				$nextupdate = $lastupdate  + $makehour;
			
			
				
				if( $time  >= $nextupdate ){
					$howmanyhoursgap = ($time - $investtime) / $makehour ;
					if($profitcount < $howmanyhoursgap){
						$this->db->query("INSERT INTO `profit` SET `memberid`='$memberid',`investid`='$id',`amount`='$profit',`updatetime`=$time,`flag`='1'");
					}else{
						echo "Profit Limit should not cross";
					}	
				}else{
					echo "Profit Already Given";
				}
			}else{
				
				echo "Nothing to say";
			}
			
			
			
			
			
			//check plan is expired
			if($profitcount >= $expiry){
				$this->db->query("UPDATE `invest` SET `flag`=0 WHERE `id`='$id'");
			}
			
			echo "<br>";
		}
	  }//if kisu ase	
	}
	
	





	
	
}
