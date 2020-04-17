<h1> Dashboard </h1>


<br/>
<div class="row">
	<div class="col-md-12">

		<table class="table table-responsive table-stripe table-bordered">
			<tr> 
				<th> Member</th> 
                <th> Stats</th> 
				<th> Deposit</th>
                <th> Stats</th>  
                <th> Withdraw</th> 
                <th> Stats</th> 
				<th> Referral</th> 
                <th> Stats</th> 
	
			</tr>
		
			<tr> 
				<td>Total Member</td> 
				<td> <?php echo $totalmember;  ?></td> 
				<td> Total Desposit</td> 
			    <td>$  <?php echo number_format($totaldeposit[0]->totaldeposit,0); ?></td> 
				<td> Total Withdraw</td> 
                <td>$  <?php echo number_format($totalwithdraw[0]->totalwithdraw,0); ?></td>
                <td> Referal Commission</td> 
                <td>$ <?php echo number_format($referralcomission[0]->referralcomission,0); ?></td>
			</tr>
            <tr> 
				<td>Active Member</td> 
				<td> <?php echo $activemember;  ?></td> 
				<td> Deposit PM</td> 
			    <td> $ <?php echo number_format($totaldepositpm[0]->totaldepositpm,0); ?></td> 
				<td> Withdraw PM</td> 
                <td> $ <?php echo number_format($totalwithdrawpm[0]->totalwithdrawpm,0); ?></td>
                <td> -</td> 
                <td> - </td>
			</tr>

            <tr> 
				<td>-</td> 
				<td> -</td> 
				<td> Deposit BTC</td> 
			    <td> $ <?php echo number_format($totaldepositbtc[0]->totaldepositbtc,0); ?></td> 
				<td> Withdraw BTC</td> 
                <td> $ <?php echo number_format($totalwithdrawbtc[0]->totalwithdrawbtc,0); ?></td>
                <td> -</td> 
                <td> - </td>
			</tr>
		
		</table>
                                                              


	</div>
</div>


<br><br>
<br>