<?php
//echo "elogcode page";
session_start();
$email=$_POST['eemail'];
//echo $email;
$password=$_POST['epass'];
//echo $password;

include("connect.php");
$query="select * from tbl_employee where email='$email' and password='$password'";
$res=mysql_query($query);
if($row=mysql_fetch_array($res,MYSQL_BOTH))
{
	$_SESSION['email']=$email;
	header("location:eprofile.php");
	
}
else
{	
	
	header("location:elogin.php");
}	
?>
