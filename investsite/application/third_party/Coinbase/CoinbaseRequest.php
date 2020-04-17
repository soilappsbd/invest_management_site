<?php

	class CoinBaseRequest {

		public function MakeRequest($directory,$getOrPost,$parameters){

			$apikey = "Sm4ATlvgler7rtbe";
			$apisecret = "HmP3OwaVM7E7rkLYvYWjQcyqJSDeYROK";

			$nonce = file_get_contents("nonce.txt") + 1;
			file_put_contents("nonce.txt", $nonce, LOCK_EX);

			$url = "https://coinbase.com/api/v1/" . $directory . "?nonce=" . $nonce . "&";

			if($parameters != ""){
			    $parameters = http_build_query(json_decode($parameters), true);
			}

			$signature = hash_hmac("sha256", $nonce . $url . $parameters, $apisecret);

			$ch = curl_init();

			curl_setopt_array($ch, array(
			    CURLOPT_URL => $url,
			    CURLOPT_HTTPHEADER => array(
			    "ACCESS_KEY: " . $apikey,
			    "ACCESS_NONCE: " . $nonce,
			    "ACCESS_SIGNATURE: " . $signature
			    )));

			if($getOrPost == "post"){
			    curl_setopt_array($ch, array(
			    CURLOPT_POSTFIELDS => $parameters,
			    CURLOPT_POST => true,
			    ));
			}

			$results = curl_exec($ch);
			curl_close($ch);

			return $results;
		}
	}

//https://developers.coinbase.com/api/v1#send-money

?>
