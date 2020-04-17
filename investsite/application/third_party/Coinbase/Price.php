<?php
	include('CoinbaseRequest.php');

	class Price { 

		public function priceUsd (){
			$coinbase = new coinBaseRequest();
			$result = $coinbase->MakeRequest("prices/spot_rate?currency=USD", "get", false);
			return $result;
		}

		
	

	}
?>