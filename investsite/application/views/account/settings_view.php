<br/>
<div class="row">
	<div class="col-md-12">
		<?php //pd($commondata);?>

		
		
		<form action="<?php echo base_url();?>account/settings" method="post" class="form">
			<input type="hidden" name="id" value="<?php echo $commondata['memberinfo']['0']->id;?>">
			<div class="row">
				<div class="form-group">
					<div class="col-md-4">
						<label>Account Name: </label>
					</div>
					<div class="col-md-6">
						<strong><?php echo $commondata['memberinfo']['0']->username;?></strong>
					</div>
				</div>	
			</div>
			
			<br/>
			
			<div class="row">
				<div class="form-group">
					<div class="col-md-4">
						<label>Registration date: </label>
					</div>
					<div class="col-md-6">
						<strong><?php echo date("d-M-Y",$commondata['memberinfo']['0']->updatetime);?></strong>
					</div>
				</div>
			</div>
			
			<br/>
				
			<div class="row">
				<div class="form-group">
					<div class="col-md-4">
						<label>Your Full Name: </label>
					</div>
					<div class="col-md-6">
						<input type="text" name="fullname" value="<?php echo $commondata['memberinfo']['0']->fullname;?>" class="form-control">
					</div>
				</div>
			</div>
			
			<br/>
			
			<div class="row">
				<div class="col-md-4">
					<label>New Password: </label>
				</div>
				<div class="col-md-6">
					<input type="password" name="password" value="<?php echo $commondata['memberinfo']['0']->password;?>" class="form-control">
				</div>
			</div>
			
			<br/>
			
			<div class="row">
				<div class="col-md-4">
					<label>Retype Password: </label>
				</div>
				<div class="col-md-6">
					<input type="password" name="password2" value="<?php echo $commondata['memberinfo']['0']->password;?>" class="form-control">
				</div>
			</div>
			
			<br/>
			
			<div class="row">
				<div class="col-md-4">
					<label>Your PerfectMoney acc no: </label>
				</div>
				<div class="col-md-6">
					<input type="text" class="form-control"   name="pmid" value="<?php echo $commondata['memberinfo']['0']->pmid;?>" data-validate="regexp" data-validate-regexp="^U\d{5,}$" data-validate-notice="UXXXXXXX">
				</div>
			</div>
			
			<br/>
				
			<div class="row">
				<div class="col-md-4">
					<label>Your Bitcoin acc no: </label>
				</div>
				<div class="col-md-6">
					<input  type="text" class="form-control" name="btcid" value="<?php echo $commondata['memberinfo']['0']->btcid;?>" data-validate="regexp" data-validate-regexp="^[13][a-km-zA-HJ-NP-Z1-9]{25,34}$" data-validate-notice="Bitcoin Address">
				</div>
			</div>	
			
			<br/>
				
			<div class="row">
				<div class="col-md-4">
					<label>Email: </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="email" value="<?php echo $commondata['memberinfo']['0']->email;?>" class="form-control" disabled="disabled">
				</div>
			</div>
			
				<br/>


			<div class="row">
				<div class="col-md-4">
					<label>Security Question: </label>
				</div>
				<div class="col-md-6">
					<select class="form-control" name="sq">
							<option> What is the name of your favorite childhood friend?</option>
							<option> What is your favorite team? </option>
							<option> What is your favorite movie? </option>
							<option> What was the make and model of your first car? </option>
							<option> In what town was your first job? </option>
					</select>	
				</div>
			</div>

<br/>

			<div class="row">
				<div class="col-md-4">
					<label>Security Answer: </label>
				</div>
				<div class="col-md-6">
					<input type="text" name="sa" value="<?php echo $commondata['memberinfo']['0']->sa;?>" class="form-control" >
				</div>
			</div>

		<br/>

			<div class="row">
				<div class="col-md-4">
					
				</div>
				<div class="col-md-6">
					<input type="submit" value="Update" class="btn btn-primary pull-right">
				</div>
			</div>
		
		</form>
				

	</div>
</div>