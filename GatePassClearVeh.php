<?php
include("connect.php");

$clear_veh=$_SERVER['QUERY_STRING'];
$query="UPDATE payment SET security='clear' WHERE plateNo='$clear_veh'";
$result=mysqli_query($con,$query);

if (!$result)
{
	die(mysqli_error());
} 
else
{
	echo"<meta http-equiv='refresh' content='0;URL=GatePass.php' />";
}
mysqli_close($con);

?>