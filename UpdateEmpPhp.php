<?php

class Employee
{
	
	private $conn;
	private $result;
	private $row;
	
	public function update($nic,$uname,$pass,$dob,$add)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="SELECT * FROM employee WHERE NIC='$nic'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		if($this->count==0)
		{
			echo"<script>alert('NIC is invalid')</script>";
		}
		else
		{
			if(!empty($uname))
			{
				$query="UPDATE employee SET username='$uname' WHERE NIC='$nic'";
				$this->result=mysqli_query($this->conn,$query);
			}
			if(!empty($pass))
			{
				$query="UPDATE employee SET password='$pass' WHERE NIC='$nic'";
				$this->result=mysqli_query($this->conn,$query);
			}
			if(!empty($dob))
			{
				$query="UPDATE employee SET DOB='$dob' WHERE NIC='$nic'";
				$this->result=mysqli_query($this->conn,$query);
			}
			if(!empty($add))
			{
				$query="UPDATE employee SET address='$add' WHERE NIC='$nic'";
				$this->result=mysqli_query($this->conn,$query);
			}
			echo"<script>alert('Employee Updated Successfully')</script>";
		}
	}
}
?>