<?php
session_start();
include("connect.php");
$dfrom=$_POST['dfrom'];
//echo $dfrom;
$dto=$_POST['dto'];
//echo $dto;
$reason=$_POST['reason'];
//echo $reason;
$email=$_SESSION['email'];
$query="select * from tbl_employee where email='$email'";
$res=mysql_query($query);
if($row=mysql_fetch_array($res,MYSQL_BOTH))
{
	$uid=$row['0'];
}
$query2="insert into tbl_leave(empid,dfrom,dto,reason,status,doa) values ('$uid','$dfrom','$dto','$reason','N',curdate())";
mysql_query($query2);
header("Location:eprofile.php");
?>