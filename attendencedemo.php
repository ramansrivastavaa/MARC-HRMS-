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
		 if($check==false)
	 {
			echo "<script>alert('sorry attendance already marked');</script>";
			 break;
		}
}
?>

<html>
<head>
<title>MARC|Attendance</title>
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style3.css">    

<link rel="stylesheet" href="css/font-awesome.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
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
	left:30;color:white;">
	
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
  <a href="saldemo.php" class="list-group-item " style="font-size:25px;" >Salary</a>
  <a href="attendencedemo.php" class="list-group-item disabled"style="font-size:25px;" class="color">Attendence</a>
  <a href="viewatt.php" class="list-group-item"  style="font-size:25px;">View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Notification</a>
  <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>
</div>
</div>
</div>
<div class="col-sm-10" style="float:right;">
<center>
<h1 style="text-shadow:2px 2px black;color:white;">Add Attendance</h1>
<h3>Select Department:</h3>
<div >
<select id="sel_dept" onchange="changedept()" class="form-control input-lg">

<option value="">---Select Department---</option>
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
<div class="showdata" style="margin-top:15px;">
	<table border="1" style="border-collapse:collapse;" width="100%" class="table table-striped">
	<thead>
	<tr>
	<th>Sr. No.</th>
	<th>Emp Name</th>
	<th>Department</th>
	<th>Cur Attendance</th>
	<th>Update Attendance</th>
	<th>Date</th>
	<th>Time</th>
	</tr>
	</thead>
	<tbody>
	<?php
	
	$res1=mysql_query("select * from tbl_attendance where date='$set_date'");
	$a=1;
	
	while($row1=mysql_fetch_array($res1,MYSQL_BOTH))
	{
		$empid=$row1['empid'];
	?>
	<tr>
	<td><?php echo $a;?></td>
	<td><?php
	$q_name="select * from tbl_employee where empid='$empid'";
	$res_qname=mysql_query($q_name);
	if($row_qname=mysql_fetch_array($res_qname,MYSQL_BOTH))
	{
		echo $row_qname['name'];
		$dep_id=$row_qname['dptid'];
	}
    ?>  
	</td>
	
	<td>
	<?php
	$q_depid="select * from tbl_dpt where dptid='$dep_id'";
	$res_depid=mysql_query($q_depid);
	if($row_depid=mysql_fetch_array($res_depid,MYSQL_BOTH))
	{
		echo $row_depid['department'];
	}
	else
	{
		mysql_error();
	}
	?>
	</td>
	<td><?php $status=$row1['status'];//echo $status ?>
	<?php
	if($status=="present")
	{ ?>
		<img src="images/bluetick.png" height="20px" width="20px">
	<?php
	}
	else
	{
		?>
		<img src="images/redcross.png" height="20px" width="20px">
	<?php
	}
?>	
	</td>
	<td>
	<?php
	if($status=="absent")
	{
		?>
	<a href="chg_a_p.php?att_id=<?php echo $row1['attd_id']; ?>" style="text-decoration:none;color:blue;">Present</a>
	<?php } 
	else{ ?>
	<a href="chg_p_a.php?att_id=<?php echo $row1['attd_id']; ?>" style="text-decoration:none;color:red;">Absent</a>
	<?php }  ?>
	</td>
	<td><?php echo $row1['date']; ?></td>
	<td><?php echo $row1['time']; ?></td>
	
	
	</tr>
	<?php
	$a++;
	}
	?>
	</tbody>
	</table>
</div>
</center>
</div>
<script>
var sel_dept=document.getElementById("sel_dept");
function changedept()
{
	var dptid=sel_dept.value
	//alert(dptid);
	//now make query string
	//attendencedemo.php?dept_id
	window.location.href='attendencedemo.php?dept_id='+dptid;
}
</script>
</body>
</html>