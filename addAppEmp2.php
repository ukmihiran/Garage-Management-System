<!DOCTYPE HTML>
<html>
<head>

<style>

a:link
{
	color:white;
}
a:visited
{
	color:white;
}
a:hover
{
	color:grey;
}	
</style>


	<link href="Garage/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<title>Message</title>
</head>
<body>
<body>
	
	
	<div class="wrap">
		<div class="header">
			<img style="position:relative; left:400px; top:10px;" src="Garage/images/logo2.png"/>
		</div>
	<form  method="post" action=" ">
			<input type='submit' name='logout' value='Log Out' style='position:absolute; top:5%; left:87%; background-color:ash; color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>;
				
		</form>
		
		<div class="header-bottom" style="position:relative; top:20px;">
			<div class="menu">
				<li><a href="SupHome.php">Home</a></li>
				<li><a href="addAppEmp.php">Create Appointment</a></li>
				<li class="active"><a href="addAppEmp2.php">Message</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Message</h4>
					</div>
					<div class="clear"></div>
					
					
					
<div style="padding-top:70px;">					
<?php

session_start();

$plate=$_SESSION['plate'];
$date=$_SESSION['date'];

$conn=mysqli_connect("localhost","root","","garage_management_system");

$appts=$_SERVER['QUERY_STRING'];
$appte=$appts+1;
$appts="$appts:00:00";
$appte="$appte:00:00";	

date_default_timezone_set("Asia/Colombo");
$time=date('h:i:s');

$query="SELECT cid FROM customer WHERE plateNo='$plate'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

$cid=$row[0];

$query="SELECT eid FROM appointment WHERE slot_start='$appts'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);

if($count>0)
{
	
	$query="SELECT eid FROM employee WHERE eid NOT IN (SELECT eid FROM appointment WHERE slot_start='$appts')";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$eid=$row[0];
	/*while($row=mysqli_fetch_array($result))
	{
		
		$eid=$row[1];
		if($count<)
		$query="SELECT COUNT(eid) FROM employee";
		
	}*/
}
else
{
	$query="SELECT * FROM employee";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$eid=$row[0];
}

$query="INSERT INTO appointment(time,date,slot_start,slot_end,cid,plateNo,eid) VALUES ('$time','$date','$appts','$appte','$cid','$plate','$eid')";
$result=mysqli_query($conn,$query);

$query="SELECT aid FROM appointment ORDER BY aid DESC LIMIT 1";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$aid=$row[0];
			
$val='A00'.$aid;
			
$query="UPDATE appointment SET APPID='$val' WHERE aid='$aid'";
$result=mysqli_query($conn,$query);

echo"<p style='font-size:22px; font-family:arvo; color:white; font-weight:bold; padding-bottom:100px;'>&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp Appointment Added Successfully</p>";


?>
</div>
					
					
					
					
					
					
     
</body>
</html>
	 
	<?php
include('UserM.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['logout']))
	{
		$lg=new User();
		$lg->logout();
	}
}
?>	 
		 
		 