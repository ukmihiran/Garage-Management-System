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
	<title>Create Appointment</title>
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
				<li class="active"><a href="addAppEmp.php">Create Appointment</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Create Appointment</h4>
					</div>
					<div class="clear"></div>

					<form method="post" action=" " style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:700px; padding-left:60px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840; position:absolute; top:125px; left:70px;">Plate Number : <input style="position:absolute; top:5px; left:250px;" type="text" name='plate'></p></td>
						</tr>
						<div class="clear"></div>
						
						<tr>
							<td><p style="color:#E5B840; position:absolute; top:125px; left:750px;">Plate Number :</p></td>
						</tr>
						<div class="clear"></div>
						
						<tr>
							<td><p style="color:#E5B840; position:absolute; top:180px; left:750px;">Customer ID :</p></td>
						</tr>
						<div class="clear"></div>
						
						<tr>
							<td><p style="color:#E5B840; position:absolute; top:235px; left:750px;">Customer Name :</p></td>
						</tr>
						<div class="clear"></div>
						
						<!--tr>
							<td><p style="color:#E5B840; padding-top:30px;">Customer ID : </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;"> Customer Name : </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Availability of Technicians : </p></td>
							<select style="position:absolute; top:290px; left:320px;" class="form-input" name="Mechanic" placeholder="Select Mechanic">
							<option value="1">Mechanic 1</option>
							<option value="2">Mechanic 2</option>
							<option value="3">Mechanic 3</option>
							<option value="4">Mechanic 4</option>
							<option value="5">Mechanic 5</option>
					
				</select>
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:170px; left:70px;">Date : <input style="position:absolute; top:5px; left:250px;" type="date" placeholder="YY-MM-DD" name='d'><div class="clear"></div>
						</tr>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:290px; left:750px;">Date : <div class="clear"></div>
						</tr>
						
						<tr>
							<td><input type='submit' value='Submit' name='check' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:500px; top:170px;'></td>
						</tr>
						
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px; position:absolute; top:310px; left:750px;">Availability of Time : </p></td>
							<!--select style="position:absolute; top:230px; left:950px;" class="form-input" name="Mechanic" placeholder="Select Mechanic">
							<option value="1">8a.m. - 10a.m.</option>
							<option value="2">12p.m. - 3p.m.</option>
							<option value="3">4p.m. - 6p.m.</option-->
							
						</tr>  </p></td>
						</tr>
						<!--div class="clear"></div>
						<tr>
							<td><input type='submit' value='Create Appointment' name='create' style='width:150px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:935px; top:280px;'></td>
						</tr>
						<div class="clear"></div-->
					</form>
						<div class="clear"></div>
				</div>
			</div>
		</div>
		
	
<?php
include('addAppEmpPhp.php');

if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['check']))
	{
		$date=$_POST['d'];
		$plate=$_POST['plate'];
		
		if(empty($date)||empty($plate))
		{
			echo"<script>alert('One are more fields are empty')</script>";
		}
		else if(!preg_match("/^[a-zA-Z]{3}[0-9]{4}$/",$plate) && !preg_match("/^[a-zA-Z]{2}[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{2}-[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{3}-[0-9]{4}$/",$plate) )//plate validation here.................. 
		{
			//echo "lkldadasdadasaks";
			echo"<script>alert('Invalid Plate Number')</script>";
		}
		
		else
		{
				$ac=new Appoinment();
				$ac->create($date,$plate);
		}
	}
}
?>
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
					