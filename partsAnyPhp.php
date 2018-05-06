<?php

//session_start();
class Analyzation
{
	private $conn;
	private $result;
	private $row;
	private $email;
	private $count;
	private $dmileage;
	private $sid;
	private $date;
	private $pm;
	private $x=300;
	private $result1;
	private $row1;
	private $partm;
	private $pname;
	private $mileagecon;
	
	
	public function parts($plate,$cm)
	{
		
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$this->email=$_SESSION["uname"];
		
		$query="SELECT * FROM customer WHERE email='$this->email' and plateNo='$plate'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);

		if($this->count==0)
		{
			echo"<script>alert('Invalid plate number')</script>";
		}
		else
		{
			if(!is_numeric($cm))
			{
				echo"<script>alert('Invalid mileage')</script>";
			}
			else
			{
				
				$query="SELECT 	vehicle_mileage FROM vehicle_status WHERE plateNo='$plate' ORDER BY date,vehicle_mileage DESC LIMIT 1";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->dmileage=$this->row[0];
				
				if($this->dmileage>$cm)
				{
					echo"<script>alert('Invalid mileage.. Your mileage when the last part added was $this->dmileage')</script>";
				}
				
				else
				{
					$query="SELECT 	* FROM vehicle_status WHERE plateNo='$plate'";
					$this->result=mysqli_query($this->conn,$query);
					
					while($this->row=mysqli_fetch_array($this->result))
					{
						$this->date=$this->row[1];
						$this->pm=$this->row[7];
						$this->sid=$this->row[6];
						
						
						
						$query="SELECT * FROM stock WHERE sid='$this->sid'";
						$this->result1=mysqli_query($this->conn,$query);
						$this->row1=mysqli_fetch_array($this->result1);
						
						$this->partm=$this->row1[7];
						$this->pname=$this->row1[2];
						
						echo"<p style='position:absolute; left:70px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->pname</p>";
						echo"<p style='position:absolute; left:300px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->date</p>";
						echo"<p style='position:absolute; left:505px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->pm</p>";
						echo"<p style='position:absolute; left:720px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->partm</p>";
						
						$this->mileagecon=$this->partm-$cm-$this->pm;
						
						if($this->mileagecon<=10)
						{
							echo"<p style='position:absolute; left:920px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:red; font-weight:bold; ' >BAD</p>";
						
						}
						
						else if(10 < $this->mileagecon && $this->mileagecon <=100)
						{
							echo"<p style='position:absolute; left:920px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:orange; font-weight:bold;' >AVERAGE</p>";
						
						}
						else
						{
							echo"<p style='position:absolute; left:920px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:green; font-weight:bold; ' >GOOD</p>";
						
						}
						
						
						$this->x=$this->x+50;
					}
				}
				
				
			}
	
		}
		
	}
}

?>