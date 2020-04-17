
<div class="row" style="background-color: #0a1624">
    <div class="contentinner">
			<h1 style="color: #fff"> USER REGISTRATION
</h1>

            <?php 
                if($this->session->flashdata("msg")){
                        echo $this->session->flashdata("msg");
                }
            ?>



    <form method="post"   action="<?php echo base_url()?>welcome/signup" class="form">
   
		<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
		
			<div class="form-box">
			   <div class="form-title">Account Information</div>
				
					<!---form statr-->
					
					
			<div class="row">
				<div class="col-md-12">
		
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="">
								 Full Name:
								</label>
							</div>
							<div class="col-md-9">
								<input type="text" name="fullname" placeholder="Full name"  class="form-control inputdesign"  required>
							</div>
						</div>
					</div>       
				</div>
			</div>
			
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="">
								Username:
								</label>
							</div>
							<div class="col-md-9">
								<input  type="text" name="username"  placeholder="Username" class="form-control inputdesign" required>
							</div>
						</div>
					</div>       
				</div>
			</div>
		   
          	<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<div class="row">
							<div class="col-md-3">
								<label for="">
								Define Password:
								</label>
							</div>
							<div class="col-md-9">
								<input type="password" name="password" placeholder="Passowrd" class="form-control inputdesign" required> 
							</div>
						</div>
					</div>       
				</div>
			</div>
			 
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">
									  Retype Password:
									</label>
								</div>
								<div class="col-md-9">
									<input type="password" name="password2" placeholder="Retyp Passowrd" class="form-control inputdesign" required>
								</div>
							</div>
						</div>       
					</div>
				</div>	

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">
									   E-mail Address:
									</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="email" value="" placeholder="Email Address" class="form-control inputdesign" required>
								</div>
							</div>
						</div>       
					</div>
				</div>		

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">
									   Secret question:
									</label>
								</div>
								<div class="col-md-9">
									<select class="form-control inputdesign" name="sq">
										<option> What is the name of your favorite childhood friend?</option>
										<option> What is your favorite team? </option>
										<option> What is your favorite movie? </option>
										<option> What was the make and model of your first car? </option>
										<option> In what town was your first job? </option>
									</select>
								</div>
							</div>
						</div>       
					</div>
				</div>	

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">
									   Secret answer:
									</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="sa" placeholder="Secret Answer" class="form-control inputdesign" required>
								</div>
							</div>
						</div>       
					</div>
				</div>	

			<div class="form-title">Payment Information</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">
									   BitCoin Account :
									</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="btcid" placeholder="Bitcoin Receive Account" class="form-control inputdesign">
								</div>
							</div>
						</div>       
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">
									   PerfectMoney Account :
									</label>
								</div>
								<div class="col-md-9">
									<input type="text" name="pmid" placeholder="PerfectMoney Account" class="form-control inputdesign">
								</div>
								</div>
							</div>
						</div>       
					</div>
				</div>				
       				
       
		<div class="form-box">
            <div class="form-title">Confirmation</div>
			
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-3">
									<label for="">
									  Your Upline :
									</label>
								</div>
								<div class="col-md-9">
									<input type="text" name=""  value="<?php echo @$referredby[0]->username;?>" class="form-control" style="  background: #153056;
    border: 1px solid #2e568e" disabled="disabled">
								</div>
								</div>
							</div>
						</div>       
					</div>
			
				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								<div class="col-md-5">
									<label for="">
									  Terms and Condition:
									</label>
								</div>
								<div class="col-md-7">
									<input type="checkbox" name="agree" class="form-contorl" 
									style="height: 15px;
											width: 15px;
											margin-top: 2px;
											" checked> 
									<span style="margin-left: 10px">I accept <a href="<?php echo base_url(); ?>welcome/terms" target="blank">Terns of Services</a>  </span>
								</div>
								</div>
							</div>
						</div>       
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="row">
								
								<div class="col-md-12">
									 <div class="text-center"><input  style="    height: 48px;
    width: 206px;
    border-radius: 24px;" type=submit value="Register" class="btn btn-danger"></div>
								</div>
								</div>
							</div>
						</div>       
					</div>
				</div>
					<!---form end-->
					
			
				
			</div>
		</div>
	</div>
	</form>



<!-- agjai ra div-->
</div>
</div>
