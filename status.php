<?php
$lid=$_REQUEST['lid'];
//echo $lid;
include("connect.php");
$query="select status from tbl_leave where leaveid='$lid'";
$res=mysql_query($query);
if($row=mysql_fetch_array($res,MYSQL_BOTH))
{
	$s=$row['0'];
}
if($s=='N')
{
	$query2="update tbl_leave set status='Y' where leaveid='$lid'";
	mysql_query($query2);
	header("Location:leaves.php");
}
if($s=='Y')
{
	$query2="update tbl_leave set status='N' where leaveid='$lid'";
	mysql_query($query2);
	header("Location:leaves.php");
}













?>