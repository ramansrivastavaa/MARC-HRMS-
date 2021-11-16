<?php
session_start();
$con=include("connect.php");
if($con==true)
{
	//echo "connection created";
}
else{
	echo "error";
	die();
}
$email=$_SESSION['email'];
$name=$_POST['name'];
$fname=$_POST['fname'];
$gender=$_POST['a'];
$mobile=$_POST['mobile'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$city=$_POST['city'];
$query="update tbl_employee set name='$name',fname='$fname',gender='$gender',mobile='$mobile',dob='$dob',address='$address',city='$city' where email='$email'";
mysql_query($query);
header("location:eupdate.php");
?>