<?php if( !defined('BASEPATH') ) exit( 'No direct script access allowed' );
// application/libraries/Coinbase_api.php

class Coinbase_api
{
	public function __construct()
	{
		require_once(dirname(__FILE__) . '/Coinbase/Exception.php');
		require_once(dirname(__FILE__) . '/Coinbase/ApiException.php');
		require_once(dirname(__FILE__) . '/Coinbase/ConnectionException.php');
		require_once(dirname(__FILE__) . '/Coinbase/Coinbase.php');
		require_once(dirname(__FILE__) . '/Coinbase/Requestor.php');
		require_once(dirname(__FILE__) . '/Coinbase/Rpc.php');
		require_once(dirname(__FILE__) . '/Coinbase/OAuth.php');
		require_once(dirname(__FILE__) . '/Coinbase/TokensExpiredException.php');
	}

	// pass method call through if the method exists
	public function __call($method, $arguments)
	{
		if( !method_exists('Coinbase', $method) )
			throw new Exception('Undefined method Coinbase::' . $method . '() called');

		$obj = new Coinbase('0N3ja7ur2OkggTG2');
		return call_user_func_array(array($obj, $method), $arguments);
	}
}