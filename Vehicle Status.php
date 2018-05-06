<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Vehicle Status</title>
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
				<li class="active"><a href="payment.html">Vehicle Status</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	

	
		<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Vehicle Status</h4>
					</div>
					<div class="clear"></div>

					<form method="post" action="" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Plate Number :  <input style="position:absolute; top:150px; left:220px;" type="text" name="plate"></</p></td>
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840; padding-top:30px;">Number Of Different Parts : <input style="position:absolute; top:205px; left:330px;" type="text"></p></td>
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; padding-top:30px;">Terminal : <input style="position:absolute; top:210px; left:200px;" type="text" name="terminal"></p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; padding-top:30px;">Vehicle Mileage(km) : <input style="position:absolute; top:260px; left:275px;" type="text"name="mileage"></p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; padding-top:30px;">Description : <input style="position:absolute; padding-left:175px; padding-bottom:150px; top:315px; left:200px;" type="textarea" name="des"></p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:200px;">SID : </p></td>
							<input style="position:absolute; top:540px; left:150px; width:80px;" type="text" name="sid">
							<!--input style="position:absolute; top:620px; left:60px; width:80px;" type="text">
							<input style="position:absolute; top:660px; left:60px; width:80px;" type="text">
							<input style="position:absolute; top:700px; left:60px; width:80px;" type="text"-->
							<!--p style="color:#E5B840;  padding-top:180px;">Date : </p>
							<input style="position:absolute; top:740px; left:400px; width:80px;" type="text">
							<input style="position:absolute; top:620px; left:400px; width:80px;" type="text">
							<input style="position:absolute; top:660px; left:400px; width:80px;" type="text">
							<input style="position:absolute; top:700px; left:400px; width:80px;" type="text"-->
						</tr>
						<!--div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;   position:absolute; left:200px; top:585px;">Part Name  </p></td>
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Qty : <input style="position:absolute; top:595px; left:150px; width:80px;" type="text" name="qty"></p></td>
						</tr>
						<!--div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:600px; top:585px;">Price  </p></td>
						</tr-->
						
						<div class="clear"></div>
						
						<!--tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Time : </p></td>
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Time To Complete: <input style="position:absolute; top:650px; left:275px;" type="text" name="ttc"></p></td>
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Total Amount : </p></td>
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><input type='submit' value='SEND' name="send" style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; top:650px; left:500px;'> </td>
						</tr>
						<div class="clear"></div>
					</form>
						
				</div>
			</div>
		</div>
		
</body>

<?php
include('VehicleStatusPhp.php');
//include('StatusSMS.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['send']))
	{
		$plate=$_POST['plate'];
		$terminal=$_POST['terminal'];
		$sid=$_POST['sid'];
		$qty=$_POST['qty'];
		$ttc=$_POST['ttc'];
		$des=$_POST['des'];
		$mileage=$_POST['mileage'];
		
		if(empty($plate)||empty($terminal)||empty($sid)||empty($qty)||empty($ttc)||empty($des)||empty($mileage))
		{
			echo"<script>alert('One or more fields are empty')</script>";
		}
		else if(!preg_match("/^[a-zA-Z]{3}[0-9]{4}$/",$plate) && !preg_match("/^[a-zA-Z]{2}[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{2}-[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{3}-[0-9]{4}$/",$plate) )//plate validation here.................. 
		{
			//echo "lkldadasdadasaks";
			echo"<script>alert('Invalid Plate Number')</script>";
		}
		
		else
		{
			$vs=new Status();
			$vs->add($plate,$terminal,$sid,$qty,$ttc,$des,$mileage);
			
			/*$_SESSION["pno"]=$plate;
			$_SESSION["des"]=$des;
			$_SESSION["ttc"]=$ttc;
			
			$conn=mysqli_connect("localhost","root","","garage_management_system");
			$query="SELECT moblie FROM customer WHERE plateNo='$plate'";
			$result=mysqli_query($conn,$query);
			$row=mysqli_fetch_array($result);
			$phn=$row[0];
			
			$_SESSION["phn"]=$phn;*/
			
			
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
