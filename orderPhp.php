<?php
class Order
{
	public function orderQty($email,$qty,$sn,$name)
	{
		
		$to       = $email;
		$subject  = 'Order Request';
		$message  = "Hi $sn, We would like to get $qty parts from $name.";
		$headers  = 'From: NihonAutomobiles@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=utf-8';
		if(mail($to, $subject, $message, $headers))
			echo"<script>alert('Email Sent Successfully')</script>";
		else
			echo"<script>alert('Email Sending Failed')</script>";
		
		
		
		
		/*if(mail("+94779313101@vtext.com", "", "Your packaged has arrived!", "From: <NihonAutomobiles@gmail.com> \r\n"))
		{
		echo"<script>alert('SMS Sent Successfully')</script>";	
		}
		else
			echo"<script>alert('Sms failed')</script>";*/
		
		//mail("dilanmel74@gmail.com","My subject",$comment);
		
		//echo"<script>alert('Email Sent Successfully')</script>";
	}
}
?>