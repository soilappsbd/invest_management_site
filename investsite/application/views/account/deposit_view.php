<br/>
<div class="row">
	<div class="col-md-12">


		<br>
<?php //pd($list);?>

	<?php if($package){
			foreach($package as $p){
		?>  
		<form class="form" action="<?php echo base_url()?>account/deposit" method="POST">
		<input type="hidden" name="packagename" value="<?php echo $p->packagename; ?>">
		<input type="hidden" name="tagline" value="<?php echo $p->tagline; ?>">
		   <br>

		
		<div class="row">
			<div class="col-md-12">
				<table class="table table-responsive table-stripe table-bordered">
					<tbody>
					<tr class="plantrtitel">
					 <th colspan="3">
						<input type="radio" name="packageid" value="<?php echo $p->id; ?>"> 
					<!--	<input type=radio name=h_id value='7'  checked  > -->

						<b><?php echo $p->packagename; ?> : <?php echo $p->tagline; ?></b></th>
					</tr>
					<tr class="">
					 <td>Plan</td>
					 <td width="200">Spent Amount ($)</td>
					 <td width="100" nowrap=""><nobr>Hourly Profit (%)</nobr></td>
					</tr>
					<tr>
					 <td class="item"><?php echo $p->packagename; ?></td>
					 <td class="item" align="right">$<?php echo $p->mindeposit; ?>  - $<?php echo $p->maxdeposit; ?> </td>
					 <td class="item" align="right"><?php echo $p->profitpercentage ; ?></td>
					</tr>
					</tbody>
				</table>
			</div>			
		</div>			
		<?php 
			}
		}
		?>
		
		
	<table cellspacing="0" cellpadding="2" border="0" class="tab">
		<tbody>
			<tr>
				 <td>Account Balance PM</td>
				 <td>$<?php echo $balancepm;?></td>
			</tr>
			<tr>
				 <td>Account Balance BTC</td>
				 <td>$<?php echo $balancebtc;?></td>
			</tr>
			<tr>
				 <td>Amount to Spend</td>
				 <td><input type="number" name="investamount" class="form-control" required>	</td>
			</tr>
		</tbody>
	</table>
		
		
		
		<div class="row">
			<div class="form-group col-md-6 col-md-offset-3">
				<ul> 
				<?php if($balancepm){?>
					<li><input type="radio" name="payoption" class="form-radio" value="abpm"> 	 
						Spend funds from Account Balance PerfectMoney
					</li>
				<?php }?>
				<?php if($balancebtc){?>
					<li>
						<input type="radio" name="payoption" class="form-radio" value="abbtc"> 	 Spend funds Account Balance Bitcoin
					</li>
				<?php }?>		
					<li>
						<input type="radio" name="payoption" class="form-radio" value="pm"> 	 Spend funds from PerfectMoney	
					</li>
					
					<li>
						<input type="radio" name="payoption" class="form-radio" value="btc"> 	 Spend funds from Bitcoin
					</li>
				</ul>
							
							
						
							
			</div>	
		</div>	



		<div class="row">
			<div class="form-group col-md-12 text-center">
				<input type="submit" class="btn btn-primary" value="Deposit">
			</div>
		</div>	

		</form>



		                                                              
		<br><br>
		<br>
	</div>
</div>