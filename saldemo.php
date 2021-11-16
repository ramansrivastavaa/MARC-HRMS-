<?php
session_start();
if($_SESSION['email']=="")
{
	session_destroy();
	header("location:elogin.php?msg=3");
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
?>
<html>
<head>
<title>MARC|Salary</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
.inbox{
	height:600px;
	width:500px;
	//background-color:black;
	//opacity:0.6;
	color:white;
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
  <a href="dpt.php" class="list-group-item" style="font-size:25px;">
    Add Department
  </a>
  <a href="employee.php" class="list-group-item" style="font-size:25px;">Add Employee</a>
  <a href="viewemp.php" class="list-group-item" style="font-size:25px;">View Employee</a>
  <a href="saldemo.php" class="list-group-item disabled" style="font-size:25px;" class="color">Salary</a>
  <a href="attendencedemo.php" class="list-group-item"style="font-size:25px;">Attendence</a>
  <a href="viewatt.php" class="list-group-item"  style="font-size:25px;">View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Notification</a>
  <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>
</div>
</div>







<div class="col-sm-10" style="float:right;margin-left:38%;margin-top:10%;height:100%;width:700px;position:fixed;">
<div class="inbox">
<center>
<h1 style="text-shadow:2px 2px black;color:white;">Add Salary</h1>
<form action="sal_code.php" method="post">
<h3 style="color:#3c763d;">Select Department</h3><select name="dept_id" class="form-control input-lg">
<option value="">--select--</option>
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
</select><br/>


<div class="form-group has-success">
  <label class="control-label" for="inputSuccess1"><h2>Paygrade</h2></label>
  <input type="text" name="paygrade" placeholder="Enter the Paygrade of Department in .00INR" class="form-control" id="inputSuccess1" aria-describedby="helpBlock2">
  <span id="helpBlock2" class="help-block">Enter the Paygrade of Department in .00INR</span><br/>
</div>




<input type="submit" value="Add Paygrade" class="btn btn-primary btn-lg btn-block"/>
<a href="viewsalary.php" class="btn btn-primary btn-lg btn-block">View Salary</a>
</form>
</center>
</div>
</div> 
</body>
</html>