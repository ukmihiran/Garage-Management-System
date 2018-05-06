<?php
include('billsPhp.php');
?>

<!DOCTYPE HTML>
<html>
<head>



	<style>
	a:link
	{
		color:white;
		<!--padding-left:100px;-->
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
	<title>Bills</title>
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
							<li class="active"><a href="bills.php">Bills</a></li>
							<div class="clear"></div>
						</ul>
					</div>
		 		    <div class="clear"></div>
               </div>
             </div>
         </div>	
		 
		 <div class="wrap">
			<div class="main">
				<!--div class="content">
					<div class="content" style="position:relative; top:-50px;-->
					<div class="section group">
						<div class="heading">								
							<h4 style="position:relative; left:-5px; top:100px; ">Bills</h4>
						</div>
						<!--div class="clear"></div>
						
						
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">Date : 03/02/2017</p>
						<input type='button' value='View' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:380px; top:170px;'> 
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">Plate Number : AK-3266</p>
						
						
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:70px; padding-left:60px; color:#E5B840;">Date : 04/05/2016</p>
						<input type='button' value='View' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:380px; top:320px;'> 
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">Plate Number : PB-5353</p>
						
						
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:70px; padding-left:60px; color:#E5B840;">Date : 05/03/2015</p>
						<input type='button' value='View' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:380px; top:470px;'> 
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">Plate Number : PB-5353</p>
					
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:70px; padding-left:60px; color:#E5B840;">Date : 08/12/2014</p>
						<input type='button' value='View' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:380px; top:620px;'> 
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">Plate Number : PB-5353</p>
					
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:70px; padding-left:60px; color:#E5B840;">Date : 09/06/2012</p>
						<input type='button' value='View' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:380px; top:770px;'> 
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">Plate Number : AK-3266</p>
					
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:70px; padding-left:60px; color:#E5B840;">Date : 05/03/2010</p>
						<input type='button' value='View' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:380px; top:920px;'> 
						<p style="font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:#E5B840;">Plate Number : PB-5353</p>
					
					-->
					
					
					<?php
						$b=new Bill();
						$b->viewBill();
					?>
					
					
					<div class="clear"></div>
					<div class="heading">
		
						<div class="clear"></div>
						<p style="background-color:white;  width:400px; height:620px; font-size:20px; font-family:arvo; padding-top:40px; padding-left:20px; color:black; font-weight:bold; position:absolute; top:200px; left:700px; text-align:center;">NIHON AUTOMOBILES</p>
						<p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:240px; left:770px;">133/3 Senarathgama, katugasthota</p>
						<p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:280px; left:850px;">071-5552690</p>
						<p style="font-size:18px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:20px; color:black; position:absolute; top:320px; left:860px;">INVOICE</p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:360px; left:700px;">Invoice Number : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:400px; left:700px;">Date : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:400px; left:900px;">Time : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:440px; left:700px;">Plate Number : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:480px; left:700px;">Customer Name : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:520px; left:700px;">Spare Parts</p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:520px; left:900px;">Price</p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:560px; left:710px;"></p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:600px; left:710px;"></p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:640px; left:710px;"></p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:680px; left:700px;">SUBTOTAL : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:720px; left:700px;">DISCOUNT : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:760px; left:700px;">TOTAL : </p>
						<p style="font-size:17px; font-family:arvo; padding-top:30px; padding-left:20px; color:black; position:absolute; top:800px; left:840px;font-weight:bold; ">THANK YOU</p>
						<!--input type='button' value='Print' style='width:100px; height:30px; border-radius:45px; border-style:none; font-family:avro; font-size:16px; position:absolute; left:700px; top:900px;'> 
					-->
					
					</div>
				
				
				</div>
			</div>
		</div>
	</div>
		
		<!--
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
				
				
				
				<!--
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
							
							
							
						<!--	
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
<!--
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a> -->
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
	
	