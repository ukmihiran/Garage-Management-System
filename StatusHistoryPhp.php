<?php
session_start();
class History
{
	
	private $conn;
	private $result;
	private $row;
	private $email;
	private $count;
	private $x=220;
	
	public function status_h($plate)
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
			$query="SELECT * FROM vehicle_status WHERE plateNo='$plate'";
			$this->result=mysqli_query($this->conn,$query);
			
			
			while($this->row=mysqli_fetch_array($this->result))
			{
				$this->date=$this->row[1];
				$this->des=$this->row[3];
				$this->mileage=$this->row[7];
				$this->terminal=$this->row[2];
				
				echo"<p style='position:absolute; left:70px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->date</p>";
				echo"<p style='position:absolute; left:310px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->des</p>";
				echo"<p style='position:absolute; left:710px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->mileage</p>";
				echo"<p style='position:absolute; left:935px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->terminal</p>";
				//echo"<p style='position:absolute; left:960px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->terminal</p>";
				
				$this->x=$this->x+50;
				
			}
		}
		
		
	}
}

?>