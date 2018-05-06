<!DOCTYPE HTML>
<html>
<head>


<link href="Garage/css/style.css" rel="stylesheet">
<title>Daily Income Chart</title>
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
				<li><a href="reports.php">Reports</a></li>
				<li class="active"><a href="income.php">Daily Income Chart</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="clear"></div>
	<div class="wrap">
   	 <div class="main">
	    <div class="content" style="position:relative; top:20px; padding-left:50px;">
	    	<h2>Daily Income Chart</h2>
	    	<div class="section group">
			
			
			
			
			<form method="post" action="reports\incomeReport.php" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
						<tr>
							<td><p style="color:#E5B840;">Enter Month : <input placeholder="MM" style="position:absolute; top:135px; left:240px;" type="text" name="month"><input type='submit' value='Submit' name='reportgen' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:420px; top:210px;'></p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:50px;">Enter Year: <input placeholder="YYYY" style="position:absolute; top:210px; left:240px;" type="text" name="year"></p></td>
						</tr>
			</form>
			
			
			
			
			</div>
			</div>
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



