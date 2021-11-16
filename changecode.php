<?php
session_start();
$op=$_POST['op'];
//echo $op;
$np=$_POST['np'];
$cp=$_POST['cp'];
$email=$_SESSION['email'];
include("connect.php");
$query="select password from tbl_admin where email='$email'";
$res=mysql_query($query);
if($row=mysql_fetch_array($res,MYSQL_BOTH))
{
	$pp=$row['password'];
}
if($pp==$op)
{
	if($op==$np)
	{
		echo "no change";
		header("location:change.php");
	}
	else if($np==$cp)
	{
		//echo "change hoga";
		$query2="update tbl_admin set password='$cp' where email='$email'";
		mysql_query($query2);
		session_destroy();
		header("location:index.php");
	}
	else
	{
		echo "no change";
		header("location:change.php");
	}
}
else
{
	echo "no change";
	header("location:change.php");
}
?>