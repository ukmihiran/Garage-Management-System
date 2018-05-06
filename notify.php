<!DOCTYPE HTML>
<html>
<head>

<style>

a:link
{
	color:#E5B840;
}
a:visited
{
	color:#E5B840;
}
a:hover
{
	color:grey;
}	
</style>

<link href="Garage/css/style.css" rel="stylesheet">
<title>Stock Notifications</title>
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
				<li><a href="ManagerHome.php">Home</a></li>
				<li class="active"><a href="notify.php">Stock Notifications</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Stock Notifications</h4>
						
						<!--p style="font-size:25px; font-family:Rockwell Extra Bold; font-weight:bold; padding-top:30px; padding-left:60px; color:white; position:absolute; left:800px; top:20px; ">LOYALTY POINTS</p>
						<p style="font-size:45px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:white; position:absolute; left:870px; top:60px; ">200</p>
						-->
					</div>
					<div class="clear"></div>

					<form method="post" action=" " style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
					
				
						
						<tr>
							<td><p style="color:#E5B840; position:absolute; left:70px; top:150px;">Part Name  </p></td>
					
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;   position:absolute; left:230px; top:150px;">Qty  </p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;   position:absolute; left:290px; top:150px;">Model</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:390px; top:150px;">Type</p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:490px; top:150px;">Price(1 unit)</p></td>
						</tr>
						<div class="clear"></div>
					
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:660px; top:150px;">Supplier Email </p></td>
						</tr>
						<div class="clear"></div>
						<tr style="padding-top:30px;">
						
			
						</tr>
						
							<tr>
							<td><p style="color:#E5B840;  position:absolute; left:900px; top:150px;">Supplier Name </p></td>
						</tr>
						<div class="clear"></div>
						<tr style="padding-top:30px;">
						
			
						</tr>

								<div class="clear"></div>
						<tr style="padding-top:30px;">
						
						<?php
							include('notifyPhp.php');
							
							$sn=new Notification();
							$sn->send();
							
						?>
						</tr>
						
						
						
						<tr>
							<td><p style="color:#E5B840;  padding-top:800px;"> </p></td>
						</tr>
						<div class="clear"></div>
					</form>
						
				</div>
			</div>
		</div>
		
		
		
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