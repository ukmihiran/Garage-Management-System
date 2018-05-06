<?php
class Signup
{
	private $conn;
	private $result;
	
	public function create($email,$password,$repassword,$name,$address,$plate,$phn)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		//echo"dasdadasda";
		
		if($password!=$repassword)
		{
			echo"<script>alert('Passwords does not match')</script>";
		}
		else 
		{
			$query="INSERT INTO customer(plateNo,address,name,moblie,email,password) VALUES ('$plate','$address','$name','$phn','$email','$password')";
			$this->result=mysqli_query($this->conn,$query);
			
			
			$query="SELECT cid FROM customer ORDER BY cid DESC LIMIT 1";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->cid=$this->row[0];
			
			$this->val='C00'.$this->cid;
			
			$query="UPDATE customer SET CUSID='$this->val' WHERE cid='$this->cid'";
			$this->result=mysqli_query($this->conn,$query);
			
			
			$query="SELECT * FROM customer WHERE plateNo='$plate'";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->cid=$this->row[0];
			
			$query="INSERT INTO loyalty_points (totalPoints,cid) VALUES ('0','$this->cid')";
			$this->result=mysqli_query($this->conn,$query);
			
			$query="SELECT loyaltyId FROM loyalty_points ORDER BY loyaltyId DESC LIMIT 1";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->lid=$this->row[0];
			
			$this->val='L00'.$this->lid;
			
			$query="UPDATE loyalty_points SET LID='$this->val' WHERE loyaltyId='$this->lid'";
			$this->result=mysqli_query($this->conn,$query);
			
			
			echo"<script>alert('Signup was successful... Please login to continue')</script>";
			echo"<meta http-equiv='refresh' content='0;URL=loginform.php' />";
		}
	}
}

?>