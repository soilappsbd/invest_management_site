<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<title>Investment.com</title>
	<link href='<?php echo base_url();?>assetshome/styles/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url();?>assetshome/styles/custom.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url();?>assetshome/styles/css/hover.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url();?>assetshome/styles/animate.css' rel='stylesheet' type='text/css'>

	<script src='<?php echo base_url();?>assetshome/styles/bootstrap.min.js' type='text/javascript'></script>
	<script src='<?php echo base_url();?>assetshome/styles/calc.js' type='text/javascript'></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href="../maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="icon" href="styles/img/favicon.png" type="image/png"/>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	
        
		<script type="text/javascript">
		var tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

		function GetClock(){
		var tzOffset = -5;//set this to the number of hours offset from UTC

		var d=new Date();
		var dx=d.toGMTString();
		dx=dx.substr(0,dx.length -3);
		d.setTime(Date.parse(dx))
		d.setHours(d.getHours()+tzOffset);
		var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate();
		var nhour=d.getHours(),nmin=d.getMinutes(),ap;
		if(nhour==0){ap=" AM";nhour=12;}
		else if(nhour<12){ap=" AM";}
		else if(nhour==12){ap=" PM";}
		else if(nhour>12){ap=" PM";nhour-=12;}

		if(nmin<=9) nmin="0"+nmin;

		document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+" "+nhour+":"+nmin+ap+"";
		}

		window.onload=function(){
		GetClock();
		setInterval(GetClock,1000);
		}
		</script>
		

</head>