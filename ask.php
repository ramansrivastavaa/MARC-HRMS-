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
<title>MARC|Ask For Leave</title>
<link rel="stylesheet" href="css.css">
<link type="text/css" rel="stylesheet" href="style3.css">    

<link rel="stylesheet" href="css/font-awesome.min.css">

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
</head>
<body style="background-image: linear-gradient(to right, #56f9ff, #2de7ff, #25d3ff, #45beff, #68a7f6);" >



<div class="col-sm-2" style="background:rgba(0,0,0,0.8) ;height:100%;">
<div class="row" style="height:150px;">
<div style="width:100px;
	height:100px;
	background-color:white;
	border-radius:50px;
	position:absolute;
	top:40;
	left:80;"><table>
	<?php
	while($row=mysql_fetch_array($res,MYSQL_BOTH))
	{
	?>
	<td><img src="employee/<?php echo $row['photo']; } ?>" style="position:absolute; top:0; left:0;height:100px;width:100px;border-radius:50px;"/></td>
	<?php
	
	?>
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
   <li role="presentation" ><a href="eprofile.php">Home</a></li>
  <li role="presentation"><a href="ask.php" class="color" >Ask for Leave</a></li>
  <li role="presentation"><a href="myleave.php">My Leaves</a></li>
  <li role="presentation"><a href="mysalary.php">My Salary</a></li>
  <li role="presentation"><a href="myattendance.php">My Attendence</a></li>
  <li role="presentation"><a href="eupdate.php">Update Profile</a></li>
  <li role="presentation"><a href="echange.php">Change Password</a></li>
 
  <li role="presentation"><a href="elogout.php">Logout</a></li>
</ul></div>	
	</div>
	<div class="col-sm-10" style="padding:0;background-image:url(images/em2.jpg);height:100%;background-size:100% 100%;">
	<center>
	
	
	<div style="margin-top:80px;margin-left:-50px;background:rgba(0,0,0,0.5);height:600;width:550px;padding-top:120px;color:white;">

<form method="post" action="askcode.php" class="form-horizontal">
<h1 style="color:orange;text-align:center;font-size:40px;">Ask For Leave</h1><br/><br/>
 <div class="form-group">
        <label class="col-md-4 control-label">Date From:</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input name="dfrom"  class="form-control" type="date">
          </div>
        </div>
      </div>
<div class="form-group">
        <label class="col-md-4 control-label">Date To:</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input name="dto"  class="form-control" type="date">
          </div>
        </div>
      </div>
	  
  <div class="form-group" style="width:300px;">
    <label for="exampleFormControlTextarea1"><h3>Reason</h3></label>
    <textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

 <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
          <button type="submit" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
        </div></div>
      </div></center>
</form>
</div>
</body>
</html>