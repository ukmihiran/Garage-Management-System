<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Add Customer</title>
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
				<li class="active"><a href="addCus.html">Add Customer</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Add Customer</h4>
					</div>
					<div class="clear"></div>

					<form  method="post" action=" " style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840;">Name : <input style="position:absolute; top:125px; left:320px;" type="text" name='cname'></p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; padding-top:30px;">Plate Number : <input style="position:absolute; top:175px; left:320px;" type="text" name='pno'></p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Username : <input style="position:absolute; top:230px; left:320px;" type="text" name='uname'></p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Password: <input style="position:absolute; top:285px; left:320px;" type="text" name="pass"></p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Address : <input style="position:absolute; top:340px; left:320px;" type="text" name='address'></p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Phone : <input style="position:absolute; top:390px; left:320px;" type="text" name='phn'></p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Email : <input style="position:absolute; top:445px; left:320px;" type="text" name='mail'></p></td>
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Email: <input style="position:absolute; top:500px; left:320px;" type="text" name='mail'></p></td>
						</tr-->
						<div class="clear"></div>
					
						
						<div class="clear"></div>
						
						<tr>
							<td><input type='submit' name="addcus" value='Add Customer' style='width:150px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:500px; top:445px;'></td>
						</tr>
						<div class="clear"></div>
					</form>
						
				</div>
			</div>
		</div>
</body>

<?php
include('addCusPhp.php');
if(($_SERVER['REQUEST_METHOD'])=='POST')
{
	if(isset($_POST['addcus']))
	{
		$name=$_POST['cname'];
		$plate=$_POST['pno'];
		$uname=$_POST['uname'];
		$pword=$_POST['pass'];
		$add=$_POST['address'];
		$phn=$_POST['phn'];
		$email=$_POST['mail'];
		
		
		if(empty($name)||empty($plate)||empty($uname)||empty($pword)||empty($add)||empty($phn)||empty($email))
		{
			echo"<script>alert('One or more fileds are empty')</script>";
		}
		else if(!preg_match("/^[a-zA-Z]{3}[0-9]{4}$/",$plate) && !preg_match("/^[a-zA-Z]{2}[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{2}-[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{3}-[0-9]{4}$/",$plate) )//plate validation here.................. 
		{
			//echo "lkldadasdadasaks";
			echo"<script>alert('Invalid Plate Number')</script>";
		}
		
		else
		{
			$addc=new Customer();
			$addc->add($name,$plate,$uname,$pword,$add,$phn,$email);
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
					