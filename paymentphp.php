<?php
class Pay
{
	private $result;
	private $conn;
	private $row;
	private $count;
	private $subtot=0;
	private $result1;
	private $row1;
	private $cid;
	private $name;
	private $points;
	private $vdate;
	private $sid;
	private $qty;
	private $price;
	private $date;
	private $discount;
	private $payId;
	private $subtotal;
	private $pNo;
	private $time;
	private $total;
	private $query1;
	private $sid1;
	private $newpoints;
	private $x=660;
	private $y=730;
	private $val;
	private $val1;
	
	public function getCusInfo($plateno,$servicecharge)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		$query="SELECT * FROM customer WHERE plateNo='$plateno'";
		$this->result=mysqli_query($this->conn,$query);
		//$this->row=mysqli_fetch_array($this->result);
		
		$this->count=mysqli_num_rows($this->result);
		
		if($this->count==0 || empty($servicecharge)&&$servicecharge!=0 ||!is_numeric($servicecharge)||$servicecharge<0)
		{	
			if($this->count==0)
			{
				echo"<script>alert('Plate number entered is invalid')</script>";
			}
			
			else if(!is_numeric($servicecharge))
			{
				
				echo"<script>alert('You have entered a non-numeric value for service charge')</script>";
				
		
			}
			
			else if($servicecharge<0)
			{
				
				echo"<script>alert('Service charge cannot be negative')</script>";
			}
			else
			{
				
				echo"<script>alert('Please enter the service charge')</script>";
				
				
			}
		}
		
		else
		{
			$this->row=mysqli_fetch_array($this->result);
			
			$this->cid=$this->row[0];
			$this->name=$this->row[3];
			$this->showcid=$this->row[7];
			
			//echo "dsada";
			$query="SELECT * FROM job WHERE pay='undone' AND plateNo='$plateno'";
			$this->result=mysqli_query($this->conn,$query);
			$this->count3=mysqli_num_rows($this->result);
			
			
			if($this->count3==1)
			{
				//echo "dada";
			
				echo"<div style='position:absolute; top:530px; left:280px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->showcid</div>";
				echo"<div style='position:absolute; top:584px; left:300px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->name</div>";
				
				$query="SELECT totalPoints FROM loyalty_points WHERE cid=$this->cid";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->points=$this->row[0];
				
				echo"<div style='position:absolute; top:636px; left:300px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->points</div>";
				
				
				$query="SELECT * FROM job WHERE pay='undone' AND aid IN (SELECT APPID FROM appointment WHERE plateNo='$plateno')";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->vdate=$this->row[9];
				
				$query="SELECT * FROM vehicle_status WHERE date>='$this->vdate' AND plateNo='$plateno'";
				$this->result=mysqli_query($this->conn,$query);
				$this->count=mysqli_num_rows($this->result);
				
				
				//echo $this->vdate;
				
				echo "&nbsp";
				if($this->count>0)
				{
						
					while($this->row=mysqli_fetch_array($this->result))
					{
						$this->sid=$this->row[6];
						$this->qty=$this->row[9];
						
						$query="SELECT * FROM stock WHERE sid='$this->sid'";
						$this->result1=mysqli_query($this->conn,$query);
						$this->row1=mysqli_fetch_array($this->result1);
						
						$this->price=$this->row1[8];
						$this->iname=$this->row1[2];
						
						//echo $this->iname;
						$this->subtot=$this->subtot+$this->price*$this->qty;
						
						
						//echo"<div style='position:relative; top:-400px; padding-left:145px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>-$this->iname      &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    $this->price x $this->qty</div>";
						echo"<div style='position:absolute; top:{$this->y}px; left:180px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>-$this->iname</div>";
						echo"<div style='position:absolute; top:{$this->y}px; left:390px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->price</div>";
						echo"<div style='position:absolute; top:{$this->y}px; left:480px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>X</div>";
						echo"<div style='position:absolute; top:{$this->y}px; left:530px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->qty</div>";
					
						$this->y=$this->y+30;
					}
					
			
				
				}
				$this->subtot=$this->subtot+$servicecharge;
					
				echo"<div  style='position:absolute; top:925px; padding-left:280px; font-size:20px; font-family:arvo; color:white; font-weight:bold;'>$this->subtot</div>";
				
				
				/*$query="SELECT payId FROM payment ORDER BY payId DESC LIMIT 1";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->val1=$this->row[0] + 1;
				$this->val='P00'.$this->val1;
				//echo  $this->val;*/
				
				$this->date=date("Y-m-d");
				$query="INSERT INTO payment (subtotal,date,cid,plateNo) VALUES ('$this->subtot','$this->date','$this->cid','$plateno')";
				$this->result=mysqli_query($this->conn,$query);
				
				
				$query="SELECT payId FROM payment ORDER BY payId DESC LIMIT 1";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				$this->payId=$this->row[0];
			
				$this->val='P00'.$this->payId;
			
				$query="UPDATE payment SET PID='$this->val' WHERE payId='$this->payId'";
				$this->result=mysqli_query($this->conn,$query);
				
				
				
				
				
				
			}
			else
			{
				echo"<script>alert('Payment has been done already')</script>";
			}
		}

			
			
		
	}
	
	public function generateB($loyalpoints)
	{
		$this->conn=mysqli_connect("localhost","root","","garage_management_system");
		
		if(empty($loyalpoints) && $loyalpoints!=0 || !is_numeric($loyalpoints)||$loyalpoints<0)
		{
			if(empty($loyalpoints) && $loyalpoints!=0)
				echo"<script>alert('Enter the cash-in points')</script>";
			
			else if($loyalpoints<0)
				echo"<script>alert('Cashin points cannot be negative')</script>";
			
			else
				echo"<script>alert('You have entered a non-numeric value for cashin points')</script>";
			
			
			
			$query="SELECT payId FROM payment ORDER BY payId DESC LIMIT 1";
			$this->result=mysqli_query($this->conn,$query);
			$this->row=mysqli_fetch_array($this->result);
			
			$this->payId=$this->row[0];
			
			$query="DELETE FROM payment WHERE payId='$this->payId'";
			$this->result=mysqli_query($this->conn,$query);	
		}
		
		
		else
		{
			$this->discount=$loyalpoints*10;
			
			
			$query="SELECT payId, cid FROM payment ORDER BY payId DESC LIMIT 1";
			$this->result=mysqli_query($this->conn,$query);
			$this->count=mysqli_num_rows($this->result);
			
			if($this->count==1)
			{
				$this->row=mysqli_fetch_array($this->result);
				$this->cid=$this->row[1];
				$this->payId=$this->row[0];
				
				
				$query="SELECT totalPoints FROM loyalty_points WHERE cid=$this->cid";
				$this->result=mysqli_query($this->conn,$query);
				$this->row=mysqli_fetch_array($this->result);
				
				$this->points=$this->row[0];
				
				if($loyalpoints>$this->points)
				{
					echo"<script>alert('Points avilable is less than entered amount')</script>";
							
					$query="DELETE FROM payment WHERE payId='$this->payId'";
					$this->result=mysqli_query($this->conn,$query);	
				}
				
				else
				{
					$query="UPDATE payment SET discount=$this->discount WHERE payId=$this->payId";
					$this->result=mysqli_query($this->conn,$query);
					
					$query="SELECT subtotal FROM payment WHERE payId='$this->payId'";
					$this->result=mysqli_query($this->conn,$query);
					$this->row=mysqli_fetch_array($this->result);
					
					$this->subtotal=$this->row[0];
					
					$query="UPDATE payment SET total=$this->subtotal-$this->discount WHERE payId=$this->payId";
					$this->result=mysqli_query($this->conn,$query);
					
					
					$query="SELECT * FROM payment ORDER BY payId DESC LIMIT 1";
					$this->result=mysqli_query($this->conn,$query);
					$this->row=mysqli_fetch_array($this->result);
					
					$this->payId=$this->row[9];
					$this->date=$this->row[1];
					$this->pNo=$this->row[6];
					$this->subtotal=$this->row[2];
					$this->discount=$this->row[3];
					$this->total=$this->row[4];
					
					if($this->total<0)
					{
						echo"<script>alert('TOTAL cannot be negative you have cashed in too many points')</script>";
						$query="DELETE FROM payment WHERE payId='$this->payId'";
						$this->result=mysqli_query($this->conn,$query);
					}
					
					else
					{
						echo"<div style='position:absolute; top:420px; left:880px; font-size:17px; font-family:arvo; color:white; '>$this->payId</div>";
						echo"<div style='position:absolute; top:485px; left:780px; font-size:17px; font-family:arvo; color:white; '>$this->date</div>";
						echo"<div style='position:absolute; top:535px; left:850px; font-size:17px; font-family:arvo; color:white; '>$this->pNo</div>";
						
						date_default_timezone_set("Asia/Colombo");
						$this->time=date('h:i:s');
						echo"<div style='position:absolute; top:483px; left:980px; font-size:17px; font-family:arvo; color:white; '>$this->time</div>";
						
						$query="UPDATE payment SET time='$this->time' WHERE plateNo='$this->pNo'";
						$this->result=mysqli_query($this->conn,$query);
						
						$query="SELECT name FROM customer WHERE plateNo='$this->pNo'";
						$this->result=mysqli_query($this->conn,$query);
						$this->row=mysqli_fetch_array($this->result);
						
						$this->name=$this->row[0];
						
						echo"<div style='position:absolute; top:585px; left:870px; font-size:17px; font-family:arvo; color:white; '>$this->name</div>";
						
						$query="SELECT * FROM job WHERE pay='undone' AND aid IN (SELECT APPID FROM appointment WHERE plateNo='$this->pNo')";
						$this->result=mysqli_query($this->conn,$query);
						$this->row=mysqli_fetch_array($this->result);
						
						$this->date=$this->row[9];
						
						$query="SELECT * FROM vehicle_status WHERE date>='$this->date' AND plateNo='$this->pNo'";
						$this->result1=mysqli_query($this->conn,$query);
						$this->count=mysqli_num_rows($this->result1);
						
						//$this->row1=mysqli_fetch_array($this->result1);
						
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
								
								
								//echo"<div style='position:relative; top:-380px; padding-left:730px; font-size:17px; font-family:arvo; color:black;'>-$this->iname      &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    $this->price x $this->qty</div>";
								echo"<div style='position:absolute; top:{$this->x}px; left:720px; font-size:17px; font-family:arvo; color:white;'>-$this->iname</div>";
								echo"<div style='position:absolute; top:{$this->x}px; left:920px; font-size:17px; font-family:arvo; color:white;'>$this->price</div>";
								echo"<div style='position:absolute; top:{$this->x}px; left:980px; font-size:17px; font-family:arvo; color:white;'>X $this->qty</div>";
							
								$this->x=$this->x+25;
							}
						}
						
						else
						{
							//echo"<div style='position:relative; top:-380px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
							//echo"<div style='position:relative; top:-370px; padding-left:730px; font-size:25px; font-family:arvo; color:black; font-weight:bold;'> &nbsp &nbsp -        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp    -</div>";
							
							echo"<div style='position:absolute; top:680px; left:750px; font-size:25px; font-family:arvo; color:white; font-weight:bold;'>-</div>";
							echo"<div style='position:absolute; top:680px; left:935px; font-size:25px; font-family:arvo; color:white; font-weight:bold;'>-</div>";
							echo"<div style='position:absolute; top:730px; left:750px; font-size:25px; font-family:arvo; color:white; font-weight:bold;'>-</div>";
							echo"<div style='position:absolute; top:730px; left:935px; font-size:25px; font-family:arvo; color:white; font-weight:bold;'>-</div>";
							
						}
						
						echo"<div style='position:absolute; top:830px; left:850px; font-size:17px; font-family:arvo; color:white; '>$this->subtotal</div>";
						echo"<div style='position:absolute; top:870px; left:850px; font-size:17px; font-family:arvo; color:white; '>$this->discount</div>";
						echo"<div style='position:absolute; top:910px; left:800px; font-size:17px; font-family:arvo; color:white; '>$this->total</div>";
						
						$query="SELECT totalPoints FROM loyalty_points WHERE cid='$this->cid'";
						$this->result=mysqli_query($this->conn,$query);
						$this->row=mysqli_fetch_array($this->result);
						
						$this->rp=$this->row[0]-$loyalpoints;
						
						$query="UPDATE loyalty_points SET totalPoints=$this->rp WHERE cid='$this->cid'";
						$this->result=mysqli_query($this->conn,$query);
						
						$query="UPDATE job SET pay='done' WHERE aid IN (SELECT APPID FROM appointment WHERE plateNo='$this->pNo')";
						$this->result=mysqli_query($this->conn,$query);
						
						
						$this->newpoints=$this->total*(0.1/100.0);
						//$query="INSERT INTO loyalty_points(totalPoints,cid,plateNo) VALUES ('$this->newpoints','$this->cid','$this->pNo')";
						$query="UPDATE loyalty_points SET totalPoints=totalPoints+$this->newpoints WHERE cid=$this->cid";
						$this->result=mysqli_query($this->conn,$query);
						
						
					}
			
				}
			
			
		
					
					
					
			}
			
		}
		
		
	}
	



	
}




?>