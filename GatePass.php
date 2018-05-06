<?php
$page = $_SERVER['PHP_SELF'];
$sec = "20";
?>

<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">

<style>
a:link
{
	color:white;
	padding-left:100px;
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
<link href="Garage/css/style.css" rel="stylesheet">
<title>Gate Pass</title>
</head>
<body>
	
	<div class="wrap">
		<div class="header">
			<div class="nihon">
			<img style="position:relative; left:400px; top:10px;" src="Garage/images/logo2.png"/>
		</div>
		</div>
	<form  method="post" action=" ">
			<input type='submit' name='logout' value='Log Out' style='position:absolute; top:5%; left:87%; background-color:ash; color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>;
				
		</form>
		
		<div class="header-bottom" style="position:relative; top:20px;">
			<div class="menu">
				<!--li><a href="#">Home</a></li-->
				<li class="active"><a href="GatePass.php">Gate Pass</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	
	<div class="wrap">
			<!--div style="padding-top:50px;"-->
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Gate Pass</h4>
					</div>
					<div class="clear"></div>
					
					<p style="font-size:25px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840; position:absolute; left:500px;">SEARCH VEHICLE</p>
					
					<form method="post" action=" " >
						<p style="color:#E5B840; font-family:arvo; font-size:20px; position:absolute; top:180px; left:560px;">Plate Number : 
						
						<?php

								$con=mysqli_connect("localhost","root","","garage_management_system");
								$query="SELECT plateNo FROM customer";
								$result=mysqli_query($con,$query);


								echo"<input list='plate' placeholder='Plate Number' type='text' name='search' autocomplete='off' style='position:absolute; top:4px; left:150px;'><datalist   name='textbox' id='plate'>";
								while($row=mysqli_fetch_array($result))
								{
									echo"<option value='$row[0]'/>";

								}
								echo"</datalist>";
							?>
						
						<!--input style="position:absolute; top:4px; left:150px;" type="text" name="search"-->
						<input type='submit' value='Search' name='sveh' style='width:80px; height:25px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:300px; top:4px;'></p>
					</form>
					
					<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-bottom:100px; padding-left:60px; color:#E5B840; position:absolute; left:500px; top:210px;">Vehicle Availability : </p>
					<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-bottom:50px; padding-left:60px; color:#E5B840;">Plate Number</p>
					<!--p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">1)&nbsp&nbsp&nbsp NN-2020<a href="GatePass.html" >Clear</a></p>
					<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">2)&nbsp&nbsp&nbsp AH-3045<a href="GatePass.html" >Clear</a></p>
					<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">3)&nbsp&nbsp&nbsp PB-2503<a href="GatePass.html" >Clear</a></p>
					<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">4)&nbsp&nbsp&nbsp XZ-6565<a href="GatePass.html" >Clear</a></p>
				-->
				
				<?php

						include('GatePassPhp.php');
						$gpp=new Body();
						$gpp->insert_vehicles(); 
						
					
						if($_SERVER['REQUEST_METHOD']=='POST')
						{
							
							if(isset($_POST['sveh']))
							{
								
								$searchVeh=$_POST['search'];
							
								$gpp->search_vehicle($searchVeh);
							}
						}
					?>
							
					
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

		
		
		
		
		
		
		
		
		
			