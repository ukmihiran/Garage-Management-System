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
<title>Order</title>
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
				<li><a href="notify.php">Stock Notifications</a></li>
				<li class="active"><a href="order.php">Order</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<div  style="position:relative; top:50px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Order</h4>
						
						<!--p style="font-size:25px; font-family:Rockwell Extra Bold; font-weight:bold; padding-top:30px; padding-left:60px; color:white; position:absolute; left:800px; top:20px; ">LOYALTY POINTS</p>
						<p style="font-size:45px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:white; position:absolute; left:870px; top:60px; ">200</p>
						-->
					</div>
					<div class="clear"></div>


					
					<form method="post" action="" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
					
					
					
					<?php
					
						$conn=mysqli_connect("localhost","root","","garage_management_system");
						$stockid=$_SERVER['QUERY_STRING'];
						//echo $stockid;
						
						
						$query="SELECT * FROM stock WHERE sid='$stockid'";
						$result=mysqli_query($conn,$query);
						$row=mysqli_fetch_array($result);
						
					
						echo "<p style='color:#E5B840; position:absolute; left:70px; top:75px;'>Stock ID  </p>";
						$sid=$row[9];						
						echo "<p style='color:white; position:absolute; left:200px; top:75px;'>: $sid</p>";
						
						echo "<p style='color:#E5B840; position:absolute; left:70px; top:125px;'>Part Name  </p>";
						$name=$row[2];
						echo "<p style='color:white; position:absolute; left:200px; top:125px;'>: $name</p>";
						
						echo "<p style='color:#E5B840; position:absolute; left:70px; top:175px;'>Current Quantity  </p>";
						$cqty=$row[1];
						echo "<p style='color:white; position:absolute; left:250px; top:175px;'>: $cqty</p>";
						
						echo "<p style='color:#E5B840; position:absolute; left:70px; top:225px;'>Type  </p>";
						$type=$row[4];
						echo "<p style='color:white; position:absolute; left:250px; top:225px;'>: $type</p>";
						
						echo "<p style='color:#E5B840; position:absolute; left:70px; top:275px;'>Supplier Name  </p>";
						$sn=$row[5];
						echo "<p style='color:white; position:absolute; left:250px; top:275px;'>: $sn</p>";
						
						echo "<p style='color:#E5B840; position:absolute; left:70px; top:325px;'>Supplier Email  </p>";
						$email=$row[6];
						echo "<p style='color:white; position:absolute; left:250px; top:325px;'>: $email</p>";
						
						echo "<p style='color:#E5B840; position:absolute; left:70px; top:375px; padding-bottom:150px;'>Odering Quantity <input type='text' name='oqty' style='position:absolute; top:5px; left:200px;'> </p>";
						echo "<input type='submit' name='orderb' value='Order' style='position:absolute; top:375px; left:450px; background-color:ash;  color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>";
						
						
						
					?>
					
					
					<!--p style='color:#E5B840; position:absolute; left:70px; top:375px; padding-bottom:150px;'>Odering Quantity <input type='text' name='oqty' style='position:absolute; top:5px; left:200px;'> </p>
					<input type='submit' name='orderb' value='Order' style='position:absolute; top:375px; left:450px; background-color:ash;  color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>
					-->	
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






<?php
include('orderPhp.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['orderb']))
	{
		//$email=$_POST[''];
		$qty=$_POST['oqty'];
		
		if(empty($qty))
		{
			echo"<script>alert('Quantity field is empty')</script>";
		}
		
		else if(!is_numeric($qty))
		{
			echo"<script>alert('Quantity should be a numeric value')</script>";
		}
		else
		{
			$ord=new Order();
			$ord->orderQty($email,$qty,$sn,$name);
		}
		
	}
}
?>