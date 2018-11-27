<?php
$con = mysqli_connect("localhost","root","12345","ecommerce");

if(mysqli_connect_errno())
{
	echo " Failed to connect with MySQL :" . mysqli_connect_error();
}
?>