<?php


require('fpdf.php');


$con=mysqli_connect("localhost","root","","garage_management_system");



if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(isset($_POST['print']))
	{
		
		$query="SELECT * FROM payment ORDER BY payId DESC LIMIT 1";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_array($result);
		
		$payid=$row[9];
		$date=$row[1];
		$subt=$row[2];
		$dis=$row[3];
		$tot=$row[4];
		$cid=$row[5];
		$pno=$row[6];
		$time=$row[8];
		
		$query="SELECT name FROM customer WHERE cid='$cid'";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_array($result);
		
		$cname=$row[0];
			
			
		$pdf=new FPDF();
			
	
		$pdf->SetAutoPageBreak(false);

		$pdf->AddPage('P',array(150,100),0);

			
		//$pdf->Image('logo2.png',75,10,-200);
		$pdf->SetTitle('Bill',false);

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Text(32, 10, 'Nihon Automobiles');

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(20, 15, '133/3 Senarathgama, katugasthota');

		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', 'B', 9);
		$pdf->Text(38, 20, '071-5552690');
		
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Text(40, 25, 'INVOICE');
		
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(5, 35, 'Invoice Number :');
		
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(30, 35, $payid);
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(5, 45, 'Date :');
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(15, 45, $date);
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(65, 45, 'Time :');
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(75, 45, $time);
		
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(5, 55, 'Plate Number :');
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(28, 55, $pno);
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(5, 65, 'Customer Name :');
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(30, 65, $cname);
		
		$pdf->SetTextColor(0,0,0);
		$pdf->SetFont('Arial', '', 9);
		$pdf->Text(5, 75, 'Spare Parts                                 Price');
		
		
		
		$space=80;
		
		
		$query="SELECT * FROM payment WHERE plateNo='$pno' AND date<'$date' ORDER BY date ASC";
		$result=mysqli_query($con,$query);
		$count=mysqli_num_rows($result);
				
				
		if($count>0)
		{
			$row=mysqli_fetch_array($result);
			$pdate=$row[1];
					
			$query="SELECT * FROM vehicle_status WHERE date<='$date' AND date>$pdate AND plateNo='$pno'";
			$result1=mysqli_query($con,$query);
			$count=mysqli_num_rows($result1);
					
					
			if($count>0)
			{
				while($row1=mysqli_fetch_array($result1))
				{
					$sid=$row1[6];
									
					$query="SELECT * FROM stock WHERE sid='$sid'";
					$result=mysqli_query($con,$query);
					$row=mysqli_fetch_array($result);
									
					$iname=$row[2];
					$price=$row[8];
					$qty=$row1[9];
									
									
					//echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>-$this->iname      &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    $this->price x $this->qty</div>";
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(5, $space, '-');

						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(7, $space, $iname);
						
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(51, $space, $price);
						
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(65, $space, 'X');
						
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(70, $space, $qty);
						
						$space=$space+5;
					}
				}
				else
				{
					//echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold; z-index:99999;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
					
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Arial', '', 9);
					$pdf->Text(12, $space, '-');
					
					//$space=$space+5;	
					
					$pdf->SetTextColor(0,0,0);
					$pdf->SetFont('Arial', '', 9);
					$pdf->Text(55, $space, '-');
					
					//echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold; z-index:99999;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
				}
					
					
					
			}
				
			else
			{
				$query="SELECT * FROM vehicle_status WHERE date<='$date' AND plateNo='$pno'";
				$result1=mysqli_query($con,$query);
				$count=mysqli_num_rows($result1);
					
					
					
					
				//echo "&nbsp";
				if($count>0)
				{
								
									
					while($row1=mysqli_fetch_array($result1))
					{
						$sid=$row1[6];
									
						$query="SELECT * FROM stock WHERE sid='$sid'";
						$result=mysqli_query($con,$query);
						$row=mysqli_fetch_array($result);
									
						$iname=$row[2];
						$price=$row[8];
						$qty=$row1[9];
									
									
						//echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>-$this->iname      &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    $this->price x $this->qty</div>";
							
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(5, $space, '-');

						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(7, $space, $iname);
						
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(51, $space, $price);
						
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(65, $space, 'X');
						
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFont('Arial', '', 9);
						$pdf->Text(70, $space, $qty);
						
						$space=$space+5;
					}
				}
		
	
			}
			
			$space=$space+5;
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(5, $space, 'SUBTOTAL :');
				
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(25, $space, $subt);
			
			$space=$space+10;
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(5, $space, 'DISCOUNT :');
				
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(25, $space, $dis);

			$space=$space+10;
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(5, $space, 'TOTAL :');
				
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial', '', 9);
			$pdf->Text(20, $space, $tot);
		
			$space=$space+10;
			
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial', 'B', 9);
			$pdf->Text(35, $space, 'THANK YOU');
			
			mysqli_close($con);

			
			$pdf->Output();
		}

}

?>