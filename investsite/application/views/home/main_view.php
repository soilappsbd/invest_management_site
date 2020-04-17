<?php $this->load->view("home/common/header_view");?>
<body>

	
	<div class="headerBotContainer">
		<div class="headerBotInner">
			<div class="navbar">
				<div class="navbar-inner">
					<ul class="nav">                   
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
				</div>
			</div>
		</div>
	</div>


<?php echo $content;?>

	<div class="paymentContainer">
		<div class="paymentInner">
			<div class="payment">
				<img style="margin-top: 8px;" src="<?php echo base_url();?>assetshome/styles/img/payment.png"/>
				</a> 
			</div>
		</div>
	</div><!-- end paymentContainer -->
<?php $this->load->view("home/common/footer_view");?>


</body>


</html>