<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Payroll</title>
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
				<li class="active"><a href="payroll.php">Payroll</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Payroll</h4>
					</div>
					<div class="clear"></div>

					<form method="post" action=" " style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-bottom:500px; padding-left:60px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840;">Employee ID : <input style="position:absolute; top:125px; left:320px;" type="text" name='eid'></p></td>
						</tr>
					
						
						
						
						
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; padding-top:30px;">Basic Salary : <input style="position:absolute; top:175px; left:320px;" type="text" name='amount'></p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;"> OT : <input style="position:absolute; top:225px; left:320px;" type="text" name='OT'></p></td>
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  padding-top:30px;"> ETF : <input style="position:absolute; top:285px; left:320px;" type="text" name='ETF' ></p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;"> EPF : <input style="position:absolute; top:335px; left:320px;" type="text" name='EPF'></p></td>
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;"> Bonus : <input style="position:absolute; top:280px; left:320px;" type="text" name='bonus'></p></td>
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  padding-top:30px;"> Date :</p></td>
						</tr-->
						<div class="clear"></div>
						
						
						<tr>
							<td><input type='button' value='Clear' style='width:150px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:720px; top:280px;'></td>
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><input type='button' value='Print' style='width:150px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:1000px; top:280px;'></td>
						</tr-->
						<div class="clear"></div>
						
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:50px;"> Salary ID</p></td>
							<!--p style="padding-top:30px;">1)</p>
							<p style="padding-top:30px;">2)</p>
							<p style="padding-top:30px;">3)</p-->
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:355px; left:230px;">Employee Name</td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  position:absolute; top:355px; left:480px;">Address</td>
						</tr-->
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:355px; left:480px;">Basic Salary</td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:355px; left:680px;">EPF</td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:355px; left:860px;">ETF</td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  position:absolute; top:465px; left:800px;">OT</td>
						</tr-->
						<div class="clear"></div>
						
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:355px; left:1000px;">Total</td>
						</tr>
						<div class="clear"></div>
						<div style="padding-bottom:100px;"></div>
						<tr>
							<td><input type='submit' name="cal" value='Calculate salary' style='width:150px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:520px; top:280px;'></td>
						</tr>
						<div class="clear"></div>
					</form>
						
				</div>
			</div>
		</div>
		
	
</body>
</html>

<?php
include('payrollPhp.php');

if(($_SERVER['REQUEST_METHOD'])=='POST')
{
	if(isset($_POST['cal']))
	{
		$Employee_ID=$_POST['eid'];
		$amount=$_POST['amount'];
		$OT=$_POST['OT'];
		//$ETF=$_POST['ETF'];
		//$EPF=$_POST['EPF'];
		$Bonus=$_POST['bonus'];
		
		
		if(empty($Employee_ID)||empty($amount)||empty($OT) && $OT!=0||empty($Bonus) && $Bonus!=0)
		{
			echo"<script>alert('One or more fileds are empty')</script>";
		}
		
		else if(!is_numeric($amount)||!is_numeric($OT)||!is_numeric($Bonus))
		{
			if(!is_numeric($amount))
			{
				echo"<script>alert('Non-numeric value entered for amount')</script>";
			}
			else if(!is_numeric($OT))
			{
				echo"<script>alert('Non-numeric value entered for OT hours')</script>";
			}
			else
			{
				echo"<script>alert('Non-numeric value entered for bonus')</script>";
			}
		}
		
		else
		{
			$addp=new Salary();
			$addp->add($Employee_ID,$amount,$OT,$Bonus);
		}
		
		//echo "sasd";
		
		
		
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
					