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

<link href="Garage/css/style.css" rel="stylesheet">
<title>Home</title>
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
				<li class="active"><a href="SupHome.php">Home</a></li>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="wrap">
   	 <div class="main">
	    <div class="content" style="position:relative; top:20px; padding-left:150px;">
	    	<h2>Home</h2>
	    	<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-3.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						<h3><a href="payment.php" >Issue Bill</a></h3>
					</div>
					</div>			
					<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-6.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="addCus.php" >Register Customer</a></h3>
						  </div>
				</div>
				</div>
			 
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-1.png" alt="" />
					</div>
				    <div class="text list_2_of_1">
						<h3><a href="MarkAttendence.html" >Mark Attendence</a></h3>
						
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-2.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="jobassign.php" >Assign Job</a></h3>
						 </div>
				</div>
			</div>  
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-4.png" alt="" />
					</div>
				    <div class="text list_2_of_1">
						<h3><a href="Vehicle Status.php" >Update Vehicle Status</a></h3>
						</div>
			   </div>			
			
			
			<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-5.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="addAppEmp.php" >Add Appointments</a></h3>
						  </div>
				</div>
			</div>  

			<div class="section group">		
			<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-2.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="apview.php" >View Appointments</a></h3>
						  </div>
				</div>
				
			
			
				
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-1.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="UassignedJob.php" >Job Status</a></h3>
						</div>
				</div>
			</div>	
			</div> 
		    </div>
		</div> 
		</div>  
			
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
	 


					