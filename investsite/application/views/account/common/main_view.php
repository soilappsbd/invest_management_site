<?php $this->load->view("home/common/header_view");?>
<body>
<div class="row">
	<div class="col-md-12 col-sm-12 col-lg-12">
		<nav class="navbar navbar-default " role="navigation" style="background-color: #0f2440">
		   <div class="container" id="navfluid">
		       <div class="navbar-header">
		           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
		               <span class="sr-only">Toggle navigation</span>
		               <span class="icon-bar"></span>
		               <span class="icon-bar"></span>
		               <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="./Index.html">InvestLover</a>
		       </div>
		       <center>
		       <div class="collapse navbar-collapse " id="navigationbar">
		           <ul class="nav navbar-nav">
		               <li><a href="<?php echo base_url();?>">Home</a></li>
								<li><a href="<?php echo base_url();?>welcome/about">about us</a></li>
								<li><a href="<?php echo base_url();?>welcome/terms">terms</a></li>
								<li><a href="<?php echo base_url();?>welcome/faq">Faq</a></li>
								<li><a href="<?php echo base_url();?>welcome/support">SUPPORT</a></li>
								<?php if($this->session->userdata("login")==true){?>		
								<li><a href="<?php echo base_url();?>account">Account</a></li>
							    <li><a  href="<?php echo base_url();?>signout">Logout</a></li> 
								<?php }else{?>
								<li><a href="<?php echo base_url();?>welcome/login">Login</a></li>
							    <li><a  href="<?php echo base_url();?>welcome/signup">signup</a></li> 
								<?php }?>
		           </ul>
		      </div><!-- /.navbar-collapse -->
		  </center>
		   </div><!-- /.container-fluid -->
		</nav>
	</div>		
</div>		




<div class="row">
	<div class="col-md-12 col-sm-12 col-lg-12">

		<div class="accounttop">	
			<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="">
								<p>Hello, <span><?php echo $commondata['memberinfo']['0']->fullname;?></span></p>
							</div>
						</div>
						
						<div class="col-md-6">	
							<div class="reflink">
								<p>Your Personal Affiliate Link:</p>
								<a href=""> <?php echo base_url();?>?ref=<?php echo $commondata['memberinfo']['0']->username; //echo "   :". $_SERVER['REQUEST_URI'];?></a>
							</div>
						</div>
					</div>
				</div>
			<div class="clearfix"></div>	
		</div>	



		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="account_ctn_Left">
						<ul> 
							<li><a class="btn_acc menu_hover" href="<?php echo base_url();?>account/">Account</a></li>
							<li><a class="btn_dep " href="<?php echo base_url();?>account/deposit">Make Deposit</a></li>
							<li><a class="btn_yourdep " href="<?php echo base_url();?>account/deposit_list">Your deposits</a></li>
							<li><a class="btn_trans " href="<?php echo base_url();?>account/earnings">Earnings history</a></li>
							<li><a class="btn_withd " href="<?php echo base_url();?>account/withdraw">Withdraw</a></li>

							<li><a class="btn_withdhistory " href="<?php echo base_url();?>account/withdraw_history">Withdraw history</a></li>
							<li><a class="btn_refer " href="<?php echo base_url();?>account/referals">Your Referrals</a></li>
							<li><a class="btn_reflink " href="<?php echo base_url();?>account/referallinks">Referal Links</a></li>
							<li><a class="btn_setting " href="<?php echo base_url();?>account/settings">Settings</a></li>
						
							<li><a class="btn_logout " href="<?php echo base_url();?>signout">Logout</a></li>
						</ul>
					</div>
				</div>	

				<div class="col-md-9">
					<br/>
					<?php 
						if($this->session->flashdata("msg")){
								echo $this->session->flashdata("msg");
						}
					?>
					<div class="titlebox">
						<h5 class="text-center" style="font-weight: bold; color: #fff;font-size: 26px;"><?php echo $title; ?></h5>
					</div>
					<?php echo $content;?>

				</div>
			</div>		
		</div>				

			
	</div>	
</div>



<?php $this->load->view("home/common/footer_view");?>


</body>


</html>