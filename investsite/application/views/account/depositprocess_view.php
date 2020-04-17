<br/>
<div class="row">
	<div class="col-md-12">
		<table class="table table-responsive table-stripe table-bordered">
			<tbody>
			<tr>
			 <td>Plan:</td>
			 <td><?php echo $packagename;?></td>
			
			</tr>
			<tr>
			 <td>Profit:</td>
			 <td><?php echo $tagline;?> </td>
			</tr>
			
			 

			<tr>
			 <td>Credit Amount:</td>
			 <td>$<?php echo $investamount;?></td>
			</tr>
	
			<tr>
			 <td>Debit Amount:</td>
			 <td>$<?php echo $investamount;?></td>
			</tr>
			</tbody>
		</table>
	</div>	
</div>	
	<?php 
		if($payoption=="pm"){
	?>
		<form action="https://perfectmoney.is/api/step1.asp" method="POST">
			<input type="hidden" name="PAYEE_ACCOUNT" value="U4421212">
			<input type="hidden" name="PAYEE_NAME" value="Investment-Lover">
			<input type="hidden" name="PAYMENT_ID" value="<?php echo time();?>">
			<input type="hidden" name="PAYMENT_AMOUNT" value="<?php echo $investamount;?>">
			<input type="hidden" name="PAYMENT_UNITS" value="USD">
			<input type="hidden" name="STATUS_URL" value="mailto:softgeekzteam@gmail.com">
			<input type="hidden" name="PAYMENT_URL" value="http://investment-lover.com/account/depositsuccess">
			<input type="hidden" name="PAYMENT_URL_METHOD" value="POST">
			<input type="hidden" name="NOPAYMENT_URL" value="http://investment-lover.com/deposit/unsuccess">
			<input type="hidden" name="NOPAYMENT_URL_METHOD" value="POST">
			<input type="hidden" name="SUGGESTED_MEMO" value="">
			<input type="hidden" name="planid" value="2">
			<input type="hidden" name="BAGGAGE_FIELDS" value="planid">
			

			<div class="row">
				<div class="form-group col-md-6 text-center">
					<input type="submit" name="PAYMENT_METHOD" value="Pay Now!">
				</div>
				<div class="form-group col-md-6 text-center">
					<a href="<?php echo base_url(); ?>account/deposit" class="btn btn-warning"> Cancel</a>
				</div>
			</div>

			</form>
	<?php }elseif($payoption=="abpm"){ ?>
			<form action="<?php echo base_url();?>/account/depositfrompmbalancepm" method="POST">
				<input type="hidden" name="amount" value="<?php echo $investamount;?>">
				<input type="hidden" name="packageid" value="<?php ?>">
				<div class="row">
					<div class="form-group col-md-12 text-center">
						<h2> Deposit from Your PerfectMoney Account Balance </h2>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-612text-center">
						<input type="submit" name="submit" value="Desposit Now!">
					</div>
				</div>
			</form>
				
	<?php }elseif($payoption=="abbtc"){ ?>
			<form action="<?php echo base_url();?>/account/depositfrompmbalancebtc" method="POST">
				<input type="hidden" name="amount" value="<?php echo $investamount;?>">
				<input type="hidden" name="packageid" value="<?php ?>">
				<div class="row">
					<div class="form-group col-md-12 text-center">
						<h2> Deposit from Your Bitcoin Account Balance </h2>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-12 text-center">
						<input type="submit" name="submit" value="Desposit Now!">
					</div>
				</div>
			</form>
	<?php	  }elseif($payoption=="btc"){
	?>		  
				<input type="hidden" id="btcid" value="">
				Please send <strong><?php echo $amounttopay;?></strong> BTC  : <div id="receivebtc" style="font-weight: bold; color: green"><?php echo $address;?></div>
				
				<strong>Order status:</strong> Waiting for payment 
		<?php  }
		?>	
<!-- https://blockchain.info/address/1JuQRq7BHiyHv18cgLYJPVe3MB4bkQbLa6?format=json -->		
		
<!--<script language="javascript"> setTimeout("location.reload()", 30000); </script>-->
<?php if($payoption=="btc"){ ?>
<script>
/* function executeQuery() {
  $.ajax({
    url: 'url/path/here',
    success: function(data) {
      // do something with the return value here if you like
    }
  });
  setTimeout(executeQuery, 5000); // you could choose not to continue on failure...
} */

$(document).ready(function() {

 // setTimeout(executeQuery, 5000);
});
</script>

<?php }?>