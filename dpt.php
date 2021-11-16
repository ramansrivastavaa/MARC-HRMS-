<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
}
include("connect.php");
$query="select * from tbl_dpt";
$res=mysql_query($query);

?>
<html>
<head>
<title>MARC|Department</title>
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
  <a href="dpt.php" class="list-group-item disabled" class="color" style="font-size:25px;">
    Add Department
  </a>
  <a href="employee.php" class="list-group-item" style="font-size:25px;">Add Employee</a>
  <a href="viewemp.php"  style="font-size:25px;" class="list-group-item">View Employee</a>
  <a href="saldemo.php" class="list-group-item" style="font-size:25px;">Salary</a>
  <a href="attendencedemo.php" class="list-group-item"style="font-size:25px;">Attendence</a>
  <a href="viewatt.php" class="list-group-item"  style="font-size:25px;">View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Notification</a>
   <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>

</div>
</div>
<div class="col-sm-10" style="float:right;">
<form action="dptcode.php" method="post">
<div class="form-group" style="border:2px solid;">
    <h1 style="text-align:center;padding:5px;">Add Department:</h1>
   <center> <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Add department" style="width:600px;">
 <br/>
 <button type="submit" class="btn btn-primary btn-lg btn-block" value="Add" style="width:400px;">ADD</button></center><br/> </div>
<h1 style="text-align:center;border:2px solid;padding:5px;">Department Details:</h1>
</form>
<table border="1" class="table table-hover">
	<tr class="active">
		<td>Sr. No.</td>
		<td>Depid</td>
		<td>Department</td>
		<td>Date</td>
		<td>Delete</td>
		<td>Update</td>
	</tr>
	<?php
	$i=1;
	while($row=mysql_fetch_array($res,MYSQL_BOTH))
	{
		?>
	<tr>
			<td><?php echo $i;?></td>
			<td><?php echo $row['dptid']; ?></td>
			<td><?php echo $row['department']; ?></td>
			<td><?php echo $row['date']; ?></td>
			<td><a href="delete.php?id=<?php echo $row['dptid'] ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
			<td><a href="update.php?id=<?php echo $row['dptid'] ?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
	</tr>
	<?php
	$i++;
	}
	
?>
	</table>
	</div>
	
	</body>
	</html>