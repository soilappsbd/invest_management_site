      <div class="panel">
        <div class="panel-heading">
          <h4 class="panel-title"> <?php echo $title;?> </h4>
        </div>
        <div class="panel-body">
          
         <?php 
            if($this->session->flashdata("msg")){
                echo $this->session->flashdata("msg");
            }
          ?>
          
         <p> <a class="btn btn-info btn-lg" data-toggle="modal" data-target="#addgateway" > Add Gateway   </a>
         </p>
         


          <div class="table-responsive">
          	<?php //pd($list);?>
          
            <table id="dataTable1" class="table table-bordered table-striped-col">
              <thead>
                <tr>
                  <th>Logo </th>
                  <th>Gateway </th>
                  <th>User Id</th>
                  <th>Add Date</th>
                  
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
        <?php if($list){?>
          	<?php foreach($list as $col){ ?>
                <tr>
                  <td><img src="<?php echo base_url();?>currencylogo/<?php echo $col->logo;?>" width="40px;"></td>
                  <td><?php echo $col->gatewayname;?></td>
                  <td><?php echo $col->gatewayid;?></td>

                  <td><?php echo date("d-m-Y",$col->updatetime);?></td>
                  <td>
                    
                      
                         <a href="<?php echo base_url();?>admin/editgateway/<?php echo $col->id;?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>

                      
                    
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
<div id="addgateway" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Gateway</h4>
      </div>
      <div class="modal-body">
        <form class="" role="form" action="<?php echo base_url();?>admin/managegatway" method="POST" enctype="multipart/form-data">
           <div class="panel-body">

             <div class="form-group">
               <label for="gatewayname">Gateway Name</label>
              <input type="text" class="form-control" name="gatewayname"  id="gatewayname" required>
            </div>

            <div class="form-group">
              <label for="gatewayid">Account Id</label>
              <input type="accountid" class="form-control" name="gatewayid"  id="gatewayid"  required>
            </div>

            <div class="form-group">
              <select class="form-control" name="type" required>
                <option value=""> Select Currency Type </option>
                <option value="0"> International ($) </option>
                <option value="1"> Local (BDT) </option>
              </select>
            </div>

            <div class="form-group">
              <label for="Logo">Logo</label>
              <input type="file" class="form-control" name="userfile"  id="userfile"  required>
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