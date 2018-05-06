<!DOCTYPE HTML>
<html>
<head>
<link href="Garage/css/style.css" rel="stylesheet">
<title>Assigned Jobs</title>
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
<div class="header-bottom" style="position:relative; top:20px;">
		   <div class="menu">
				<li><a href="EmpHome.php">Home</a></li>
				<li class="active"><a href="viewAssignedJobs.php">Assigned Jobs</a></li>
			</div>
			<div class="clear"></div>
  </div>
       <!--p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:360px; left:80px">Time</style></p>
       <p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:400px; left:80px">Job ID</style></p>
<p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:445px; left:80px">EMPLOYEE ID</style></p>
<p style="font-size:1.5em; color:#E5B840; padding:1px px; font-family: 'bebas_neueregular'; position:absolute; top:485px; left:80px"></style></p>
</td></td-->

<img src="Garage/images/tabel2.jpg" alt="" width="1000" height="1000" style=" position:absolute; top:280px;  right:150px;"/>
        
</body>
</html>
<?php
include('assignedJobsPhp.php');
$aj=new Job();
$aj->view();

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
