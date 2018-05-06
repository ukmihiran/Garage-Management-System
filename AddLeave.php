<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Add Leave</title>
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
				<li class="active"><a href="AddLeave.php">Add leave</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Add Leave</h4>
					</div>
					<div class="clear"></div>

					
					<form method='post' action='' style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:100px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840; padding-bottom:100px;">Description : <input type="textarea" size="80px"  style="padding-bottom:200px" name='des'></p></td>
							
							
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; ">Date :&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp TO<input type="text" style="position:absolute; top:445px; left:180px;" name='sdate'><input type="text" name='edate' style="position:absolute; top:445px; left:430px; "></p> </td>
						</tr>
						<div class="clear"></div>
						
						<tr>
							<td><input type='submit' name='lb' value='Submit' style='width:150px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:620px; top:440px;'></td>
						</tr>
						<tr>
							<td><input type='button' value='Clear' style='width:150px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:820px; top:440px;'></td>
						</tr>
					</form>
				</div>
			</div>
		</div>
			
</body>


<?php
include('AddLeavePhp.php');

if(($_SERVER['REQUEST_METHOD'])=='POST')
{
	if(isset($_POST['lb']))
	{
		$des=$_POST['des'];
		$sdate=$_POST['sdate'];
		$edate=$_POST['edate'];
		
		if(empty($des)||empty($sdate)||empty($sdate))
		{
			echo"<script>alert('One or more fileds are empty')</script>";
		}
		
		else
		{
			$al=new leave();
			$al->add($des,$sdate,$edate);
			
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
			
					