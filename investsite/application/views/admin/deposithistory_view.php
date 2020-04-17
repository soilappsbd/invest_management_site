      <div class="panel">
        <div class="panel-heading">
          <h4 class="panel-title"> <?php echo $title;?> </h4>
        </div>
        <div class="panel-body">
            <p> <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal" > Make Deposit   </a>
         </p>
<?php // pd($list)?>

          <div class="table-responsive">      
            <table id="dataTable1" class="table table-bordered table-striped-col">
              <thead>
                <tr>
                  <th>Member </th>
                  <th>Package </th>
                  <th>Amount </th>
                  <th>Gateway</th>
                  <th>Time</th>
      
                  <th>Remarks</th>
                </tr>
              </thead>
              <tbody>
        <?php if($list){?>
          	<?php foreach($list as $col){ ?>
                <tr>
       
                  <td><?php  echo $col->fullname. " (".$col->username .")";?></td>
                  <td><?php  echo $col->packagename;?></td>
                  <td>$ <?php  echo $col->amount;?></td>
                  <td style="text-transform: uppercase;"><?php  echo $col->paymentway;?></td>
                  <td><?php echo date("d-M-Y H:i a",$col->updatetime);?></td>
				  <td><?php  echo $col->depositby;?></td>
                  <td>
                    <!--
                         <a href="<?php echo base_url();?>admin/approved/<?php echo $col->id;?>" class="btn btn-xs btn-warning"><i class="fa fa-checked"></i></a>
                       -->
                  </td>
                </tr>
        <?php }?>
          	<?php } ?>  
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- panel -->









<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Desposit</h4>
      </div>
      <div class="modal-body">
        <form class="" role="form" action="<?php echo base_url();?>admin/deposit" method="POST" enctype="multipart/form-data">
           <div class="panel-body">
		   
		      <div class="form-group">
               <label for="username">Username</label>
              <input type="text" class="form-control" name="username"  id="" required>
            </div>

             <div class="form-group">
               <label for="packagename">Package Name</label>
				<select name="package" class="form-control">
					<?php if($package){?>
					<?php   foreach($package as $p){?>
					<option value="<?php echo $p->id;?>"><?php echo $p->packagename;?> </option>
					<?php 	}
						  }
						 ?>
				</select>
            </div>

            <div class="form-group">
              <label for="amount">Amount</label>
              <input type="text" class="form-control" name="amount"  id=""  required>
            </div>



            <div class="form-group">
              <select class="form-control" name="payoption" required>
                <option value=""> Select Gateway Type </option>
                <option value="pm"> PerfectMoney </option>
                <option value="btc"> BTC </option>
              </select>
            </div>

       

           </div>  
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> 
        <input type="submit" class="btn btn-primary pull-right">
      </div>
       </form>
    </div>

  </div>
</div>




