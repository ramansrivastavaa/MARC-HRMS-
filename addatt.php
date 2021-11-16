<?php
session_start();


if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
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
$query="select * from tbl_employee";
$res=mysql_query($query);
?>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
<div class="row">
<div class="col-sm-2" style="float:left;height:100%;position:fixed;">
<img alt="Brand" src="images/logo.jpg" style="position:absolute; top:14; left:11%;">
<div style="position:absolute;
	top:70;
	left:30;">
	
	<?php
	echo "<h3>";
	echo $_SESSION['email'];
	echo "</h3>";
	?>
	</div>
<!--drop down start-->
<div class="list-group  " style="width:15%;margin-top:200px; margin-left:0px;position:fixed;">
    <a href="profile.php" class="list-group-item" style="font-size:25px;" >Home</a>
  <a href="dpt.php" class="list-group-item" style="font-size:25px;">
    Add Department
  </a>
  <a href="employee.php" class="list-group-item" style="font-size:25px;">Add Employee</a>
  <a href="viewemp.php" class="list-group-item" style="font-size:25px;">View Employee</a>
  <a href="addsalary.php" class="list-group-item" style="font-size:25px;">Salary</a>
  <a href="addatt.php" class="list-group-item disabled" style="font-size:25px;" class="color">Attendence</a>
  <a href="viewatt.php" class="list-group-item"  style="font-size:25px;">View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Notification</a>

</div>
</div>
<div class="col-sm-10" style="float:right;min-width:1000px;">
<center>
<h1><Add Attendance/h1>
</center>
</body>
</html>







































</div>