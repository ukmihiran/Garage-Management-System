<?php
class AssignJob
{
	private $conn;
	private $result;
	private $row;
	private $date;
	
	public function assign($plate,$et,$model,$type,$eid,$aid,$des)
	{
		
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		
		
		$query="SELECT * FROM appointment WHERE plateNo='$plate' AND APPID='$aid'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		
		
		
		if($this->count==1)
		{
			
			$query="SELECT * FROM employee WHERE  EMPID='$eid'";
			$this->result=mysqli_query($this->conn,$query);
			$this->count=mysqli_num_rows($this->result);
		
			
			if($this->count==1)
			{
				$this->date=date("Y-m-d");
				
				//echo $this->date;
				//echo $plate;
				//echo $et;
				//echo $model;
				//echo $type;
				//echo $eid;
				//echo $aid;
				//echo $des;
				
				$query="INSERT INTO  job(description,timeEstimated,aid,eid,vehicle_model,vehicle_type,plateNo,date) VALUES ('$des','$et','$aid','$eid','$model','$type','$plate','$this->date')";
				//$query="INSERT INTO job (eid,aid,plateNo,date) VALUES ('LL5896','1','1','$this->date')";
				//$this->result=mysqli_query($this->conn,$query);
				$this->result=mysqli_query($this->conn,$query);
				
				
				
				$query="SELECT jobId FROM job ORDER BY jobId DESC LIMIT 1";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				$this->jid=$this->row[0];
				
				$this->val='J00'.$this->jid;
				
				$query="UPDATE job SET JID='$this->val' WHERE jobId='$this->jid'";
				$this->result=mysqli_query($this->conn,$query);
				
				
				
				echo"<script>alert('Job was assigned successfuly')</script>";
				
				
				
				include('int-send_sms.php');
			
			//$con=mysqli_connect("localhost","root","","garage_management_system");
			/*$query="SELECT jobId  FROM job ORDER BY jobId DESC LIMIT 1";
			$this->result=mysqli_query($this->con,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->jid=$this->row[0];
				
			$this->val='J00'.($this->jid+1);*/
			
			
			
			$query="SELECT mobile FROM employee WHERE EMPID='$eid'";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->phn=$this->row[0];
			
			
			$_SESSION["jid"]=$this->val;
			$_SESSION["pno"]=$_POST['plate'];
			$_SESSION["phn"]=$this->phn;
				//session_start();
			//include('int-send_sms.php');	
				/*echo $_SESSION["jid"];
				echo $_SESSION["pno"];
				echo $_SESSION["phn"];*/
				
				
				
			}
			else
			{
				echo"<script>alert('Invalid Employee ID')</script>";
			}
		}
		else
		{
			echo"<script>alert('Invalid Appointment ID')</script>";
		}
		
	}
}
?>