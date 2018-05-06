<?php
class Job
{
	private $conn;
	private $result;
	private $row;
	private $result1;
	private $row1;
	private $result2;
	private $row2;
	private $result3;
	private $row3;
	private $plate;
	private $model;
	private $aid;
	private $des;
	private $etime;
	private $eid;
	private $ename;
	private $cid;
	private $cname;
	private $x=370;
	
	public function view()
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="SELECT * FROM job";
		$this->result=mysqli_query($this->conn,$query);
		
		while($this->row=mysqli_fetch_array($this->result))
		{
			$this->plate=$this->row[11];
			$this->model=$this->row[7];
			$this->aid=$this->row[5];
			$this->des=$this->row[1];
			$this->etime=$this->row[2];
			$this->eid=$this->row[6];
			
			
		/*	$query="SELECT name FROM employee WHERE EMPID='$this->eid'";
			$this->result1=mysqli_query($this->conn,$query);
			$this->row1=mysqli_fetch_array($this->result1);
			
			$this->ename=$this->row1[0];*/
			
			$query="SELECT cid FROM appointment WHERE APPID='$this->aid'";
			$this->result2=mysqli_query($this->conn,$query);
			$this->row2=mysqli_fetch_array($this->result2);
			
			$this->cid=$this->row2[0];
			
			$query="SELECT name FROM customer WHERE cid='$this->cid'";
			$this->result3=mysqli_query($this->conn,$query);
			$this->row3=mysqli_fetch_array($this->result3);
			
			$this->cname=$this->row3[0];
			
			
			echo"<p style='position:absolute; left:250px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo;  font-weight:bold; color:black;' >$this->plate</p>";
			echo"<p style='position:absolute; left:430px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo;  font-weight:bold; color:black;' >$this->model</p>";
			echo"<p style='position:absolute; left:600px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo;  font-weight:bold; color:black;' >$this->cname</p>";
			echo"<p style='position:absolute; left:700px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo;  font-weight:bold; color:black;' >$this->des</p>";
			echo"<p style='position:absolute; left:900px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo;  font-weight:bold; color:black;' >$this->etime</p>";
			echo"<p style='position:absolute; left:1050px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo;  font-weight:bold; color:black;' >$this->eid</p>";
			
			$this->x=$this->x+50;
			
			
			
			
			
			
			
			/*include('int-send_sms.php');
			
			//$con=mysqli_connect("localhost","root","","garage_management_system");
			$query="SELECT jobId  FROM job ORDER BY jobId DESC LIMIT 1";
			$this->result=mysqli_query($this->con,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->jid=$this->row[0];
				
			$this->val='J00'.($this->jid+1);
			
			$query="SELECT mobile FROM employee WHERE EMPID='$this->eid'";
			$this->result=mysqli_query($this->con,$query);
			$this->row=mysqli_fetch_array($this->result);
			$this->phn=$this->row[0];
			
			
			$_SESSION["jid"]=$this->val;
			$_SESSION["pno"]=$_POST['plate'];
			$_SESSION["phn"]=$this->phn;*/
			
			
			
			
			
		}
	}
}