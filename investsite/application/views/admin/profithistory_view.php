      <div class="panel">
        <div class="panel-heading">
          <h4 class="panel-title"> <?php echo $title;?> </h4>
        </div>
        <div class="panel-body">
          

          
<?php // pd($list)?>

          <div class="table-responsive">      
            <table id="" class="table table-bordered table-striped-col">
              <thead>
                <tr>
                  <th>Member </th>
                  <th>Package </th>
                  <th>Deposit </th>
                  <th>Amount </th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
        <?php if($list){?>
          	<?php foreach($list as $col){ ?>
                <tr>
                  <td><?php  echo $col->fullname. " (".$col->username .")";?></td>
				  <td><?php  echo $col->packagename;?></td>
				  <td><?php  echo $col->depositamount . " (". $col->profitpercentage  ." %)";?></td>
                  <td><?php  echo $col->amount;?></td>
                  <td><?php echo date("d-M-Y H:s a",$col->updatetime);?></td>
                </tr>
        <?php }?>
          	<?php } ?>  
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- panel -->









<!-- Modal -->
<div id="addmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Package</h4>
      </div>
      <div class="modal-body">
        <form class="" role="form" action="<?php echo base_url();?>admin/package" method="POST" enctype="multipart/form-data">
           <div class="panel-body">

             <div class="form-group">
               <label for="packagename">Package Name</label>
              <input type="text" class="form-control" name="packagename"  id="" required>
            </div>

            <div class="form-group">
              <label for="tagline">Tagline</label>
              <input type="text" class="form-control" name="tagline"  id=""  required>
            </div>

              <div class="form-group">
              <label for="profitpercent">Profit (%)</label>
              <input type="text" class="form-control" name="profitpercent"  id=""  required>
            </div>

            <div class="form-group">
              <label for="mindeposit">Min Deposit</label>
              <input type="number" class="form-control" name="mindeposit"  id=""  required>
            </div>

             <div class="form-group">
              <label for="maxdeposit">Max Deposit</label>
              <input type="number" class="form-control" name="maxdeposit"  id=""  required>
            </div>

              <div class="form-group">
              <label for="maxdeposit">Expiry/Duration</label>
              <input type="number" class="form-control" name="expiry"  id=""  required>
            </div>

            <div class="form-group">
              <select class="form-control" name="periodoption" required>
                <option value=""> Select Period Type </option>
                <option value="1"> Hourly </option>
                <option value="2"> Daily </option>
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