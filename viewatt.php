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
	//echo "connection created";
}
else{
	echo "error";
	die();
	

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
}
}
date_default_timezone_set("Asia/Kolkata");
$set_date=date('d-m-Y');
//echo $set_date;
$set_time=date('h:i:s');
//echo $set_time;
@$dept_id=$_REQUEST['dept_id'];
//echo $dept_id;
//code for getting the records of all employees whose department is select
$query_info="select * from tbl_employee where dptid='$dept_id'";
$res_info=mysql_query($query_info);
while($row_info=mysql_fetch_array($res_info,MYSQL_BOTH))
{
		//print_r($row_info);
		//empid	
		$empid=$row_info['empid'];
		$insert="insert into tbl_attendance(empid,date,time) values ('$empid','$set_date','$set_time')";
		$check=mysql_query($insert);
	
		//exception handling
		
}
?>
<html>
<head>
<title>MARC|View Attendance</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
.showdata{
	height:auto;
	width:100%;
	
}
th{
	background-color:black;
	color:white;
	font-family:rockwell;
}
table{
	cursor:not-allowed;
	
}

</style>
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
  <a href="dpt.php" class="list-group-item "  style="font-size:25px;">
    Add Department
  </a>
  <a href="employee.php" class="list-group-item" style="font-size:25px;">Add Employee</a>
  <a href="viewemp.php"  style="font-size:25px;" class="list-group-item">View Employee</a>
  <a href="saldemo.php" class="list-group-item" style="font-size:25px;">Salary</a>
  <a href="attendencedemo.php" class="list-group-item"style="font-size:25px;">Attendence</a>
  <a href="viewatt.php" class="list-group-item disabled" class="color" style="font-size:25px;">View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Notification</a>
  <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>
</div>
</div>
<div class="col-sm-10" style="float:right;">
<center>
<h1 style="text-shadow:2px 2px black;color:white;">
View Attendence</h1>
<div >
<select id="sel_dept" class="form-control" onchange="changedept()" style="margin-top:15px;">

<option value="">Select Department</option>
<?php
$q_dept="select * from tbl_dpt";
$res_dept=mysql_query($q_dept);
while($row_dept=mysql_fetch_array($res_dept,MYSQL_BOTH))
{
?>
<option value="<?php echo $row_dept['dptid']; ?>"><?php
echo $row_dept['department'];

?></option>
<?php
}
?>
</select>
</div>
<div class="showdata" style="margin-top:17px;">
	<table border="1" style="border-collapse:collapse;" width="100%" class="table table-hover" >
	<thead>
	<tr>
	<th>Sr. No.</th>
	<th>Employee Name</th>
	<th>Department</th>
	<th>Status</th>
	
	<th>Date</th>
	<th>Time</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$query_info="select * from tbl_employee where dptid='$dept_id'";
	$res_info=mysql_query($query_info);
	$a=1;
	while($row_info=mysql_fetch_array($res_info,MYSQL_BOTH))
	{
		$empid=$row_info['empid'];
		$det=$row_info['dptid'];
		//echo $empid;
		$query_att="select * from tbl_attendance where empid='$empid'";
		$res_att=mysql_query($query_att);
		while($row_att=mysql_fetch_array($res_att,MYSQL_BOTH))
		{
		?>
<tr>
	<td><?php echo $a; ?></td>
	<td><?php 
$empid=$row_att['empid'];
$query_empname="select * from tbl_employee where empid='$empid'";
$res_empname=mysql_query($query_empname);	
if($row_empname=mysql_fetch_array($res_empname,MYSQL_BOTH))
{
	echo $row_empname['name'];
	$dptm_id=$row_empname['dptid'];
	//echo $empid;
}	
	?></td>
	<td>
	<?php 
$q_query="select * from tbl_dpt where dptid='$det'";
$resq_query=mysql_query($q_query);	
if($rowq_query=mysql_fetch_array($resq_query,MYSQL_BOTH))
{
	echo $rowq_query['department'];
}	
	?>
	
	</td>
	<td><?php echo $row_att['status']; ?></td>
	<td><?php echo $row_att['date']; ?></td>
	<td><?php echo $row_att['time']; ?></td>

</tr>		
		
		
		
		
	<?php
	$a++;
		}
	
	}
	?>
	</tbody>
	</table>
</div>
</center>
</div>
</div>
<script>
var sel_dept=document.getElementById("sel_dept");
function changedept()
{
	var dptid=sel_dept.value
	//alert(dptid);
	//now make query string
	//attendencedemo.php?dept_id
	window.location.href='viewatt.php?dept_id='+dptid;
}
</script>
</body>
</html>