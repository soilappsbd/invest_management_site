<br/>
<div class="row">
	<div class="col-md-12">

    <table class="table table-responsive table-stripe table-bordered">
        <tr>
            <th> Package </th> <th> Amount </th>  <th> Time </th> 
        </tr>
        <?php if($list){?>
        <?php   foreach($list as $data){?>
        <tr>
            <td> <?php echo $data->packagename; ?></td> <td> $ <?php echo $data->amount; ?> </td>   <td> <?php echo date("Y-M-d H:i a",$data->updatetime); ?> </td>
        </tr>
        <?php }

        }?>
    </table>
    
				

                                                              
<br><br>
<br>

	</div>
</div>