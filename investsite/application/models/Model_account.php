<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_account extends CI_Model {

	
// Total Profit // withdraw no matter
	public function totalprofitbymemberid($id){
		$query = $this->db->query("SELECT SUM(`profit`.amount) as totalprofit FROM `profit` 
									WHERE `profit`.memberid='$id'")->result();
		if($query){
			foreach($query as $row){
				return $row->totalprofit;
			}

		}else{
			return 0;
		}

	}

// Active Deposit // still profit generating	
	public function activedeposit($id){
		$query = $this->db->query("SELECT SUM(amount) as activedeposit FROM `invest` 
									WHERE `memberid`='$id' AND `flag`=1")->result();
		if($query){
			foreach($query as $row){
				return $row->activedeposit;
			}

		}else{
			return 0;
		}

	}

// Total Desposit // ctive and non active	
	public function totaldeposit($id){
		$query = $this->db->query("SELECT SUM(amount) as totaldeposit FROM `invest` 
									WHERE `memberid`='$id'")->result();
		if($query){
			foreach($query as $row){
				return $row->totaldeposit;
			}

		}else{
			return 0;
		}

	}

// total withdraw pm  and btc
	public function totalwithdraw($id){
		$query = $this->db->query("SELECT SUM(amount) as totalwithdraw FROM `withdraw` 
									WHERE `memberid`='$id'")->result();
		if($query){
			foreach($query as $row){
				return $row->totalwithdraw;
			}

		}else{
			return 0;
		}

	}

//comission by pm  
	public function totalcomissionpm($id){
		$query = $this->db->query("SELECT SUM(`referralcomission`.comission) as totalcomissionpm 
									FROM `referralcomission` 
									WHERE `investid` IN (SELECT `id` FROM `invest` WHERE `paymentway`='pm')
									AND `referralcomission`.memberid='$id'
									")->result();
		if($query){
			foreach($query as $row){
				return $row->totalcomissionpm;
			}

		}else{
			return 0;
		}

	}
	
//comission by btc 
	public function totalcomissionbtc($id){
		$query = $this->db->query("SELECT SUM(`referralcomission`.comission) as totalcomissionbtc
									FROM `referralcomission` 
									WHERE `investid` IN (SELECT `id` FROM `invest` WHERE `paymentway`='btc')
									AND `referralcomission`.memberid='$id'
									")->result();
		if($query){
			foreach($query as $row){
				return $row->totalcomissionbtc;
			}

		}else{
			return 0;
		}

	}	
// Total active balance	
	public function totalactivebalance($id){
		$totalcomission = $this->totalcomissionpm($id)+$this->totalcomissionbtc($id);
		$totalamoun = $this->totalprofitbymemberid($id);	
		return $activebalance = ($totalamoun+$totalcomission) -  $this->totalwithdraw($id);	

	}
	
	
// total active balance end
// Total Earning
	public function totalearning($id){
		$totalcomission = $this->totalcomissionpm($id)+$this->totalcomissionbtc($id);
		$totalamoun = $this->totalprofitbymemberid($id);	
		return $totalearning = ($totalamoun+$totalcomission);	

	}

// total earning end	
	
	public function profitinfopm($id){
		$query = $this->db->query("SELECT SUM(`profit`.amount) as totalprofit , `invest`.paymentway FROM `profit` 
									JOIN `invest` ON `invest`.id=`profit`.investid 
									WHERE `profit`.memberid='$id' AND `invest`.paymentway='pm'")->result();
		if($query){
		foreach($query as $row){
			return $row->totalprofit;
		}

		}else{
			return 0;
		}
	}


	public function withdrawpm($id){
		$query = $this->db->query("SELECT SUM(`withdraw`.amount) as totalwithdraw  FROM `withdraw` 
									WHERE `withdraw`.memberid='$id' AND `withdraw`.gateway='pm'")->result();
		if($query){
		foreach($query as $row){
			return $row->totalwithdraw;
		}

		}else{
			return 0;
		}
	}


	public function profitinfobtc($id){
		$query = $this->db->query("SELECT SUM(`profit`.amount) as totalprofit , `invest`.paymentway FROM `profit` 
									JOIN `invest` ON `invest`.id=`profit`.investid 
									WHERE `profit`.memberid='$id' AND `invest`.paymentway='btc'")->result();
		if($query){
		foreach($query as $row){
			return $row->totalprofit;
		}

		}else{
			return 0;
		}
	}


	public function withdrawbtc($id){
		$query = $this->db->query("SELECT SUM(`withdraw`.amount) as totalwithdraw  FROM `withdraw` 
									WHERE `withdraw`.memberid='$id' AND `withdraw`.gateway='btc'")->result();
		if($query){
		foreach($query as $row){
			return $row->totalwithdraw;
		}

		}else{
			return 0;
		}
	}


	public function deposit($id){
	  return	$query = $this->db->query("SELECT `invest`.* , `package`.packagename , `package`.expiry , `package`.periodoption
									FROM `invest` 
									JOIN `package` ON `invest`.packageid=`package`.id WHERE `invest`.memberid='$id'")->result();
		
	}

	

	public function earning($id){
		return	$query = $this->db->query("SELECT `profit`.* , `package`.packagename , `package`.id , `invest`.packageid  FROM 	`profit`
										   JOIN   `invest` ON `invest`.id=`profit`.investid
										   JOIN `package` ON `invest`.packageid=`package`.id
										   WHERE `invest`.packageid=`package`.id
										   AND `profit`.memberid='$id'
										  ")->result();
		  
	  }
	  
	 public function despositamount($id){
		$query = $this->db->query("SELECT SUM(`invest`.amount) as totalinvest  FROM `invest` 
									WHERE `invest`.memberid='$id'")->result();
		if($query){
		foreach($query as $row){
			return $row->totalinvest;
		}

		}else{
			return 0;
		}
	 }
	 
	 
	 public function lastdeposit($id){
		$query = $this->db->query("SELECT `invest`.amount as lastdeposit FROM `invest` WHERE `invest`.memberid='$id' ORDER BY id DESC LIMIT 1")->result();
		
		if($query){
			foreach($query as $row){
				return $row->lastdeposit;
			}
		}else{
			return 0;
		}
		
	}
	
	
	 public function lastwithdraw($id){
		$query = $this->db->query("SELECT `withdraw`.amount as lastwithdraw FROM `withdraw` WHERE `withdraw`.memberid='$id' ORDER BY id DESC LIMIT 1")->result();
		
		if($query){
			foreach($query as $row){
				return $row->lastwithdraw;
			}
		}else{
			return 0;
		}
		
	}
	
	
	/// Balance Calculation
	
	public function balancepm($id){
		$profitpm = $this->profitinfopm($id);	
		$withdrawpm = $this->withdrawpm($id);
		return $balancepm = $profitpm -  $withdrawpm;
	}
	
	
	public function balancebtc($id){
		$profitinfobtc = $this->profitinfobtc($id);	
		$withdrawbtc = $this->withdrawbtc($id);
		return $balancebtc = $profitinfobtc -  $withdrawbtc;
	}
	
	 
		
}//end of class

