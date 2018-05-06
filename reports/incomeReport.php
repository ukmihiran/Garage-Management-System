<?php

include("Includes/FusionCharts.php");


?>
<HTML>
   <HEAD>
      <TITLE>Daily Income Chart</TITLE>
      <SCRIPT LANGUAGE="Javascript" SRC="fusioncharts/FusionCharts.js"></SCRIPT>
   </HEAD>
   <BODY>
   <CENTER>
<?php   
   
   
   $hostdb = "localhost";  
   $userdb = "root"; 
   $passdb = "";  
   $namedb = "garage_management_system";  

   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   if ($dbhandle->connect_error) 
   {
	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }

   
   
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(isset($_POST['reportgen']))
		{
			$month=$_POST['month'];
			$year=$_POST['year'];
		
			if(empty($month)||empty($year))
			{
				
				
				echo"<script>alert('One or more fields empty')</script>";
				
				$url='http://localhost:81/Interfaces/income.php';
					
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				
				//header("Location: C:\wamp\www\Interfaces\income.php?$message");
			
			}
			
			else if(!is_numeric($month) || !is_numeric($year))
			{
				
				if(!is_numeric($month))
				{
					echo"<script>alert('Invalid month')</script>";
					
				}
				else
				{
					echo"<script>alert('Invalid year')</script>";
				}
				
				
				$url='http://localhost:81/Interfaces/income.php';
					
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}
			
			else if((!preg_match("/^[0-9]{2}$/",$month) && !preg_match("/^[0-9]{1}$/",$month) ) || !preg_match("/^[0-9]{4}$/",$year))
			{
						if(!preg_match("/^[0-9]{2}$/",$month) && !preg_match("/^[0-9]{1}$/",$month))
						{
								echo"<script>alert('Month cannot conatin more than 2 digits')</script>";
						}
						
						else
						{
							echo"<script>alert('Year should conatin only 4 digits')</script>";
						}
						
						
					$url='http://localhost:81/Interfaces/income.php';
					
					echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}
   
		  	else
			{
			
				$sdate="$year-$month-01";
				$ldate="$year-$month-31";
				
				$strXML = "<graph  yAxisName='TOTAL'    xAxisName='DAY'   baseFontSize='15'  decimalPrecision='0'    formatNumberScale='0'>";
		
				echo"<p style='font-size:25px'><b>NIHON AUTOMOBILES</p><p style='font-size:20px'>DAILY INCOME CHART</b>";
				echo "<b> OF </b>";
				
				switch ($month)
				{
					case 1:
					$m="JANUARY";
					break;
					
					case 2:
					$m="FEBRUARY";
					break;
					
					case 3:
					$m="MARCH";
					break;
					
					case 4:
					$m="APRIL";
					break;
					
					case 5:
					$m="MAY";
					break;
					
					case 6:
					$m="JUNE";
					break;
					
					case 7:
					$m="JULY";
					break;
					
					case 8:
					$m="AUGUST";
					break;
					
					case 9:
					$m="SEPTEMBER";
					break;
					
					case 10:
					$m="OCTOBER";
					break;
					
					case 11:
					$m="NOVEMBER";
					break;
					
					case 12:
					$m="DECEMBER";
					break;
				
				}
				
				echo "<b style='color:red'>\n$year $m</b></p>";
			  
				$strQuery ="SELECT date, SUM(total) FROM payment WHERE date BETWEEN '$sdate' AND '$ldate' GROUP BY date";
				$result=mysqli_query($dbhandle, $strQuery) or die(mysql_error());

			  

				if ($result)
				{
					while($ors = mysqli_fetch_array($result))
					{
						list($yy,$mm,$dd)=explode('-', $ors['date']);
						$strXML .= "<set name='" . $dd . "' value='" . $ors[1] . "' />";
					}
			   }
			   $dbhandle->close();

			   
			   $strXML .= "</graph>";

			
			   
			   echo renderChart("FusionCharts/FCF_Line.swf", "", $strXML, "", 850, 450);
			    
			   
			 
			}
			
			
		}
	}
?>
</CENTER>
</BODY>
</HTML>





</BODY>
</HTML>