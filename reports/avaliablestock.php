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

   
   else
   {		
				$strXML = "<graph  yAxisName='QUANTITY'    xAxisName='ITEM NAME'   baseFontSize='15'  decimalPrecision='0'    formatNumberScale='0'>";
		
				echo"<p style='font-size:25px'><b>NIHON AUTOMOBILES</p><p style='font-size:20px; color:red;'>STOCK AVAILABILITY CHART</b>";
				
				
				
			  
				$strQuery ="SELECT * FROM stock";
				$result=mysqli_query($dbhandle, $strQuery) or die(mysql_error());

			  

				if ($result)
				{
					while($stk = mysqli_fetch_array($result))
					{
						
						$strXML .= "<set name='" . $stk[2] . "' value='" . $stk[1] . "' />";
					}
			   }
			   $dbhandle->close();

			   
			   $strXML .= "</graph>";

			
			   
			   echo renderChart("FusionCharts/FCF_Column3D.swf", "", $strXML, "", 1250, 450);
			    
			   
			 
	}
			
			
		
	
?>
</CENTER>
</BODY>
</HTML>





</BODY>
</HTML>