<?php
	include('CoinbaseRequest.php');

	class Button { 

		public $name;
		public $subscription;
		public $price_string;
		public $price_currency_iso;
		public $callback_url;
		public $description;
		public $type;
		public $style;
		public $include_email;

		public function GenerateNewButton (){
			$button = new stdClass();
			$buttonObject = new stdClass();
			$buttonObject->name = $this->name;
		    $buttonObject->type = $this->type;		    
		    $buttonObject->subscription = $this->subscription;
		    $buttonObject->price_string = $this->price_string;
		    $buttonObject->price_currency_iso = $this->price_currency_iso;
		    $buttonObject->callback_url = $this->callback_url;
		    $buttonObject->description = $this->description;
		    $buttonObject->type = $this->type;
		    $buttonObject->style = $this->style;
		    $buttonObject->include_email = $this->include_email;
		    $button->button = $buttonObject;
		    $coinbase = new coinBaseRequest();
		    $results = $coinbase->MakeRequest("buttons", "post", json_encode($button));
		}

	}
?>