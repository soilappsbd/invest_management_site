
<div class="row" style="background-color: #0a1624">
    <div class="contentinner">
		<h1 style="color: #fff"> USER Login
</h1>
            <?php 
                if($this->session->flashdata("msg")){
                        echo $this->session->flashdata("msg");
                }
            ?>



    <form method="post"   action="<?php echo base_url()?>welcome/login" class="form">
   
    <div class="col-md-6 col-md-offset-3" style="min-height: 500px;">
        <div class="form-box" style="">
         
             <div class="form-group">
                <label for="">
                     Username/Email:
                </label>
                    <input type="text" name="username" placeholder="Username/Email"  class="form-control inputdesign" required>
             </div> 
              <div class="form-group">
                <label for="">
                     Password:
                </label>
                    <input type="password" name="password" placeholder="Password"  class="form-control inputdesign" required>
             </div> 

			<div class="form-group">
                <a href="<?php echo base_url();?>Resetpass"> Forget your Password ?</a>
             </div>  			 
               
             
                <div class="form-group">
                   <div class="text-center"><input  style="    height: 48px;
    width: 206px;
    border-radius: 24px;" type=submit value="Login" class="btn btn-danger"></div>
                </div> 
        </div>        
    </div> 


</form>



<!-- agjai ra div-->
</div>

