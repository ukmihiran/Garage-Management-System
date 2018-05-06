<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Update Assign</title>
</head>
<body>
<div class="wrap">
		<div class="header">
			<img style="position:relative; left:400px; top:10px;" src="Garage/images/logo2.png"/>
		</div>
	<form  method="post" action=" ">
			<input type='submit' name='logout' value='Log Out' style='position:absolute; top:5%; left:87%; background-color:ash; color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>;
				
		</form>
		</td>
</div>
    


<!--select style="font-size:1em; color:#3b3b3b; border-radius:5px; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:360px; left:300px" name="vehicletype"> <option value="TYPE">AM</option> <option value="Greater">PM</option></select>
-->
<form method="post" action=" ">
<td style=" position:absolute; top:100px; left:35%;"><input type="text" name="st" placeholder="  Enter Time" size="50%" style="height:20px; width:80px; border-radius:45px;  border-style:none; font-size:15px; position:absolute; top:360px; left:200px "></td>
 <div class="header-bottom" style="position:relative; top:20px;">
			<div class="menu">
				<li><a href="SupHome.php">Home</a></li>
				<li class="active"><a href="UassignedJob.php">Update Job</a></li>
			</div>
			<div class="clear"></div>
  </div>
       <p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:360px; left:80px">Spent Time</style></p>
       <p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:400px; left:80px">Plate Number</style></p>
<p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:445px; left:80px">EMPLOYEE ID</style></p>
<p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:485px; left:80px"></style></p>

<input type="text" name="plate" placeholder="  Enter Plate Number" size="50%" style="height:30px; border-radius:45px;  border-style:none; font-size:15px; position:absolute; top:400px; left:200px"></td></td>

<input type="text" name="eid" placeholder="  Enter Employee ID" size="50%" style="height:30px; border-radius:45px;  border-style:none; font-size:15px; position:absolute; top:440px; left:200px"></td></td>


<input type="reset" name="Clearbotton" value="Reset" style="background-color:grey; color:black; width:100px; height:30px; border-radius:45px; border-style:none; position:absolute; top:550px; left:480px">
  
</td>">
</div>
    
    <tr>
		<td style=" position:absolute; top:1000px; right:35%;"><input type="submit" name="assign" value="Submit" style="background-color:black; color:white; width:100px; height:30px; border-radius:45px; border-style:none; position:absolute; top:550px; left:655px"></td>
		</tr>
</form>    
</body>
</html>


<?php
include('UassignedJobPhp.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['assign']))
	{
		$plate=$_POST['plate'];
		$st=$_POST['st'];
		$eid=$_POST['eid'];
		
		if(empty($plate)||empty($st)||empty($eid))
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
			$up=new job();
			$up->UpdateJob($plate,$st,$eid);
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