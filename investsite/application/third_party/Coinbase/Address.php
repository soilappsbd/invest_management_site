<?php
	include('CoinbaseRequest.php');

	class Address { 

		public function GenerateNewAddress (){
			$coinbase = new coinBaseRequest();
			
			$param = array(
						'address' => array('callback_url'=>'http://investment-lover.com/Coinbase/getreceivedata/',
										   'label' => 'Dalmation donations'
										  )
					
					 );
			
			$result = $coinbase->MakeRequest("account/generate_receive_address", "post", json_encode($param));
			return $result;
		}

		public function GetAccountAddresses (){
			$coinbase = new coinBaseRequest();
			$results = $coinbase->MakeRequest("addresses", "get", false);
			return $result;
		}

	}
?>