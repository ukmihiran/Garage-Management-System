<?php
class Status
{
	private $conn;
	private $result;
	private $row;
	private $count;
	private $date;
	private $time;
	private $cid;
	private $newqty;
	
	public function add($plate,$terminal,$sid,$qty,$ttc,$des,$mileage)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="SELECT * FROM customer WHERE plateNo='$plate'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		echo $this->count;
		if($this->count>0)
		{
			$this->row=mysqli_fetch_array($this->result);
			$this->cid=$this->row[0];
			$this->date=date("Y-m-d");
			date_default_timezone_set("Asia/Colombo");
			$this->time=date('h:i:s');
				
			$query="INSERT INTO vehicle_status(date,terminal,decription,cid,plateNo,sid,vehicle_mileage,addedTime,qty,timeToComplete) VALUES ('$this->date','$terminal','$des','$this->cid','$plate','$sid','$mileage','$this->time','$qty','$ttc')";
			$this->result=mysqli_query($this->conn,$query);
			
			
			$query="SELECT statusId FROM vehicle_status ORDER BY statusId DESC LIMIT 1";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->vid=$this->row[0];
			
			$this->val='V00'.$this->vid;
			
			$query="UPDATE vehicle_status SET VID='$this->val' WHERE statusId='$this->vid'";
			$this->result=mysqli_query($this->conn,$query);
			
			
			$query="UPDATE stock SET qty=qty-$qty WHERE sid='$sid'";
			$this->result=mysqli_query($this->conn,$query);
			
			echo"<script>alert('Vehicle Status Added Successfully')</script>";
			
			
			
			
			//include('StatusSMS.php');
			//include('123.php');
			
			
			/*$_SESSION["pno"]=$plate;
			$_SESSION["des"]=$des;
			$_SESSION["ttc"]=$ttc;
			
			//$conn=mysqli_connect("localhost","root","","garage_management_system");
			$query="SELECT moblie FROM customer WHERE plateNo='$plate'";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->phn=$this->row[0];
			
			$_SESSION["phn"]=$this->phn;
			
			echo $_SESSION["des"];
			echo $_SESSION["ttc"];*/
			
			
			
		}
		else
		{
			echo"<script>alert('Invalid plate number')</script>";
		}
	}
}


?>