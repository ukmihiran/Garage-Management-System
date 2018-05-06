<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Appointment View</title>
</head>
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
				<li class="active"><a href="appointments.html">Appointment View</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Appointments</h4>
					</div>
					<div class="clear"></div>

					<form style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; padding-bottom:500px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840;">Appointment ID </p></td>
							<!--p style="padding-top:30px;">&nbsp &nbsp &nbsp 1)</p>
							<p style="padding-top:30px;">&nbsp &nbsp &nbsp 2)</p>
							<p style="padding-top:30px;">&nbsp &nbsp &nbsp 3)</p-->
							
							<?php
								include('apviewPhp.php');
								$apv=new Appointment();
								$apv->view();
							?>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; position:absolute; left:300px; top:120px;">Plate No.</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:450px; top:120px;"> Customer Name</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:700px; top:120px;">Technician</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:850px; top:120px;">Date<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:960px; top:120px;">Slot Start</p></td>
						</tr>  
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:1080px; top:120px;">Slot End</p></td>
						</tr>
						</tr>
						<div class="clear"></div>
					</form>
				</div>
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

