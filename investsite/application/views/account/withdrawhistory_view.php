<br/>
<div class="row">
	<div class="col-md-12">

    <table class="table table-responsive table-stripe table-bordered">
        <tr>
            <th> Type </th> <th> Amount </th>  <th> Time </th> 
        </tr>
        <?php 
		//pd($list);
		
		if($list){
			
			?>
        <?php   foreach($list as $data){?>
        <tr>
            <td><span style="font-weight: bold; "> Withdrawal</span>	<br/>
				<span style="font-size:11px; "> Withdraw to account  <?php echo $data->accountid; ?>. Batch is  <?php echo $data->batchid; ?><span></td> 
			<td> $ <?php echo number_format($data->amount,2); echo " "; if($data->gateway=="pm"){?> <img src="<?php echo base_url(); ?>assetshome/images/18.gif" width="44" height="17" align="absmiddle"> <?php }else{?> <img src="<?php echo base_url(); ?>assetshome/images/48.gif" width="44" height="17" align="absmiddle">  <?php }?>  </td>   
			<td> <?php echo date("Y-M-d H:i a",$data->updatetime); ?>  </td>
        </tr>
        <?php }

        }?>
    </table>
    
				

                                                              
<br><br>
<br>

	</div>
</div>