<?php

session_start();
class displayPoints
{
	private $conn;
	private $result;
	private $row;
	private $points=0;
	private $cid;
	private $email;
	private $result1;
	private $row1;
	private $count1;
	
	public function display()
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$this->email=$_SESSION["uname"];
		
		//echo $this->points;
		
		$query="SELECT name FROM customer WHERE email='$this->email'";
		$this->result=mysqli_query($this->conn,$query);
		$this->row=mysqli_fetch_array($this->result);
		$this->cname=$this->row[0];
		
		echo"<p style='font-size:22px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:orange; position:absolute; left:950px; top:-100px; '>Hello, $this->cname</p>";
		
		
		$query="SELECT cid FROM customer WHERE email='$this->email'";
		$this->result=mysqli_query($this->conn,$query);
		
		
		//while($this->row=mysqli_fetch_array($this->result))
		//{
			
			$this->row=mysqli_fetch_array($this->result);
			$this->cid=$this->row[0];
	
			$query="SELECT totalPoints FROM loyalty_points WHERE cid='$this->cid'";
			$this->result1=mysqli_query($this->conn,$query);
			$this->count1=mysqli_num_rows($this->result);
			if($this->count1>0)
			{
				$this->row1=mysqli_fetch_array($this->result1);
			
			
		
				$this->points=$this->row1[0];
				
			}
			else
			{
				$this->points=0;
				//break;
			}
		//}
		
		
		//echo $this->points;
		//$this->points="200";
		
		echo"<p style='font-size:45px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; color:white; position:absolute; left:980px; top:60px; '>$this->points</p>";
		
	}
}
?>
