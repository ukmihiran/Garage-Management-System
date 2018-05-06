<?php
session_start();
class appointments
{
	private $conn;
	private $email;
	private $row;
	private $result;
	private $result1;
	private $row1;
	private $count;
	private $date1;
	private $aid;
	private $addtime;
	private $st;
	private $et;
	private $plate;
	private $count1;
	private $x=200;
	private $removeapp;
	private $result2;
	private $cid;
	private $date;
	
	public function appdelete()
	{
		
		
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$this->email=$_SESSION['uname'];
		
		$query="SELECT cid FROM customer WHERE email='$this->email'";
		$this->result=mysqli_query($this->conn,$query);
	
		$this->row=mysqli_fetch_array($this->result);
		$this->cid=$this->row[0];
		$this->date1=date("Y-m-d");
				
		$query="SELECT * FROM appointment WHERE cid='$this->cid' AND date>='$this->date1'";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
				
				if($this->count>0)
				{
					while($this->row=mysqli_fetch_array($this->result))
					{
						$this->aid=$this->row[0];
						$this->date=$this->row[2];
						$this->addtime=$this->row[1];
						$this->st=$this->row[3];
						$this->et=$this->row[4];
						$this->plate=$this->row[6];
						
						echo"<p style='position:absolute; left:130px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->aid</p>";
						echo"<p style='position:absolute; left:290px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->plate</p>";
						echo"<p style='position:absolute; left:470px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->date</p>";
						echo"<p style='position:absolute; left:660px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->addtime</p>";
						echo"<p style='position:absolute; left:800px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->st - $this->et</p>";
						echo"<p style='position:absolute; left:1020px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold; ' ><a href=appmsg.php?$this->aid>DELETE</a></p>";
				
			
						
						$this->x=$this->x+50;
					}
					/*$this->removeapp=$_SERVER['QUERY_STRING'];
					
		
					
					$query="DELETE FROM appointment WHERE aid='$this->removeapp'";
					$this->result1=mysqli_query($this->conn,$query);
					if (!$this->result1)
					{
						
						echo"<script>alert('ERROR')</script>";
					} 
					else
					{
						//echo"<meta http-equiv='refresh' content='0;URL=cusappview.php' />";
						header("Location: appmsg.html");
					}*/
				}
				else
				{
					echo"<script>alert('No added appointments')</script>";
				}
				

		
		
		
	}
}
?>