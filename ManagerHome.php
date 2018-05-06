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
				<li class="active"><a href="ManagerHome.php">Home</a></li>
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
						  <img src="Garage/images/service-1.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="payroll.php" >Payroll</a></h3>
						</div>
				</div>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-2.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="UpdateEmp.php" >Update Employee Personal Information</a></h3>
						  </div>
				</div>
			 
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-3.png" alt="" />
					</div>
				    <div class="text list_2_of_1">
						<h3><a href="addEmp.php" >Add Employees</a></h3>
						
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-4.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="leaveView.html" >View Employee Leave</a></h3>
						 </div>
				</div>
			</div>  
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-5.png" alt="" />
					</div>
				    <div class="text list_2_of_1">
						<h3><a href="addstock.php" >Add Stock</a></h3>
						</div>
			   </div>			
			
			
			<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-6.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="stockupdate.php" >Update Stock</a></h3>
						  </div>
				</div>
			</div>  

				<div class="section group">	
			<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-1.png" alt="" />
					</div>
					<div class="text list_2_of_1">
						  <h3><a href="reports.php" >Reports</a></h3>
						  </div>
				</div>
				
				  	<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <img src="Garage/images/service-4.png" alt="" />
					</div>
				    <div class="text list_2_of_1">
						<h3><a href="notify.php" >Notifications</a></h3>
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


					