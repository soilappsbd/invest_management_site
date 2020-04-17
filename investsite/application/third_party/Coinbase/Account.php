<?php
	include('CoinbaseRequest.php');

	class Account { 

		public function GetAccountBalanceById ($accountId){
			if($accountId){
				$coinbase = new coinBaseRequest();
				$result = $coinbase->MakeRequest("accounts/".$accountId."/balance", "get", false);
			}
			else{
				$result = "{error : 'You must provide an account id...'}";
			}
			return $result;
		}

		public function GetBalance (){
			$coinbase = new coinBaseRequest();
			$results = $coinbase->MakeRequest("account/balance", "get", false);
		}

	}
?>