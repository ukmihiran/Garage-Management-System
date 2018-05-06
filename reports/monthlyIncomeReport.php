<?php

include("Includes/FusionCharts.php");


?>
<HTML>
   <HEAD>
      <TITLE>Monthly Income Chart</TITLE>
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
		if(isset($_POST['miChart']))
		{
			//$month=$_POST['month'];
			$year=$_POST['year'];
		
			if(empty($year))
			{
				
				
				echo"<script>alert('One or more fields empty')</script>";
				
				$url='http://localhost:81/Interfaces/monthlyincome.php';
					
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
				
				//header("Location: C:\wamp\www\Interfaces\income.php?$message");
			
			}
			
			else if(!is_numeric($year))
			{
				
				
				echo"<script>alert('Invalid year')</script>";
				
				
				
				$url='http://localhost:81/Interfaces/monthlyincome.php';
					
				echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}
			
			else if( !preg_match("/^[0-9]{4}$/",$year))
			{
						
					echo"<script>alert('Year should conatin only 4 digits')</script>";
						
						
						
					$url='http://localhost:81/Interfaces/monthlyincome.php';
					
					echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
			}
   
		  	else
			{
			
				$sdate="$year-01-01";
				$ldate="$year-02-31";
				
				$strXML = "<graph  yAxisName='TOTAL'    xAxisName='MONTH'   baseFontSize='15'  decimalPrecision='0'    formatNumberScale='0'>";
		
				echo"<p style='font-size:25px'><b>NIHON AUTOMOBILES</p><p style='font-size:20px'>MONTHLY INCOME CHART</b>";
				echo "<b> OF </b>";
				
				echo "<b style='color:red'>$year</b></p>";
			  
				//list($yy,$mm,$dd)=explode('-',$sdate);
				
				$val=1;
				while($val<=12)
				{	
			
					
					$strQuery ="SELECT date, SUM(total) FROM payment WHERE date BETWEEN '$sdate' AND '$ldate'";
					$result=mysqli_query($dbhandle, $strQuery) or die(mysql_error());

				  
				switch ($val)
				{
					case 1:
					$m="JAN";
					break;
					
					case 2:
					$m="FEB";
					break;
					
					case 3:
					$m="MAR";
					break;
					
					case 4:
					$m="APR";
					break;
					
					case 5:
					$m="MAY";
					break;
					
					case 6:
					$m="JUN";
					break;
					
					case 7:
					$m="JUL";
					break;
					
					case 8:
					$m="AUG";
					break;
					
					case 9:
					$m="SEP";
					break;
					
					case 10:
					$m="OCT";
					break;
					
					case 11:
					$m="NOV";
					break;
					
					case 12:
					$m="DEC";
					break;
				
				}
				  

					if ($result)
					{
						while($ors = mysqli_fetch_array($result))
						{
							//list($yy,$mm,$dd)=explode('-', $ors['date']);
							$strXML .= "<set name='" . $m . "' value='" . $ors[1] . "' />";
						}
					}
					
					$val++;
					$sdate="$year-$val-01";
					$ldate="$year-$val-31";
					//list($yy,$mm,$dd)=explode('-',$sdate);
				   
				}
			   $dbhandle->close();

			   
			   $strXML .= "</graph>";

			
			   
			   echo renderChart("FusionCharts/FCF_Column2D.swf", "", $strXML, "", 850, 450);
			    
			   
			 
			}
			
			
		}
	}
?>
</CENTER>
</BODY>
</HTML>





</BODY>
</HTML>