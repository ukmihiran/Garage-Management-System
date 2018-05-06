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
	<title>View Status</title>
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
							<li ><a href="CusHome.php">Home</a></li>
							<li class="active"><a href="View Status.php">View Status</a></li>
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
						<h4 style="position:relative; left:-50px;">Status</h4>
						
						<!--p style="font-size:25px; font-family:Rockwell Extra Bold; font-weight:bold; padding-top:30px; padding-left:60px; color:white; position:absolute; left:800px; top:20px; ">LOYALTY POINTS</p>
						<p style="font-size:45px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:white; position:absolute; left:870px; top:60px; ">200</p>
						-->
					</div>
					<div class="clear"></div>

					<form method="post" action=" " style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  padding-top:30px;">Plate Number : <input style="position:absolute; top:150px; left:220px;" type="text" name="pno"><input type='submit' name="vstatus" value='Submit' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:400px; top:150px;'></p></td>
						</tr>
				
						
						<tr>
							<td><p style="color:#E5B840; position:absolute; left:70px; top:210px;">Part Name  </p></td>
							<!--p style="padding-top:30px;">  1)</p>
							<p style="padding-top:30px;"> 2)</p>
							<p style="padding-top:30px;"> 3)</p-->
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;   position:absolute; left:200px; top:210px;">Qty  </p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;   position:absolute; left:280px; top:210px;">Discription </p></td>
						</tr>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:630px; top:210px;">Price of 1 Qty </p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:820px; top:210px;">Date  </p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<!--tr>
							<td><p style="color:#E5B840;  position:absolute; left:660px; top:210px;">Added Time  </p></td>
						</tr>
						<div class="clear"></div>
						<div class="clear"></div>
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:820px; top:210px;">Terminal  </p></td>
						</tr>
						<div class="clear"></div-->
						<tr>
							<td><p style="color:#E5B840;  position:absolute; left:950px; top:210px;">Time To Complete </p></td>
						</tr>
						<div class="clear"></div>
						<tr style="padding-top:30px;">
						
						<?php
							include('ViewStatusPhp.php');
							if(($_SERVER['REQUEST_METHOD'])=='POST')
							{
								if(isset($_POST['vstatus']))
								{
									$plate=$_POST['pno'];
									
									if(empty($plate))
									{
										echo"<script>alert('Please enter the plate number')</script>";
									}
									else if(!preg_match("/^[a-zA-Z]{3}[0-9]{4}$/",$plate) && !preg_match("/^[a-zA-Z]{2}[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{2}-[0-9]{4}$/",$plate) && !preg_match("/^[0-9]{3}-[0-9]{4}$/",$plate) )//plate validation here.................. 
									{
										//echo "lkldadasdadasaks";
										echo"<script>alert('Invalid Plate Number')</script>";
									}
									
									else
									{
										$vs=new Status();
										$vs->view($plate);
									}
								
								}

							}

						?>
						</tr>

						
						
						
						
						<tr>
							<td><p style="color:#E5B840;  padding-top:800px;"> </p></td>
						</tr>
						<div class="clear"></div>
					</form>
						
				</div>
			</div>
		</div>
		
		
		 <p>&nbsp</p>
   
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

		
	
	
     