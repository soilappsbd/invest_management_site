<html>

	<script id="tinyhippos-injected">
		if (window.top.ripple) { 
			window.top.ripple("bootstrap").inject(window, document); }
	</script><head></head> <body onload="update_status_from_iframe()"> <script language="javascript">  function update_status_from_iframe() { window.parent.document.getElementById("placeforstatus").innerHTML = document.documentElement.innerHTML; }  </script>  <b>Order status:</b> Waiting for payment<br> <script language="javascript"> window.parent.document.getElementById("btc_form").style.display = ""; window.parent.document.getElementById("coin_payment_image").style.display = ""; </script>  <script language="javascript"> setTimeout("location.reload()", 30000); </script>  </body></html>