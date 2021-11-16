<?php
session_start();


if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
}
$id=$_REQUEST['id'];
include("connect.php");
$query="select * from tbl_dpt where dptid='$id'";
$res=mysql_query($query);
if ($row=mysql_fetch_array($res,MYSQL_BOTH)) {
?>

<html>
<head>
	<title>MARC|Department update</title>
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
  <a href="attendencedemo.php" class="list-group-item"style="font-size:25px;" >Attendence</a>
  <a href="viewatt.php" class="list-group-item"  style="font-size:25px;">View 
   Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Notification</a>
  <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>
</div>
</div>
</div>
		<div class="col-sm-10" style="float:right;">
				<form action="deptedit.php" method="post">
				<div style="height:500px;width:450px;background:rgba(0,0,0,0.5) ;margin-left:450px;margin-top:180px;padding-top:70px;">
					<input type="hidden" name="id" value="<?php echo $row['dptid'];?>">
  					<center>
    				<h1 style="color:white;">Update Department</h1>
    				<br/><br/>
      				<input type="text" name="depart" style="width:390px;" class="form-control" value="<?php echo $row['department'];?>">
    				<br/>
    				<br/>
    				<br/>
  					
  				

      <button type="submit" class="btn btn-primary">Update</button></center>
   </div>
 
				</form>
     </div>
</body>
</html>
<?php
}
?>


