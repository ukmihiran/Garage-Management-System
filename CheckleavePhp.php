<?php
session_start();
class check
{
	private $conn;
	private $result;
	private $row;
	private $uname;
	private $lev;
	private $sd;
	private $ed;
	private $status;
	private $des;
	private $x=180;
	private $count1;
	private $result1;
	private $row1;
	
	public function view()
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$uname=$_SESSION["uname"];
	
		
		$query="SELECT eid FROM employee WHERE username='$uname'";
		$this->result=mysqli_query($this->conn,$query);
		$this->row=mysqli_fetch_array($this->result);
		$this->eid=$this->row[0];
		
		$query="SELECT * FROM `leave` WHERE eid='$this->eid'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count1=mysqli_num_rows($this->result);
		
		if($this->count1 <0)
		{
			echo"<script>alert('No requested leaves to display')</script>";
		}
		else
		{
			while($this->row=mysqli_fetch_array($this->result))
			{
				$this->sd=$this->row[2];
				$this->ed=$this->row[3];
				$this->status=$this->row[4];
				$this->lev=$this->row[6];
				$this->des=$this->row[1];
				
				
				
				echo"<p style='position:absolute; left:110px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->lev</p>";
				echo"<p style='position:absolute; left:300px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->sd</p>";
				echo"<p style='position:absolute; left:550px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->ed</p>";
				echo"<p style='position:absolute; left:750px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->des</p>";
				echo"<p style='position:absolute; left:1000px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->status</p>";
				//echo"<p style='position:absolute; left:1020px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->at</p>";
					
					
				$this->x=$this->x+50;
			}
		}
			
	}
}

?>