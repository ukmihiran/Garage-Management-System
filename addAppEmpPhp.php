<?php


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
	private $z=620;
	private $cid;
	private $cname;
	
	public function create($date,$plate)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		session_start();
		//$this->email=$_SESSION["uname"];
		
		$_SESSION['plate']=$plate;
		
		$this->date=date("Y-m-d");
		
		$query="SELECT * FROM customer WHERE plateNo='$plate'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		echo $_SESSION['plate'];
		//echo $this->count;
		/*echo $this->email;
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
				$this->row=mysqli_fetch_array($this->result);
				$this->cid=$this->row[0];
				$this->cname=$this->row[3];
				echo "<p style='color:white;  position:absolute; top:405px; left:1020px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$plate</p>";
				echo "<p style='color:white;  position:absolute; top:460px; left:1020px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->cid</p>";
				echo "<p style='color:white;  position:absolute; top:515px; left:1020px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->cname</p>";
				echo "<p style='color:white;  position:absolute; top:570px; left:1020px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$date</p>";
				
				$query="SELECT COUNT(aid) FROM appointment GROUP BY slot_start";
				$this->result=mysqli_query($this->conn,$query);
				
				
				//while($this->row=mysqli_fetch_array($this->result))
				//{
					//$this->slot_count=$this->row[0];
				
				
				
					
					$query="SELECT COUNT(eid) FROM employee";
					$this->result1=mysqli_query($this->conn,$query);
					$this->row1=mysqli_fetch_array($this->result1);
					$this->emp_count=$this->row1[0];
					
				
					if($this->slot_count<$this->emp_count-3)
					{
						
						
							//echo"<select>";
						for($this->x=8;$this->x<=17;$this->x=$this->x+1)
						{
							//echo"<select>";
							//echo"<option>";
							$query="SELECT DISTINCT slot_start FROM appointment ORDER BY slot_start ASC";
							$this->result2=mysqli_query($this->conn,$query);
						
							while($this->row2=mysqli_fetch_array($this->result2))
							{
								$this->sslot=$this->row2[0];
								$this->t="$this->x:00:00";
								if($this->t==$this->sslot)
								{
									$this->val=false;
									//continue;
									break;
								}
								/*if($this->val)
								{
									$this->y=$this->x+1;
									echo"<p style='position:absolute; left:1020px; top:{$this->z}px; z-index:99999; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold; ' ><a href=?$this->x>$this->x:00:00 - $this->y:00:00</a></p>";
		
									$this->z=$this->z+50;
								}*/
						
							}
							//echo"<option>";
							if($this->val)
							{
								//echo"<option>";
								$this->y=$this->x+1;
								echo"<p style='position:absolute; left:1020px; top:{$this->z}px; z-index:99999; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold; ' ><a href=addAppEmp2.php?$this->x>$this->x:00:00 - $this->y:00:00</a></p>";
								//echo"$this->x:00:00 - $this->y:00:00";
								$this->z=$this->z+50;
								//echo"</option>";
							}
							$this->val=true;
						//echo"</option>";
						
						}
							
						//echo"</select>";
						
					}
					
					/*else
					{
							echo"sdadada";
					}*/
				
				}
			}
			
	//	}
		else
		{
			echo"<script>alert('Invalid Plate Number')</script>";
		}
		
	}
}