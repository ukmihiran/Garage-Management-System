<?php

class History
{
	private $conn;
	private $result;
	private $row;
	private $count;
	private $eid;
	private $name;
	private $row1;
	private $result1;
	private $phn;
	private $des;
	
	public function jobHistory($plate)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="SELECT * FROM job WHERE plateNo='$plate'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		
		if($this->count>0)
		{
			while($this->row=mysqli_fetch_array($this->result))
			{
				
				$this->date=$this->row[9];
				$this->jid=$this->row[0];
				$this->eid=$this->row[6];
				$this->des=$this->row[1];
				
				$query="SELECT name,mobile FROM employee WHERE EMPID='$this->eid'";
				$this->result1=mysqli_query($this->conn,$query);
				$this->row1=mysqli_fetch_array($this->result1);
				
				$this->name=$this->row1[0];
				$this->phn=$this->row1[1];
				
				
				echo"<tr>
					<td><p style='color:#E5B840; padding-top:50px;'>Date : <a style='color:white;'>$this->date</a></p></td>
							
				</tr>
						
				<tr>
					<td><p style='color:#E5B840; padding-top:30px;'>Job ID :<a style='color:white;'> $this->jid</a></p></td>
				</tr>
						
				<tr>
					<td><p style='color:#E5B840;  padding-top:30px;'>Mechanic Name : <a style='color:white;'>$this->name</a></p></td>
				</tr>
						
				<tr>
					<td><p style='color:#E5B840;  padding-top:30px;'>Phone Number :<a style='color:white;'> $this->phn</a></p></td>
				</tr>
						
				<tr>
					<td><p style='color:#E5B840;  padding-top:30px;'>Discription : <a style='color:white;'>$this->des</a></p></td>
				</tr>
				
				<tr>
					<td><p style='color:#E5B840;  padding-top:30px;'><a style='color:white;'>---------------------------------------------------------------------------------------------------------------------------------------</a></p></td>
				</tr>";
				
			}
		}
		
		else
		{
			echo"<script>alert('No jobs have been assigned for the enetered plate number.')</script>";
			
		}
		
				
		
	}
}
?>