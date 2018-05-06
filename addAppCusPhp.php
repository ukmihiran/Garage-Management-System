<?php
session_start();

class Appoinment
{
	private $conn;
	private $email;
	private $result;
	private $count;
	private $row;
	private $date;
	private $slot_count;
	private $val=true;
	private $row1;
	private $result1;
	private $x;
	private $emp_count;
	private $y;
	private $t;
	private $z=700;
	
	public function create($date,$plate)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$this->email=$_SESSION['uname'];
		
		$_SESSION['plate']=$plate;
		
		$this->date=date("Y-m-d");
		
		$query="SELECT * FROM customer WHERE plateNo='$plate' AND email='$this->email'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		/*echo $this->count;
		echo $this->email;
		echo $plate;*/
		if($this->count>0)
		{
			
			if($date<$this->date)
			{
				echo"<script>alert('Invalid Date')</script>";
			}
			else
			{
				$_SESSION['date']=$date;
				echo "<p style='color:white;  position:absolute; top:600px; left:1020px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$plate</p>";
				echo "<p style='color:white;  position:absolute; top:650px; left:1020px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$date</p>";
				
				$this->x=8;
				while($this->x<=17)
				{
					$this->t="$this->x:00:00";
					
					$query="SELECT * FROM appointment WHERE date='$date' AND slot_start='$this->t'";
					$this->result=mysqli_query($this->conn,$query);
					$this->countSlots=mysqli_num_rows($this->result);
					
					$query1="SELECT COUNT(eid) FROM employee";
					$this->result1=mysqli_query($this->conn,$query1);
					$this->row1=mysqli_fetch_array($this->result1);
					$this->emp_count=$this->row1[0]-3;
					
					
					if($this->countSlots<$this->emp_count)
					{
						$this->y=$this->x+1;
						echo"<p style='position:absolute; left:1020px; top:{$this->z}px; z-index:99999; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold; ' ><a href=addAppCus2.php?$this->x>$this->x:00:00 - $this->y:00:00</a></p>";
		
						$this->z=$this->z+50;
					}
					
					
					$this->x=$this->x+1;
				}
				
				
				
				
				
				/*$query="SELECT slot_start, COUNT(aid) FROM appointment WHERE date='$date' GROUP BY slot_start  ORDER BY slot_start ASC";
				$this->result=mysqli_query($this->conn,$query);
				
				$x=8;
				while($this->row=mysqli_fetch_array($this->result))
				{
					$this->countGroupApp=$this->row[1];
						
						
					$query1="SELECT COUNT(eid) FROM employee";
					$this->result1=mysqli_query($this->conn,$query1);
					$this->row1=mysqli_fetch_array($this->result1);
					$this->emp_count=$this->row1[0];
					
					
					
							
					if($this->countGroupApp==($this->emp_count-3))
					{
							continue;
					}
					else
					{
						
					}
				}*/
				
				/*
				//$query="SELECT COUNT(aid) FROM appointment WHERE date='$date' GROUP BY slot_start";
				$this->result=mysqli_query($this->conn,$query);
				
				//$this->row=mysqli_fetch_array($this->result);
				//$this->slot_count=$this->row[0];
					//echo "dadasdasdasdasdasd";
					//echo $this->slot_count;
				
				
				//echo "dadasdasdasdasdasd";
				while($this->row=mysqli_fetch_array($this->result))
				{
					$this->slot_count=$this->row[0];
					//echo "dadasdasdasdasdasd";
					echo $this->slot_count;
				
				//if()	
					$query="SELECT COUNT(eid) FROM employee";
					$this->result1=mysqli_query($this->conn,$query);
					$this->row1=mysqli_fetch_array($this->result1);
					$this->emp_count=$this->row1[0];
					
				
					if($this->slot_count<3)
					{
						
						//$this->slot_count=10;
						//echo $this->slot_count;
						
							//echo"<select>";
						for($this->x=8;$this->x<=17;$this->x=$this->x+1)
						{
							//echo"<select>";
							//echo"<option>";
							$query="SELECT DISTINCT slot_start FROM appointment  ORDER BY slot_start ASC";
							$this->result2=mysqli_query($this->conn,$query);
						
							while($this->row2=mysqli_fetch_array($this->result2))
							{
								$this->sslot=$this->row2[0];
								$this->t="$this->x:00:00";
								if($this->t==$this->sslot)
								{
									$this->val=false;
									//continue;
									//break;
								}
								/*if($this->val)
								{
									$this->y=$this->x+1;
									echo"<p style='position:absolute; left:1020px; top:{$this->z}px; z-index:99999; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold; ' ><a href=?$this->x>$this->x:00:00 - $this->y:00:00</a></p>";
		
									$this->z=$this->z+50;
								}*/
						
							
							//echo"<option>";
							/*if($this->val)
							{
								//echo"<option>";
								$this->y=$this->x+1;
								//if($this->slot_count<3)
								//{
									echo"<p style='position:absolute; left:1020px; top:{$this->z}px; z-index:99999; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold; ' ><a href=addAppCus2.php?$this->x>$this->x:00:00 - $this->y:00:00</a></p>";
									//echo"$this->x:00:00 - $this->y:00:00";
									$this->z=$this->z+50;
									//echo"</option>";
								//}
							}
							//$this->slot_count=$this->row[0];
							$this->val=true;
						//echo"</option>";
						
						}*/
							
						//echo"</select>";
			}
		}
		
					/*else
					{
							echo"sdadada";
					}*/
				
				//}
			
			
		
		else
		{
			echo"<script>alert('Invalid Plate Number')</script>";
		}
		
	}
}