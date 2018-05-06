<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Payment</title>
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
				<li class="active"><a href="payment.php">Payment</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	

	
		<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Payment</h4>
					</div>
					<div class="clear"></div>

					<form method="post" action=" " style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840;">Plate Number : 
							
							<?php

								$con=mysqli_connect("localhost","root","","garage_management_system");
								$query="SELECT plateNo FROM job WHERE status='completed' AND pay='undone'";
								$result=mysqli_query($con,$query);


								echo"<input list='plate' placeholder='Plate Number' type='text' name='textbox' autocomplete='off' style='position:absolute; top:125px; left:240px;'><datalist   name='textbox' id='plate'>";
								while($row=mysqli_fetch_array($result))
								{
									echo"<option value='$row[0]'/>";

								}
								echo"</datalist>";
							?>
							
							<!--input style="position:absolute; top:125px; left:240px;" type="text" name="textbox"--><input type='submit' value='Submit' name='paysub' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:420px; top:190px;'>
							
							
							</p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:50px;">Service Charges : <input style="position:absolute; top:195px; left:240px;" type="text" name="scharge"><!--input type='button' value='Submit' name='servicesub' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:400px;';--></p></td>
						</tr>
						<tr>
							<td><p style="color:#E5B840; padding-top:30px;">Customer ID : </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Customer Name : </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Loyalty Points :  </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Spare Parts Added<p style="color:#E5B840;  position:absolute; top:410px; left:320px; ">Price</td>
							<!--<p style="padding-top:30px;">&nbsp &nbsp &nbsp 1)</p>
							<p style="padding-top:30px;">&nbsp &nbsp &nbsp 2)</p>
							<p style="padding-top:30px;">&nbsp &nbsp &nbsp 3)</p>-->
							
							<!--<div style="padding-top:35px; height:120px;width:490px;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;"></div>
						-->
							<p style="padding-top:160px;"></p>
						</tr>
						
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:50px;">SUBTOTAL : </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							
							<td method="post" action=" "><p style="color:#E5B840; padding-top:30px; padding-bottom:40px;">Cash-in Points :<input type="text" name="loyalp" style="position:absolute; top:700px; left:240px; " ><input type='submit' name='genrateBill' value='Generate Bill' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:250px; top:760px;'></p></td>
						</tr>
						<!--div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">DISCOUNT : </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px; padding-bottom:40px;">TOTAL (After Discount) : </p></td>
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><input type='button' onclick="window.location.href='payment.php'" value='Clear' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px;'> </button></td>
							<!--td><input type='submi' name='genrateBill' value='Generate Bill' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:250px;'></td>
						-->
						</tr>
						<div class="clear"></div>
					</form>
						
				</div>
			</div>
		</div>
		
	
		
		<!--div class="heading" id="prnt">
			<p style="background-color:white;  width:400px; height:620px; font-size:20px; font-family:arvo; padding-top:40px; padding-left:20px; color:black; font-weight:bold; position:absolute; top:360px; left:700px; text-align:center;">NIHON AUTOMOBILES</p>
			<p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:400px; left:770px;">133/3 Senarathgama, katugasthota</p>
			<p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:440px; left:850px;">071-5552690</p>
			<p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:480px; left:860px;">INVOICE</p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:520px; left:700px;">Invoice Number : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:560px; left:700px;">Date : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:560px; left:900px;">Time : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:600px; left:700px;">Plate Number : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:640px; left:700px;">Customer Name : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:680px; left:700px;">Spare Parts</p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:680px; left:900px;">Price</p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:720px; left:710px;"></p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:760px; left:710px;"></p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:800px; left:710px;"></p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:840px; left:700px;">SUBTOTAL : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:880px; left:700px;">DISCOUNT : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:920px; left:700px;">TOTAL : </p>
			<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:960px; left:840px;font-weight:bold; ">THANK YOU</p>
		
		
	
		</div-->
		
		
		
		<div class="heading" id="prnt">
			<p style="width:400px; height:620px; font-size:20px; font-family:arvo; padding-top:40px; padding-left:20px; color:#E5B840; font-weight:bold; position:absolute; top:360px; left:700px; text-align:center;"></p>
			<!--p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:400px; left:770px;">133/3 Senarathgama, katugasthota</p>
			<p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:440px; left:850px;">071-5552690</p-->
			<p style="font-size:23px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:320px; left:810px;">INVOICE</p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:390px; left:700px;">Invoice Number : </p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:450px; left:700px;">Date : </p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:450px; left:900px;">Time : </p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:500px; left:700px;">Plate Number : </p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:550px; left:700px;">Customer Name : </p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:600px; left:700px;">Spare Parts</p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:600px; left:900px;">Price</p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:720px; left:710px;"></p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:760px; left:710px;"></p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:800px; left:710px;"></p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:800px; left:700px;">SUBTOTAL : </p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:840px; left:700px;">DISCOUNT : </p>
			<p style="font-size:20px; font-family:arvo; padding-top:30px; padding-left:20px; color:#E5B840; position:absolute; top:880px; left:700px;">TOTAL : </p>
			<!--p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:960px; left:840px;font-weight:bold; ">THANK YOU</p-->
		
		
	
		</div>
		
		
		
		<form method="post" action="reports\print.php" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
				
			<input type='submit' value='Print' name='print'  style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:720px; top:960px;'> 
		</form>
		
		
		
		

<?php
include('paymentphp.php');

$pp=new Pay();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	
	if (isset($_POST['paysub'])) 
	{
		//include("connect.php");
		
		$plateno=$_POST['textbox'];
		
		
		$servicecharge=$_POST['scharge'];


//#######################################################################################################################
		
		if(!preg_match("/^[a-zA-Z]{3}[0-9]{4}$/",$plateno) && !preg_match("/^[a-zA-Z]{2}[0-9]{4}$/",$plateno) && !preg_match("/^[0-9]{2}-[0-9]{4}$/",$plateno) && !preg_match("/^[0-9]{3}-[0-9]{4}$/",$plateno) )//plate validation here.................. 
		{
			//echo "lkldadasdadasaks";
			echo"<script>alert('Invalid Plate Number')</script>";
		}
		
		else
		{
			$pp->getCusInfo($plateno,$servicecharge);
		}
	}
}


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if(isset($_POST['genrateBill'])) 
	{
		//include("connect.php");
		$loyalpoints=$_POST['loyalp'];
		$pp->generateB($loyalpoints);
	}
}
?>
	
	
	
		
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
