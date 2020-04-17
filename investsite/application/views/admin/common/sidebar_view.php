  <div class="leftpanel">
    <div class="leftpanelinner">

      <!-- ################## LEFT PANEL PROFILE ################## -->

      <div class="media leftpanel-profile">
        <div class="media-left">
          <a href="#">
            <img src="../images/photos/loggeduser.png" alt="" class="media-object img-circle">
          </a>
        </div>
        <div class="media-body">
          <h4 class="media-heading">Admin Panel </h4>
          <span>Adminsitrator</span>
        </div>
      </div><!-- leftpanel-profile -->




        <!-- ################# MAIN MENU ################### -->

        <div class="tab-pane active" id="mainmenu">
          <ul class="nav nav-pills nav-stacked nav-quirk">
             <li class="active"><a href="<?php echo base_url();?>admin/"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
            <li class="nav-parent">
              <a href=""><i class="fa fa-users"></i> <span>Member</span></a>
              <ul class="children">
                <li><a href="<?php echo base_url();?>admin/activemember">Active Member</a></li>
                <li><a href="<?php echo base_url();?>admin/inactivemember">Inactve Member</a></li>
                <li><a href="<?php echo base_url();?>admin/allmember">All Member</a></li>
           
              </ul>
            </li>
            <li class=""><a href="<?php echo base_url();?>admin/withdrawal"><i class="fa fa-google-wallet"></i> <span>Withdrawal History</span></a></li>
          
            <li class=""><a href="<?php echo base_url();?>admin/profithistory"><i class="fa fa-dollar"></i> <span>Profit History</span></a></li>
            <li class=""><a href="<?php echo base_url();?>admin/deposit"><i class="fa fa-credit-card"></i> <span>Deposit History</span></a></li>
            

   
               <li class=""><a href="<?php echo base_url();?>admin/package"><i class="  fa fa-gift"></i> <span>Package Management</span></a></li>


                  <li class=""><a href="<?php echo base_url();?>admin/settings"><i class="fa fa-wrench"></i> <span>Settings </span></a></li>
          </ul>


       


    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  </div><!-- leftpanel -->
