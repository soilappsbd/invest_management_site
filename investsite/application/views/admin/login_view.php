<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<link rel="shortcut icon" href="../images/favicon.png" type="image/png">-->

  <title>Admin Login</title>

  <link rel="stylesheet" href="<?php echo base_url();?>assetsadmin/lib/fontawesome/css/font-awesome.css">

  <link rel="stylesheet" href="<?php echo base_url();?>assetsadmin/css/quirk.css">

  <script src="<?php echo base_url();?>assetsadmin/lib/modernizr/modernizr.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="../lib/html5shiv/html5shiv.js"></script>
  <script src="../lib/respond/respond.src.js"></script>
  <![endif]-->
</head>

<body class="signwrapper">

  <div class="sign-overlay"></div>
  <div class="signpanel"></div>

  <div class="panel signin">
    <div class="panel-heading">
      <h1>Earn Line</h1>
      <h4 class="panel-title">Welcome! Please signin.</h4>
    </div>
    <div class="panel-body">
 
      <form action="<?php echo base_url();?>admin_login" method="POST">
        <div class="form-group mb10">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
        </div>
        <div class="form-group nomargin">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text" name="password" class="form-control" placeholder="Enter Password">
          </div>
        </div>
          <br/>
        <div class="form-group">
           <input type="submit" class="btn btn-primary pull-right" value="Login">
        </div>
        
      </form>
      <hr class="invisible">
  
    </div>
  </div><!-- panel -->

</body>
</html>
