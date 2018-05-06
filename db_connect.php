<?php

$localhost ="localhost";
$username="root";
$password="";
$dbname="garage_management_system";

$connect = mysqli_connect($localhost,$username,$password,$dbname);

//check connection

if(mysqli_connect_errno()){
	echo "Failed to connect".mysqli_connect_error();
}
else{
	echo"Successfully connected";
}

?>