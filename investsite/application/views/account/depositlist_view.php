<br/>
<div class="row">
	<div class="col-md-12">

		<table class="table table-responsive table-stripe table-bordered">
			<tr> 
				<th> Date</th> 
				<th> Plan</th> 
				<th> Amount</th> 
				<th> eCurrency</th> 
				<th> Expire in</th> 
			</tr>
			<?php if($list){?>
			<?php foreach($list as $arr){?>
			<tr> 
				<td><?php echo date("Y-M-d H:i a",$arr->updatetime) ;?></td> 
				<td> <?php echo $arr->packagename ;?></td> 
				<td> $<?php echo $arr->amount ;?></td> 
			    <td> <?php $ecurrency = $arr->paymentway; if($ecurrency=="pm"){?><img src="<?php echo base_url(); ?>assetshome/images/18.gif" width="44" height="17" align="absmiddle"> <?php }else{?> <img src="<?php echo base_url(); ?>assetshome/images/48.gif" width="44" height="17" align="absmiddle">  <?php }?> </td> 
				<td> <?php echo $arr->expiry ;?> <?php echo ($arr->periodoption==1)?" Hours":"Days" ; ?></td> 
			</tr>
			<?php }
				}
			?>
		</table>
                                                              


	</div>
</div>


<br><br>
<br>