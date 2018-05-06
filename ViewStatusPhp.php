<?php
session_start();
class Status
{
	private $conn;
	private $result;
	private $row;
	private $email;
	private $x=250;
	private $sname;
	private $result1;
	private $row1;
	private $sid;
	private $qty;
	private $terminal;
	private $at;
	private $count;
	private $date;
	private $des;
	
	public function view($plate)
	{
		$this->email=$_SESSION['uname'];
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="SELECT * FROM customer WHERE plateNo='$plate' AND email='$this->email'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		if($this->count>0)
		{
			$query="SELECT date FROM job WHERE plateNo='$plate' AND status='in progress'";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			
			$this->date=$this->row[0];
			
			$query="SELECT * FROM vehicle_status WHERE date>='$this->date' AND plateNo='$plate'";
			$this->result=mysqli_query($this->conn,$query);
			
			while($this->row=mysqli_fetch_array($this->result))
			{
				$this->sid=$this->row[6];
				$this->qty=$this->row[9];
				$this->date=$this->row[1];
				$this->at=$this->row[10];
				$this->terminal=$this->row[2];
				$this->des=$this->row[3];
				
				$query="SELECT name,price FROM stock WHERE sid='$this->sid'";
				$this->result1=mysqli_query($this->conn,$query);
				$this->count=mysqli_num_rows($this->result1);
				$this->row1=mysqli_fetch_array($this->result1);
				
			
				
				$this->sname=$this->row1[0];
				$this->price=$this->row1[1];
				
				echo"<p style='position:absolute; left:80px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->sname</p>";
				echo"<p style='position:absolute; left:210px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->qty</p>";
				echo"<p style='position:absolute; left:280px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->des</p>";
				echo"<p style='position:absolute; left:660px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->price</p>";
				echo"<p style='position:absolute; left:800px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->date</p>";
				echo"<p style='position:absolute; left:1020px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->at</p>";
				
				
				$this->x=$this->x+50;
			}
		}
		else
		{
			echo"<script>alert('Entered plate number is not availble')</script>";
		}
		
		
	}
}