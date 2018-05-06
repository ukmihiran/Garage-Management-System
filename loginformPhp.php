<?php

class login
{
	private $username;
	private $password;
	private $result;
	private $row;
	private $conn;
	private $count;
	private $typ;
	
	public function check()
	{
		$this->username=$_SESSION["uname"];
		$this->password=$_SESSION["pword"];
		
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="SELECT * FROM customer WHERE email='$this->username' AND password='$this->password'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		if($this->count==0)
		{
			$this->username=$_SESSION["uname"];
			$this->password=$_SESSION["pword"];
		
			
			$query="SELECT * FROM employee WHERE username='$this->username' AND password='$this->password'";
			$this->result=mysqli_query($this->conn,$query);
			$this->count=mysqli_num_rows($this->result);
			
			if($this->count==0)
			{
				echo"<script>alert('Invalid Email or Password')</script>";
			}
			
			else
			{
				$query="SELECT type FROM employee WHERE username='$this->username'";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->typ=$this->row[0];
				
				if($this->typ=='Manager')
				{
					echo"<meta http-equiv='refresh' content='0;URL=ManagerHome.php' />";
				}
				else if($this->typ=='Supervisor')
				{
					echo"<meta http-equiv='refresh' content='0;URL=SupHome.php' />";
				}
				else if($this->typ=='Security')
				{
					echo"<meta http-equiv='refresh' content='0;URL=GatePass.php' />";
				}
				else
				{
					echo"<meta http-equiv='refresh' content='0;URL=EmpHome.php' />";
				}
			}
			
		}
		else
		{
			echo"<meta http-equiv='refresh' content='0;URL=CusHome.php' />";
		}
	}
}
?>