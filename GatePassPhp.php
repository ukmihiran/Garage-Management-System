<?php

class Body
{
	private $result;
	private $conn;
	private $row;
	private $countt=0;
	private $count1;
	private $vari;
	
	public function insert_vehicles()
	{
		
		
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		$query="SELECT plateNo FROM payment WHERE security='unclear'";
		$this->result=mysqli_query($this->conn,$query);
		//$this->row=mysqli_fetch_array($this->result);
		
		
		while($this->row=mysqli_fetch_array($this->result))
		{
			$msg=$this->row[0];
			$this->countt=$this->countt + 1;
			echo "<div style='position:static; padding-top:20px; padding-bottom:10px; padding-left:60px; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold;'>$this->countt ) $msg  <a href=GatePassClearVeh.php?$msg>CLEAR </a></div>";
		
			
		}
		
	}
	
	
	
	public function search_vehicle($searchVeh)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		$query="SELECT * FROM payment WHERE plateNo='$searchVeh' AND security='unclear'";
		$this->result=mysqli_query($this->conn,$query);
		$this->row=mysqli_fetch_array($this->result);
		
		$this->count1=mysqli_num_rows($this->result);
		
		if($this->count1==0)
		{
			$this->vari="No such vehicle in the garage";
			echo "<div style='position:absolute;  top:240px; left:750px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->vari</div>";
			
			
		}
		else //if($this->row[7]=='unclear')
		{
			$this->vari="Vehicle is parked at the garage";
			echo "<div style='position:absolute;  top:240px; left:750px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->vari</div>";
			
		}
		
	/*	else
		{
			$this->vari="Vehicle left the garage after payment";
			echo "<div style='position:absolute;  top:240px; left:750px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->vari</div>";
			
		}*/
		
	}
}

?>