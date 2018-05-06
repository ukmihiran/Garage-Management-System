<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Check Leave</title>
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
				<li><a href="EmpHome.php">Home</a></li>
				<li class="active"><a href="Checkleave.php">Check leave</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Check Leave</h4>
					</div>
					<div class="clear"></div>

					
					<form style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:100px; padding-bottom:600px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840;">Leave ID</p></td>
							<!--p style="padding-top:30px;">1)</p>
							<p style="padding-top:30px;">2)</p>
							<p style="padding-top:30px;">3)</p-->
							
							<?php
								
								include('CheckleavePhp.php');
								
								$v=new check();
								$v->view();
								
							?>
							
							
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840; position:absolute; top:120px; left:300px;">Employee ID</p></td>
						</tr>
						<div class="clear"></div-->
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; position:absolute; top:120px; left:300px;">End Date</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; position:absolute; top:120px; left:550px;">Start Date</p></td>
						</tr>
						<div class="clear"></div>
							<tr>
							<td><p style="color:#E5B840; position:absolute; top:120px; left:750px;">Description</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; position:absolute; top:120px; left:1000px;">Status</p></td>
					
						</tr>
					
						<div class="clear"></div>
					</form>
				</div>
			</div>
		</div>
	
		
</body>

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
			