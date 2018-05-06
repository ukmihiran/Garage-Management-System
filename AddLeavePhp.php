<?php
session_start();
class leave
{
	private $conn;
	private $result;
	private $row;
	private $eid;
	private $uname;
	private $pass;
	
	
	public function add($des,$sdate,$edate)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$uname=$_SESSION["uname"];
		$pass=$_SESSION["pword"];
		
		if($edate<$sdate)
		{
			echo"<script>alert('Invalid dates')</script>";
		}
		
		else
		{
			$query="SELECT eid FROM employee WHERE username='$uname'";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->eid=$this->row[0];
			
			
			$query="INSERT INTO `leave` (description,sdate,edate,eid) VALUES ('$des','$sdate','$edate','$this->eid')";
			$this->result=mysqli_query($this->conn,$query);
			
			//echo $this->eid;
			//echo $uname;
			
			
			
			$query="SELECT lid FROM `leave` ORDER BY lid DESC LIMIT 1";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->lid=$this->row[0];
		
			$this->val='LE00'.$this->lid;
		
			$query="UPDATE `leave` SET LEAVEID='$this->val' WHERE lid='$this->lid'";
			$this->result=mysqli_query($this->conn,$query);
			
			echo"<script>alert('Leave was added successfuly')</script>";
			
		}
	
		
	}
}