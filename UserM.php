<?php
//session_start();
class User
{
	public function logout()
	{
		echo"<meta http-equiv='refresh' content='0;URL=loginform.php' />";
		session_unset(); 
		session_destroy(); 
		
	}
}