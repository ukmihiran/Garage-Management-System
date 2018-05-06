<?php
class Salary
{
	private $conn;
	private $result;
	private $x=680;
	private $amt;
	
	public function add($Employee_ID,$amount,$OT,$Bonus)
	{
		
		//echo"<script>alert('Custssfuly')</script>";
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
	
	
		$query="SELECT * FROM employee WHERE  EMPID='$Employee_ID'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		if($this->count==1)
		{
	
			$this->date=date("Y-m-d");
			
			$ETF=$amount*(0.5/100);
			$EPF=($amount-$ETF)*(0.5/100);
			
			$query="INSERT INTO salary(amount,bonus,eid,ETF,EPF,OT,date) VALUES ('$amount','$Bonus','$Employee_ID','$ETF','$EPF','$OT','$this->date')";
			$this->result=mysqli_query($this->conn,$query);
			
			
			
			
			
			$query="SELECT salId FROM salary ORDER BY salId DESC LIMIT 1";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->salid=$this->row[0];
			
			$this->val='SA00'.$this->salid;
			
			$query="UPDATE salary SET SALARYID='$this->val' WHERE salId='$this->salid'";
			$this->result=mysqli_query($this->conn,$query);
			
			
			
			
			
			
			
			
			
			echo"<script>alert('Salary table updated successfully')</script>";
			
			$query="SELECT * FROM salary WHERE date='$this->date'";
			$this->result=mysqli_query($this->conn,$query);
			
			
			
			
			
			
			
			while($this->row=mysqli_fetch_array($this->result))
			{
				$this->eid=$this->row[3];
				
				$query="SELECT * FROM employee WHERE EMPID='$this->eid'";
				$this->result1=mysqli_query($this->conn,$query);
				$this->row1=mysqli_fetch_array($this->result1);
				
				$this->ename=$this->row1[9];
				//$this->add=$this->row1[6];
				
				$query="SELECT 	* FROM salary WHERE eid='$this->eid' AND date='$this->date'";
				$this->result1=mysqli_query($this->conn,$query);
				$this->row1=mysqli_fetch_array($this->result1);
				
				$this->salid=$this->row1[7];
				$this->amt=$this->row1[1];
				$this->EF=$this->row1[4];
				$this->EP=$this->row1[5];
				
				$this->tot=$this->amt-$this->EF-$this->EP-$Bonus + $OT*100;
				
				echo"<p style='position:absolute; left:150px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->salid</p>";
				echo"<p style='position:absolute; left:300px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->ename</p>";
				//echo"<p style='position:absolute; left:550px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->add</p>";
				echo"<p style='position:absolute; left:550px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->amt</p>";
				echo"<p style='position:absolute; left:770px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->EF</p>";
				echo"<p style='position:absolute; left:930px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->EP</p>";
				echo"<p style='position:absolute; left:1070px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->tot</p>";
						
					//echo"<p style='position:absolute; left:1020px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->at</p>";
						
						
				$this->x=$this->x+50;
			}
			
		}
		else
		{
			echo"<script>alert('Invalid Employee ID')</script>";
		}
	}
}


?>