<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:elogin.php?msg=3");
}
include("connect.php");
$email=$_SESSION['email'];
$query="select * from tbl_employee where email='$email'";
$res=mysql_query($query);
?>
<html>
<head>
<title>MARC|Employee Profile</title>

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

</style> 
    
      
    
</head>
<body   style="background-image: linear-gradient(to right, #56f9ff, #2de7ff, #25d3ff, #45beff, #68a7f6);">




<div class="col-sm-2" style="background:rgba(0,0,0,0.8) ;height:100%;">
<div class="row" style="height:150px;">
<div style="width:100px;
	height:100px;
	background-color:white;
	border-radius:50px;
	position:absolute;
	top:40;
	left:80;">
	<table>
	<?php
	while($row=mysql_fetch_array($res,MYSQL_BOTH))
	{
	?>
	<td><img src="employee/<?php echo $row['photo'];  ?>" style="position:absolute; top:0; left:0;height:100px;width:100px;border-radius:50px;"/></td>
	
	</table>
	</div>
	
</div>
<div class="row" >
<div style="position:absolute;
	top:150;
	left:55;color:white;">
	
	<?php
	echo "<h4>";
	echo $_SESSION['email'];
	echo "</h4>";
	?>
	</div>
	<div class="row"  style="width:100%;margin-top:55px;margin-left:90px;color:white;">
	<?php
	echo date("d/m/y");
	?>
	</div>
	</div>
	<div style="margin-top:80px;">
	<ul class="nav nav-pills nav-stacked">
   <li role="presentation" class="active"><a href="eprofile.php">Home</a></li>
  <li role="presentation"><a href="ask.php">Ask for Leave</a></li>
  <li role="presentation"><a href="myleave.php">My Leaves</a></li>
  <li role="presentation"><a href="mysalary.php">My Salary</a></li>
  <li role="presentation"><a href="myattendance.php">My Attendence</a></li>
  <li role="presentation"><a href="eupdate.php">Update Profile</a></li>
  <li role="presentation"><a href="echange.php">Change Password</a></li>
 
  <li role="presentation"><a href="elogout.php">Logout</a></li>
</ul></div>	
	</div>
	
	
	<div class="col-sm-10" style="background:rgba(0,0,0,0.5);background-image:url(images/em.jpg);height:100%;padding:0px;background-size:100% 100%;">
	<nav class="navbar navbar-inverse"width="100%" style="opacity:0.6;" >
  <img src="images/logo.jpg"/>
   <h3 style="color:white;display:inline;font-size:37px;"><span style="padding-top:15px;font-size:50px; margin-left:150px;">Marc Laboratories Pvt. Ltd. Lucknow</span></h3>
  </nav>
  <div style="background:rgba(0,0,0,0.5);">
 <center><h2 style="color:orange;text-align:center;font-size:40px;">NOTICE</h2></center>
 <marquee style="color:white;"><h2><?php 
 $querym="select * from tbl_noti order by notid desc limit 0,2";
 $rnoti=mysql_query($querym);
 if($rown=mysql_fetch_array($rnoti,MYSQL_BOTH))
 {
	 echo $rown['notice'];
 }
 ?></h2></marquee>
 </div>
  <div style="height:450px;width:300px;background:rgba(0,0,0,0.5);margin-left:1100px;margin-top:100px;color:white;padding-top:10px;">
  <center>
  <h1>Details</h1>
  <h3>Name:<?php echo $row['name'];  ?></h3>
  <h3>Father Name:<?php echo $row['fname'];  ?></h3>
  <h3>DoB:<?php echo $row['dob'];  ?></h3>
  <h3>Mobile:<?php echo $row['mobile'];  ?></h3>
  <h3>City:<?php echo $row['city'];  ?></h3>
  </center>
  
  
  </div>
   <div style="height:400;width:700px;margin-left:100px;margin-top:-400px;">
  <h1 style="font-size:90px;color:orange;">MARC</h1>
  <img src="images/as.png" style="width:500px;">
  </div>
	</div>
	<?php
	}
	?>
</body>
</html>