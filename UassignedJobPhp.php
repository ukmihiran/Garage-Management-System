<?php
class job
{
	private $conn;
	private $result;

	public function UpdateJob($plate,$st,$eid)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="UPDATE job SET status='completed',totalTimeSpent='$st' WHERE plateNo='$plate' AND  eid='$eid'";
		$this->result=mysqli_query($this->conn,$query);
		
		
		
		
		echo"<script>alert('Assigned job was updated successfuly')</script>";
	}
}
?>