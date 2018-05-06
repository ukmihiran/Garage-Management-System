<?php
session_start();
class updatecus
{
	private $conn;
	private $result;
	private $row;
	private	$cid;
	private	$name;
	private	$add;
	private	$phn;
	private	$pass;
	
	public function Update($add,$phn,$email)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$this->email=$_SESSION["uname"];
		
		if($add!=NULL)
		{
			$query="UPDATE customer SET address='$add' WHERE email='$this->email'";
			$this->result=mysqli_query($this->conn,$query);
			echo"<script>alert('Address was updated successfuly')</script>";
		}
		
		if($phn!=NULL)
		{
			$query="UPDATE customer SET moblie='$phn' WHERE email='$this->email'";
			$this->result=mysqli_query($this->conn,$query);
			echo"<script>alert('Phone number was updated successfuly')</script>";
		}
		if($email!=NULL)
		{
			$query="UPDATE customer SET email='$email' WHERE email='$this->email'";
			$this->result=mysqli_query($this->conn,$query);
			echo"<script>alert('Email was updated successfuly')</script>";
		}
		
		
		
		
	}
	
	
	public function AddPlate($plate)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$this->email=$_SESSION["uname"];
		
		echo $this->email;
		$query="SELECT * FROM customer WHERE email='$this->email'";
		$this->result=mysqli_query($this->conn,$query);
		$this->row=mysqli_fetch_array($this->result);
		
		$this->cid=$this->row[0];
		$this->name=$this->row[3];
		$this->add=$this->row[2];
		$this->phn=$this->row[4];
		$this->pass=$this->row[6];
		
		$query="INSERT INTO customer(cid,plateNo,address,name,moblie,email,password) VALUES('$this->cid','$plate','$this->add','$this->name','$this->phn','$this->email','$this->pass')";
		$this->result=mysqli_query($this->conn,$query);
		
		echo"<script>alert('Vehicle Added Successfuly')</script>";
		
	}
	
}
?>