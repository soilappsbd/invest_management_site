<br/>
<div class="row">
	<div class="col-md-12">




<form method="post">
<input type="hidden" name="a" value="withdraw">
<input type="hidden" name="action" value="preview">
<input type="hidden" name="say" value="">



<table cellspacing="0" cellpadding="2" border="0" class="tab">
<tbody><tr>
 <td>Account Balance:</td>
 <td>$<b><?php echo number_format($totalactivebalance,2); ?></b></td>
</tr>
<!--
<tr>
 <td>Pending Withdrawals: </td>
 <td><?php echo number_format($totalwithdraw,2); ?><b></b></td>
</tr>
-->
</tbody></table>
<?php ;?>
<table cellspacing="0" cellpadding="2" border="0" class="tab">
	<tbody>
		<tr>
			 <th>Processing</th>
			 <th>Available</th>
			 <!--<th>Pending</th>-->
			 <th>Account</th>
		</tr>
		
		<tr>
			<td><img src="<?php echo base_url(); ?>assetshome/images/18.gif" width="44" height="17" align="absmiddle"> PerfectMoney</td>
			<td><b style="color:green">$<?php echo number_format(($profitinfopm+$referralcomissionpm[0]->totalcomissionpm) - $withdrawpm,2); ?></b></td>
			<!--<td><b style="color:red">$0.00</b></td>-->
			<td><?php $pmid = $commondata['memberinfo'][0]->pmid; if($pmid!=null){ echo $pmid;}else{ echo '<a href="'. base_url() .'account/settings">Not Set</a>';}?></td>
		</tr>


		<tr>
			<td><img src="<?php echo base_url(); ?>assetshome/images/48.gif" width="44" height="17" align="absmiddle"> Bitcoin</td>
			<td><b style="color:green">$<?php echo number_format(($profitinfobtc + $referralcomissionbtc[0]->totalcomissionbtc)  - $withdrawbtc, 2); ?></b></td>
			<!--<td><b style="color:red">$0.00</b></td>-->
			<td><i><?php $btcid = $commondata['memberinfo'][0]->btcid; if($btcid!=null){ echo $btcid;}else{ echo '<a href="'. base_url() .'account/settings">Not Set</a>';}?></i></td>
		</tr>
	</tbody>
</table>
</form>


<br><br>


<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<?php if($totalactivebalance!=0){?>
	
		<form action="<?php echo base_url();?>account/withdraw" method="post">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="currentbalance" value="<?php echo $totalactivebalance;?>">
			<div class="from-group">
				<label> Payment Gateway </label>
				<select class="form-control" name="gateway"> 
					<option value="pm"> Perfectmoney </option>
					<option value="btc"> Bitcoin </option>
				</select>	
			</div>
<br/>
			<div class="from-group">
				<label> Withdrawal  Amount </label>
				<input type="text" name="amount" class="form-control">	
			</div>
			<br/>
			<div class="from-group">
				
				<input type="submit"  class="btn btn-primary pull-right">	
			</div>		
		</form>	
		<?php }else{?>
		You have no funds to withdraw.
		<?php }?>

	</div>
</div>


			
				


                                                              
<br><br>
<br>

	</div>
</div>