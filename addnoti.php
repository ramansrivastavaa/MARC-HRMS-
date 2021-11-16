<?php
session_start();


if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
}
include("connect.php");
$query="select * from tbl_employee";
$res=mysql_query($query);
?>
<html>
<head>
<title>MARC|Notifications</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
<div class="col-sm-2" style="float:left;height:100%;position:fixed;background:rgba(0,0,0,0.5) ;">
<img alt="Brand" src="images/logo.jpg" style="position:absolute; top:14; left:21%;">
<div style="position:absolute;
	top:90;
	left:30;color:yellow;">
	
	<?php
	echo "<h3>";
	echo $_SESSION['email'];
	echo "</h3><center>";
	echo date("d/m/y");
	echo "</center>";
	?>
	
	
	</div>
<!--drop down start-->
<div class="list-group  " style="width:16%;margin-top:260px; margin-left:-10px;position:fixed;">
    <a href="profile.php" class="list-group-item" style="font-size:25px;" >Home</a>
  <a href="dpt.php" class="list-group-item" style="font-size:25px;">
    Add Department
  </a>
  <a href="employee.php" class="list-group-item" style="font-size:25px;">Add Employee</a>
  <a href="viewemp.php" class="list-group-item" style="font-size:25px;">View Employee</a>
  <a href="addsalary.php" class="list-group-item" style="font-size:25px;">Salary</a>
  <a href="addatt.php" class="list-group-item" style="font-size:25px;" >Attendence</a>
  <a href="viewatt.php" class="list-group-item"  style="font-size:25px;" >View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item disabled" class="color" style="font-size:25px;">Notification</a>
  <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>
</div>
</div>
<div class="col-sm-10" style="float:right;min-width:1000px;">
<form action="noticode.php" method="post">
<div style="height:200px;width:400px;margin-left:450px;">
<center><h1>Add Notice<h1><textarea name="notice" class="form-control" rows="3"></textarea><br/>
<input type="submit"  class="btn btn-primary"></center>
</div>
</form>
<table border="2" class="table">
<h1>All Notifications</h1>
<tr class="active">
<th>Notice Id</th>
<th>Notification</th>
<th>Date</th>
<th>Delete</th>
</tr>
<?php
$queryl="select * from tbl_noti";
$resl=mysql_query($queryl);
while($rowl=mysql_fetch_array($resl,MYSQL_BOTH))
{
	?>
	<tr>
	<td><?php echo $rowl['notid']; ?></td>
	<td><?php echo $rowl['notice']; ?></td>
	<td><?php echo $rowl['date']; ?></td>
	<td><a href="delnoti.php?id=<?php echo $rowl['notid']; ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
	</tr>
	<?php
}
?>
</table>
</div>
</body>
</html>