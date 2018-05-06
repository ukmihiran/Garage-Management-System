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
	<title>Parts Analyzation</title>
</head>
<body>
<div>
	<div style="list-style-type:none; margin:5px; padding:25px;" ></div>
	<form  method="post" action=" ">
			<input type='submit' name='logout' value='Log Out' style='position:absolute; top:5%; left:87%; background-color:ash; color:black; width:100px; height:30px; border-radius:45px; border-style:none;'>;
				
		</form>
		
</div>

	 <div class="wrap">
        <div class="header">  	
		 <div class="header_image">
		   <img src="Garage/images/images_1/6.jpg" alt="" />
		   				<div class="header_desc">
				 			 <div class="logo">
				 				<a href="index.html"><img src="Garage/images/logo2.png" alt="" /></a>
							 </div>							
		     		    </div>			
		 	</div>				
              <div class="header-bottom">
		          <div class="menu">
					    <ul>
							<li><a href="CusHome.php">Home</a></li>
				<li><a href="vHistory.php">History</a></li>
				<li class="active"><a href="partsAny.php">Parts Analyzation</a></li>
							<div class="clear"></div>
						</ul>
					</div>
		 		    <div class="clear"></div>
               </div>
             </div>
         </div>	
		 
		 
		 <div class="wrap">
			<div class="content" style="position:relative; top:20px;>
				<div class="section group">
					<div class="heading">								
						<h4 style="position:relative; left:-50px;">Parts Analyzation</h4>
					</div>
					<div class="clear"></div>

					<form method="post" action="" style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; padding-bottom:500px; color:#E5B840;">
						<!--tr>
							<td><p style="color:#E5B840;">Plate Number : <input style="position:absolute; top:120px; left:210px;" type="text" name='pno'></p></td>
						</tr-->
						
						<td><p style="color:#E5B840;">Plate Number : 
							
							<?php
								session_start();
								$con=mysqli_connect("localhost","root","","garage_management_system");
								
								$username=$_SESSION["uname"];
								
								$query="SELECT plateNo FROM customer WHERE email='$username'";
								$result=mysqli_query($con,$query);


								echo"<input list='plate' placeholder='Plate Number' type='text' name='pno' autocomplete='off' style='position:absolute; top:125px; left:240px;'><datalist   name='textbox' id='plate'>";
								while($row=mysqli_fetch_array($result))
								{
									echo"<option value='$row[0]'/>";

								}
								echo"</datalist>";
							?>
						</p></td>
						
						
						
						
						
						
						
						
						
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840; padding-top:30px;">Date :  <input style="position:absolute; top:180px; left:190px;" type="text"></p></td>
							<button style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; top:230px; left:500px'  name="Check" type="submit">Check</button>
				
						</tr-->
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840; padding-top:30px;">Current Mileage:  <input style="position:absolute; top:180px; left:250px;" type="text"name='cm'></p></td>
							<input type="submit" name="check" value="Submit" style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; top:175px; left:420px;'>
				
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:50px;">Part Name</p></td>
							<!--p style="padding-top:30px;">1)</p>
							<p style="padding-top:30px;">2)</p>
							<p style="padding-top:30px;">3)</p-->
							
							
							<?php
								include('partsAnyPhp.php');
								
								if(($_SERVER['REQUEST_METHOD'])=='POST')
								{
									if(isset($_POST['check']))
									{
										$plate=$_POST['pno'];
										$cm=$_POST['cm'];
										
										if(empty($plate)||empty($cm))
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
											$pa=new Analyzation();
											$pa->parts($plate,$cm);
										}
									}
								}
								
								
							
							?>
							
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:250px; left:300px;">Date</p></td>
						</tr>
						
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:250px; left:460px;">Mileage(When added)</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:250px; left:700px;">Durability</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:250px; left:900px;">Condition</p></td>
						</tr>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  position:absolute; top:250px; left:1050px;">Key</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:250px; left:1050px;">Good=Green</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:400px; left:1050px;">Average=Orange</p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; top:450px; left:1050px;">Replace=Red</p></td>
						</tr-->
						
						<div class="clear"></div>
					</form>
						
				</div>
			</div>
		</div>	
	
		
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

						