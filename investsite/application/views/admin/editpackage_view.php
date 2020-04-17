      <div class="panel">
        <div class="panel-heading">
          <h4 class="panel-title"> <?php echo $title;?> </h4>
        </div>
        <div class="panel-body">
          
         <?php if($list){
             // pd($list);
          ?>

         <?php    foreach($list as $row){?>
    
        <form class="" role="form" action="<?php echo base_url();?>admin/editpackage" method="POST">
          <input type="hidden" value="<?php echo $row->id;?>" name="id">
           <div class="panel-body">
              <div class="form-group">
                <label><storng> Package Name</storng></label>
                <input name="packagename" type="text" value="<?php echo $row->packagename;?>" class="form-control" required/>
              </div>

               <div class="form-group">
                <label><storng> Tagline</storng></label>
                <input name="tagline" type="text" value="<?php echo $row->tagline;?>" class="form-control" required/>
              </div>

              <div class="form-group">
                <label><storng> Minimum  Deposit</storng></label>
                <input name="mindeposit" type="text" value="<?php echo $row->mindeposit;?>" class="form-control" required/>
              </div>


              <div class="form-group">
                <label><storng> Maximum Deposit</storng></label>
                <input name="maxdeposit" type="text" value="<?php echo $row->maxdeposit;?>" class="form-control" required/>
              </div>

              <div class="form-group">
                <label><storng> Profit Percentage</storng></label>
                <input name="profitpercentage" type="text" value="<?php echo $row->profitpercentage;?>" class="form-control" required/>
              </div>


               <div class="form-group">
                <label><storng> Period Option</storng></label>
                <select class="form-control" name="periodoption">
                  <option value="<?php echo $row->periodoption; ?>" selected> 
                    <?php $option =  $row->periodoption; if($option==1){ echo "Hourly";}else{echo "Daily";}?>
                    
                  </option>
				   <?php $option =  $row->periodoption; if($option==1){?>
				    <option value="2"> Daily </option>
				   <?php }else{?>
                   <option value="1"> Hourly </option>
				   <?php }?>
                </select>
             
              </div>

              <div class="form-group">
                <label><storng> Expiry</storng></label>
                <input name="expiry" type="text" value="<?php echo $row->expiry;?>" class="form-control" required/>
              </div>
             
              <input type="submit" class="btn btn-primary pull-right">
           </div>  

       </form>
        <?php }
      }?>



        </div>
      </div><!-- panel -->





