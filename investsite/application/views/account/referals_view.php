<br/>
<div class="row">
	<div class="col-md-12">
	
	
    <table class="table table-responsive table-stripe table-bordered">
      <tbody>
        <tr>
          <td class="item">Referrals:</td>
          <td class="item"><?php echo $totalreferal;?></td>
        </tr><tr>
          <td class="item">Active referrals:</td>
          <td class="item"><?php echo $activereferal;?></td>
        </tr><tr>
          <td class="item">Total referral commission:</td>
          <td class="item">$<?php echo $totalcomission[0]->totalcomission;?></td>
        </tr>
    </tbody>
  </table>
  
  <?php //pd($list); ?>
  <table class="table table-responsive table-stripe table-bordered">
      <tbody>
        <tr>
          <th>Usename</th>
          <th>Deposit Amount</th>
          <th>Comission Amount</th>
          <th>Status</th>
        </tr>
		<?php if($list){
				foreach($list as $ref){
			?>
		<tr>
			<td><?php echo $ref->username;?></td>
			<td>$<?php echo $invested = $this->Model_account->despositamount($ref->memberid);?></td>
			<td>$<?php echo ($invested / 100) * 5;?></td>
			<td><?php if($invested==0){ echo "No Deposit";}else{ echo "Deposited";}?></td>
		</tr>
		<?php }
		}
		?>
        
    </tbody>
  </table>
<br>

				
				
				
				
				
				
				
				
	
				
				
				


                            		
				
				
				

                                                              
<br><br>
<br>

	</div>
</div>