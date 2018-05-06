<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="Garage/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="Garage/css/slider.css" type="text/css" media="screen" />
<script type="text/javascript" src="Garage/js/jquery-1.9.0.min.js"></script>
<script type="text/javascript" src="Garage/js/jquery.nivo.slider.js"></script>
<!----- Scroll top --------->
<script type="text/javascript" src="Garage/js/move-top.js"></script>
<script type="text/javascript" src="Garage/js/easing.js"></script>
<!-----End  Scroll top --------->
 <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<title>Login</title>
</head>

<div>
	<p style="list-style-type:none; margin:5px; padding:25px;" ></style>
	
	<a href='sigupform.php'><input type='button' name='signupbutton' value='Sign Up' style='position:absolute; top:5%; left:87%; background-color:ash; color:black; width:100px; height:30px; border-radius:45px; border-style:none;'></a>;
			
</div>

</div>
	 <div class="wrap">
        <div class="header">  	
		 <div class="header_image">
		   <img src="Garage/images/images_1/11.jpg" alt="" />
		   				<div class="header_desc">
				 			 <div class="logo">
				 				<a href="index.html"><img src="Garage/images/logo2.png" alt="" /></a>
							 </div>							
		     		    </div>			
		 		</div>				
              <div class="header-bottom">
		          <div class="menu">
					    <ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="Garage/about.html">About</a></li>
							<!--li><a href="Garage/services.html">Services</a></li-->
							<!--<li><a href="blog.html">Blog</a></li>-->
							<li><a href="Garage/contact.html">Contact</a></li>
							<div class="clear"></div>
						</ul>
					</div>
		        <div class="social-icons">						
		                <ul>
		                    <li><a class="facebook" href="#" target="_blank"> </a></li>
		                    <li><a class="twitter" href="#" target="_blank"></a></li>
		                    <li><a class="googleplus" href="#" target="_blank"></a></li>
		                    
		                    <div class="clear"></div>
		                </ul>
		 		    </div>
		 		    <div class="clear"></div>
               </div>
             </div>
         </div>
		 

<div>		 
<p style="font-size:2em; color:#E5B840; padding:1px 20px; font-family: 'bebas_neueregular'; position:absolute; top:80%; left:34%">LOGIN</style></p>
</div>		 
<div style="font-size:2em; color:#E5B840; padding:200px 20px; font-family: 'bebas_neueregular'; ">

<form method="post" action=" ">
	<table>
		<tr>
		<td style=" position:absolute; top:90%; left:35%;"><input type="text" name="email"  id="email12" placeholder="Email" size="50%"; style="height:30px; border-radius:45px;  border-style:none; font-size:15px; "></td>
		</tr>
		
		<tr>
		<td style=" position:absolute; top:100%; left:35%;"><input type="password" name="password" id="password12" placeholder="Password" size="50%" style="height:30px; border-radius:45px;  border-style:none; font-size:15px; "></td>
		</tr>
		
		<tr>
		<td style=" position:absolute; top:110%; left:35%; "><input type="submit" name="formlogin" value="Login"  onclick="check(document.getElementById('email12').value,document.getElementById('password12').value)"  style="background-color:grey; color:black; width:100px; height:30px; border-radius:45px; border-style:none;"></td>
		</tr>
	</table>	
</form>


</style>
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



<?php

include('loginformPhp.php');
//include('partsAny.php');

if(($_SERVER['REQUEST_METHOD'])=='POST')
{
//	echo"adasd";
	if(isset($_POST['formlogin']))
	{
		
		
		$_SESSION["uname"]=$_POST['email'];
		$_SESSION["pword"]=md5($_POST['password']);
		
		//echo $_SESSION["pword"];
		
		if(empty($_SESSION["uname"])||empty($_SESSION["uname"]))
		{
			echo"<script>alert('One or both fields are empty')</script>";
		}
		else
		{
			$log=new login();
			$log->check();
		}
		//echo $_SESSION["uname"];
		/*$log=new login();
		$log->check();*/
		
	}
}

?>