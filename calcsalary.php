<?php
session_start();
if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php");
}
$con=include("connect.php");
if($con==true)
{
	echo "connection created";
}
else{
	echo "error";
	die();
}
//empid=1&dept_id=1&paygrade=200
@$empid=$_REQUEST['empid'];
//-----------------------------
@$dept_id=$_REQUEST['dept_id'];
$query_workday="select count(*) as workdays from tbl_attendance where empid='$empid' and status='present'";
$res_workdays=mysql_query($query_workday);
if($row_workdays=mysql_fetch_array($res_workdays,MYSQL_BOTH))
{
	$workday=$row_workdays['workdays'];
	//echo $workday;
}
$q_name="select * from tbl_employee where empid='$empid'";
$res_name=mysql_query($q_name);
if($row_name=mysql_fetch_array($res_name,MYSQL_BOTH))
{
	$emp_name=$row_name['name'];
	//echo $emp_name;
}
$q_dept="select * from tbl_dpt where dptid='$dept_id'";
$res_dept=mysql_query($q_dept);
if($row_dept=mysql_fetch_array($res_dept,MYSQL_BOTH))
{
	$depart=$row_dept['department'];
	//echo $depart;
}
//-----------------------------------
@$paygrade=$_REQUEST['paygrade'];//done
//echo $paygrade;
$basic=30*$paygrade;//done
//echo $basic;
//-------------------

//name of variables
// $emp_name;
// $depart;
// $workday;
// $basic;
// $paygrade;
include("payslip.php");
?>