

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

	<link href="Garage/css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<title>Message</title>
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
							<li><a href="addAppCus.php">Create Appointment</a></li>
							<li class="active"><a href="cusappview.html">Message</a></li>
							
							
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
						<h4 style="position:relative; left:-50px;">Message</h4>
					</div>
					<div class="clear"></div>
					
					
					
<div style="padding-top:70px;">					
<?php

session_start();

$plate=$_SESSION['plate'];
$date=$_SESSION['date'];

$conn=mysqli_connect("localhost","root","","garage_management_system");

$appts=$_SERVER['QUERY_STRING'];
$appte=$appts+1;
$appts="$appts:00:00";
$appte="$appte:00:00";	

date_default_timezone_set("Asia/Colombo");
$time=date('h:i:s');

$query="SELECT cid FROM customer WHERE plateNo='$plate'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);

$cid=$row[0];

$query="SELECT eid FROM appointment WHERE slot_start='$appts'";
$result=mysqli_query($conn,$query);
$count=mysqli_num_rows($result);

if($count>0)
{
	
	$query="SELECT eid FROM employee WHERE eid NOT IN (SELECT eid FROM appointment WHERE slot_start='$appts')";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$eid=$row[0];
	/*while($row=mysqli_fetch_array($result))
	{
		
		$eid=$row[1];
		if($count<)
		$query="SELECT COUNT(eid) FROM employee";
		
	}*/
}
else
{
	$query="SELECT * FROM employee";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
	$eid=$row[0];
}

$query="INSERT INTO appointment(time,date,slot_start,slot_end,cid,plateNo,eid) VALUES ('$time','$date','$appts','$appte','$cid','$plate','$eid')";
$result=mysqli_query($conn,$query);

$query="SELECT aid FROM appointment ORDER BY aid DESC LIMIT 1";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$aid=$row[0];
			
$val='A00'.$aid;
			
$query="UPDATE appointment SET APPID='$val' WHERE aid='$aid'";
$result=mysqli_query($conn,$query);



echo"<p style='font-size:22px; font-family:arvo; color:white; font-weight:bold; padding-bottom:100px;'>&nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp &nbsp Appointment Added Successfully</p>";


?>
</div>
					
					
					
					
					
					
					
					
					
					
					  <div class="wrap">
   <div class="footer">
   	 <div class="footer_grides">
	     <div class="section group">
				<!--<div class="col_1_of_4 span_1_of_4">
					<h3>Latest Tweets</h3>
						<div class="post">
				    		<p><span><a href="#">Tuesday,June 31th,2013</a></span></p>
				    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,Ut enim ad minim veniam sed do <span><a href="#">[...]</a></span></p>
				       </div>
				       <div class="post">
				    		<p><span><a href="#">Monday,May 21th,2013</a></span></p>
				    		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,Ut enim ad minim veniam sed do<span><a href="#">[...]</a></span></p>
				       </div>
				</div>-->
				<div class="col_1_of_4 span_1_of_4">
					<h3>Connect With Us</h3>
					<div class="social_icons">
                	<ul>
                    	<li><a href="#" class="facebook">
                        	<span class="icon"> &nbsp;</span> <span class="inner"><strong>Facebook</strong></span>
                        </a></li>
                        <li><a href="#" class="twitter">
                        	<span class="icon"> &nbsp;</span> <span class="inner"><strong>Twitter</strong></span>
                        </a></li>
                       <!--  <li><a href="#" class="rss">
                        	<span class="icon"> &nbsp;</span> <span class="inner"><strong>Rss</strong></span>
                        </a></li>-->
                    </ul>
                </div>
				</div>
				<div class="col_1_of_4 span_1_of_4 timmings">
					<h3>Business Timmings</h3>
					          <ul>
						            <li>Monday : <span>9am - 5pm</span></li>
						     		<li>Tuesday : <span>9am - 5pm</span></li>					     			
						     		<li>Wednesday : <span>9am - 5pm</span></li>
						     		<li>Thursday : <span>9am - 5pm</span></li>					     		
						     		<li>Friday : <span>9am - 5pm</span></li>
						     		<li>Satuarday: <span>9am - 5pm</span></li>
						     		<li>Sunday : <span>Closed</span></li>
						   	   </ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Location</h3>
					       <ul>
						  	  <li>NO:05,</li>
						  	  <li>Katugasthota,</li>
						  	   <li>Kandy,</li>
							   <li>Sri Lanka,</li>
						  	 <li><span>E-mail:</span>nihonautomobiles@gmail.com</li>
						  	 <li><span>Telephone :</span> 081-2218741</li>
						  	<!-- <li><span>Fax :</span> +00 000 00000</li>-->
						  </ul>
				</div>
			</div>
	    </div>
     </div>
		<!-- <div class="copy_right">
		 	 <div class="wrap">
				<p>Company Name © All Rights Reseverd | Design by  <a href="http://w3layouts.com">W3Layouts</a></p>
			 </div>
		</div>	-->
		<!------------ scroll Top ------------>
	 <script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
	<!------------ End scroll Top ------------>
  </div>   
</body>
</html>


		
	
	
     
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
		 
		 