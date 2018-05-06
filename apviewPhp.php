<?php

class Appointment
{
	private $vdate;
	private $result;
	private $row;
	private $conn;
	private $adate;
	private $aid;
	private $cid;
	private $cname;
	private $tech;
	private $timeadd;
	private $tsslot;
	private $teslot;
	private $pno;
	private $row1;
	private $result1;
	private $eid;
	private $ename;
	private $t=170;
	
	public function view()
	{
		//$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		
		$this->vdate=date("Y-m-d");
		$query="SELECT * FROM appointment WHERE date>='$this->vdate' ";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		//echo $this->date;
		
		if($this->count>0)
		{
			while($this->row=mysqli_fetch_array($this->result))
			{
				
				$this->aid=$this->row[8];
				$this->timeadd=$this->row[1];
				$this->adate=$this->row[2];
				$this->tsslot=$this->row[3];
				$this->teslot=$this->row[4];
				$this->cid=$this->row[5];
				$this->pno=$this->row[6];
				$this->eid=$this->row[7];
				
				$query="SELECT name FROM customer WHERE cid='$this->cid'";
				$this->result1=mysqli_query($this->conn,$query);
				$this->row1=mysqli_fetch_array($this->result1);
				
				$this->cname=$this->row1[0];
				
				$query="SELECT EMPID FROM employee WHERE eid='$this->eid'";
				$this->result1=mysqli_query($this->conn,$query);
				$this->row1=mysqli_fetch_array($this->result1);
				
				$this->ename=$this->row1[0];
				
				//echo"<p style='position:absolute; top:{$this->t}px; left:50px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->aid &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp $this->pno &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   $this->cname &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp   $this->ename &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  $this->adate &nbsp &nbsp &nbsp  $this->tsslot &nbsp &nbsp &nbsp &nbsp $this->teslot</p>";
				
				echo"<p style='position:absolute; left:130px; top:{$this->t}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->aid</p>";
				echo"<p style='position:absolute; left:305px; top:{$this->t}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->pno</p>";
				echo"<p style='position:absolute; left:480px; top:{$this->t}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->cname</p>";
				echo"<p style='position:absolute; left:720px; top:{$this->t}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->ename</p>";
				echo"<p style='position:absolute; left:840px; top:{$this->t}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->adate</p>";
				echo"<p style='position:absolute; left:970px; top:{$this->t}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->tsslot</p>";
				echo"<p style='position:absolute; left:1080px; top:{$this->t}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->teslot</p>";
				
				
				
				$this->t=$this->t+20;
			}
		}
		else
		{
			
		}
	}
}