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

          
         <?php if($list){?>
         <?php    foreach($list as $row){?>
    
        <form class="" role="form" action="<?php echo base_url();?>admin/settings" method="POST">
          <input type="hidden" value="<?php echo $row->id;?>" name="id">
           <div class="panel-body">
              <div class="form-group">
                <label><storng> Is Referral Id Need for Signup (Yes yes Write 1)</storng></label>
                <input name="referralforsignup" type="text" value="<?php echo  $row->referralforsignup;?>" class="form-control" required/>
              </div>

              <div class="form-group">
                 <label><storng> How Much Referral Need for Withdraw </storng></label>
                <input name="referalforwithdraw" type="text" value="<?php echo $row->referalforwithdraw;?>" class="form-control" required />
              </div>

               <div class="form-group">
                 <label><storng> Contact Email </storng></label>
                <input name="email" type="text" value="<?php echo $row->email;?>" class="form-control" required />
              </div>

              <input type="submit" class="btn btn-primary pull-right">
           </div>  

       </form>
        <?php }
      }?>



        </div>
      </div><!-- panel -->





