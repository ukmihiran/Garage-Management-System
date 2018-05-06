<?php
session_start();
class Bill
{
	private $conn;
	private $result;
	private $count;
	private $row;
	private $cid='1';
	private $date1;
	private $plate;
	private $view;
	private $payId;
	private $subtotal;
	private $total;
	private $discount;
	private $pNo;
	private $time;
	private $row1;
	private $result1;
	private $qty;
	private $price;
	private $iname;
	private $sid;
	private $space=580;
	private $pdate;
	private $email;
	private $row2;
	private $result2;
	private $vari;
	private $y=580;
	private $x=580;
	
	public function viewBill()
	{
	//	$this->vari="asdadddddddddddddddddddddddddddddddddddddddddddda";
	//	echo $this->vari;
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$this->email=$_SESSION["uname"];
		
		$query="SELECT cid FROM customer WHERE email='$this->email'";
		$this->result2=mysqli_query($this->conn,$query);
		
		
		while($this->row2=mysqli_fetch_array($this->result2))
		{
		
			//echo"ssss";
			$this->cid=$this->row2[0];
			$query="SELECT * FROM payment WHERE cid='$this->cid'";
			$this->result=mysqli_query($this->conn,$query);
			$this->count=mysqli_num_rows($this->result);
			
			if($this->count>0)
			{
				
				while($this->row=mysqli_fetch_array($this->result))
				{
					$this->date1=$this->row[1];
					$this->plate=$this->row[6];
					echo"<div><p style='font-size:20px; font-family:arvo; font-weight:bold; padding-top:170px; padding-left:60px; color:#E5B840;'>Date : $this->date1</p>
						<p style='font-size:20px; font-family:arvo; font-weight:bold; padding-top:30px; padding-left:60px; padding-bottom:20px; color:#E5B840;'>Plate Number : $this->plate</p>
						<div style='position:absolute; padding-top:20px; padding-bottom:0px; padding-left:60px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'> <a href=?$this->date1>VIEW</a> </div>
						</div>";
						
				}
				
				$this->view=$_SERVER['QUERY_STRING'];
				
				$query="SELECT * FROM payment WHERE cid='$this->cid' AND date='$this->view'";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->payId=$this->row[9];
				$this->pNo=$this->row[6];
				$this->subtotal=$this->row[2];
				$this->discount=$this->row[3];
				$this->total=$this->row[4];
				$this->time=$this->row[8];
				
				$query="SELECT name FROM customer WHERE plateNo='$this->pNo'";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->name=$this->row[0];
				
				echo"<div style='position:absolute; top:390px; left:850px; font-size:17px; font-family:arvo; color:black; z-index:99999; '>$this->payId</div>";
				echo"<div style='position:absolute; top:431px; left:770px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->view</div>";
				echo"<div style='position:absolute; top:431px; left:970px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->time</div>";
				echo"<div style='position:absolute; top:470px; left:840px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->pNo</div>";
				echo"<div style='position:absolute; top:510px; left:860px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->name</div>";
				echo"<div style='position:absolute; top:710px; left:820px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->subtotal</div>";
				echo"<div style='position:absolute; top:750px; left:820px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->discount</div>";
				echo"<div style='position:absolute; top:790px; left:790px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->total</div>";
				
				
				$query="SELECT * FROM payment WHERE plateNo='$this->pNo' AND date<'$this->view' ORDER BY date ASC";
				$this->result=mysqli_query($this->conn,$query);
				$this->count=mysqli_num_rows($this->result);
				
				
				if($this->count>0)
				{
					$this->row=mysqli_fetch_array($this->result);
					$this->pdate=$this->row[1];
					
					$query="SELECT * FROM vehicle_status WHERE date<='$this->view' AND date>$this->pdate AND plateNo='$this->pNo'";
					$this->result1=mysqli_query($this->conn,$query);
					$this->count=mysqli_num_rows($this->result1);
					
					echo "&nbsp";
					if($this->count>0)
					{
						while($this->row1=mysqli_fetch_array($this->result1))
						{
							$this->sid=$this->row1[6];
									
							$query="SELECT * FROM stock WHERE sid='$this->sid'";
							$this->result=mysqli_query($this->conn,$query);
							$this->row=mysqli_fetch_array($this->result);
									
							$this->iname=$this->row[2];
							$this->price=$this->row[8];
							$this->qty=$this->row1[9];
									
									
							//echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>-$this->iname      &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    $this->price x $this->qty</div>";
								

							echo"<div style='position:absolute; top:{$this->x}px; left:720px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>-$this->iname</div>";
							echo"<div style='position:absolute; top:{$this->x}px; left:920px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->price</div>";
							echo"<div style='position:absolute; top:{$this->x}px; left:980px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>X $this->qty</div>";
							
							$this->x=$this->x+25;
								
							//$this->space=$this->space+30;
						}
					}
					else
					{
						echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold; z-index:99999;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
						$this->space=$this->space+50;	
						echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold; z-index:99999;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
					}
					
					
					
				}
				
				else
				{
					$query="SELECT * FROM vehicle_status WHERE date<='$this->view' AND plateNo='$this->pNo'";
					$this->result1=mysqli_query($this->conn,$query);
					$this->count=mysqli_num_rows($this->result1);
					
					
					
					
					echo "&nbsp";
					if($this->count>0)
					{
								
									
						while($this->row1=mysqli_fetch_array($this->result1))
						{
							$this->sid=$this->row1[6];
									
							$query="SELECT * FROM stock WHERE sid='$this->sid'";
							$this->result=mysqli_query($this->conn,$query);
							$this->row=mysqli_fetch_array($this->result);
									
							$this->iname=$this->row[2];
							$this->price=$this->row[8];
							$this->qty=$this->row1[9];
									
									
							//echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>-$this->iname      &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    $this->price x $this->qty</div>";
							echo"<div style='position:absolute; top:{$this->x}px; left:720px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>-$this->iname</div>";
							echo"<div style='position:absolute; top:{$this->x}px; left:920px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>$this->price</div>";
							echo"<div style='position:absolute; top:{$this->x}px; left:980px; font-size:17px; font-family:arvo; color:black; z-index:99999;'>X $this->qty</div>";
							
							$this->x=$this->x+25;
							
							//$this->space=$this->space+30;
						}
					}
							
					else
					{
						echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold; z-index:99999;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
						$this->space=$this->space+50;	
						echo"<div style='position:absolute; top:{$this->space}px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold; z-index:99999;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
					}
						
					
				}
			
				
				
			}
			
		}	
	}
}

?>