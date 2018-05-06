<?php
class Notification
{
	private $conn;
	private $result;
	private $row;
	private $x=200;
	private $name;
	private $qty;
	private $model;
	private $type;
	private $sname;
	private $sename;
	private $count;
	private $price;
	private $sid;
	
	public function send()
	{
		//echo"adasdadada";
		//$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		$query="SELECT * FROM stock WHERE qty<=10";
		$this->result=mysqli_query($this->conn,$query);
		$this->count=mysqli_num_rows($this->result);
		
		
		if($this->count>0)	
		{	
			while($this->row=mysqli_fetch_array($this->result))
			{
				$this->name=$this->row[2];
				$this->qty=$this->row[1];
				$this->model=$this->row[3];
				$this->type=$this->row[4];
				$this->sname=$this->row[5];
				$this->sename=$this->row[6];
				$this->price=$this->row[7];
				$this->sid=$this->row[0];
				
				
				echo"<p style='position:absolute; left:80px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->name</p>";
				echo"<p style='position:absolute; left:240px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->qty</p>";
				echo"<p style='position:absolute; left:290px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->model</p>";
				echo"<p style='position:absolute; left:390px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->type</p>";
				echo"<p style='position:absolute; left:500px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->price</p>";
				echo"<p style='position:absolute; left:620px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->sename</p>";
				echo"<p style='position:absolute; left:900px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:white; font-weight:bold; color:white;' >$this->sname</p>";
				echo"<p style='position:absolute; left:1090px; top:{$this->x}px; z-index:99999; font-size:20px; font-family:arvo; color:#E5B840; font-weight:bold; ' ><a href=order.php?$this->sid>ORDER</a></p>";
					
					
				$this->x=$this->x+50;
			}
		}
		else
		{
			echo"<script>alert('No low quantity items')</script>";
		}
	}
}
?>