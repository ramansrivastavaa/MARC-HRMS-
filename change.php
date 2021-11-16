<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
}
?>
<html>
<head>

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
<body style="background-image:url('images/em2.jpg');width:100%; background-size:100% 100%" >
<div class="row">
<div class="col-sm-2" style="float:left;height:100%;position:fixed;background:rgba(0,0,0,0.5) ;">
<img alt="Brand" src="images/logo.jpg" style="position:absolute; top:14; left:21%;">
<div style="position:absolute;top:70; left:30;color:yellow;">
	
	<?php
	echo "<h3>";
	echo $_SESSION['email'];
	echo "</h3><center>";
	echo date("d/m/y");
	echo "</center>";
	?>
	</div>
<!--drop down start-->
<!--drop down start-->
<div class="list-group  " style="margin-top:200px;width:280px; margin-left:-10px;position:fixed; ">
   <a href="profile.php" class="list-group-item" style="font-size:25px;" >Home</a>
  <a href="dpt.php" class="list-group-item "  style="font-size:25px;">
    Add Department
  </a>
  <a href="employee.php" class="list-group-item" style="font-size:25px;">Add Employee</a>
  <a href="viewemp.php"a  style="font-size:25px;" class="list-group-item">View Employee</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Salary</a>
  <a href="addnoti.php" class="list-group-item"style="font-size:25px;">Attendence</a>
  <a href="viewatt.php" class="list-group-item " class="color" style="font-size:25px;">View Attendence</a>
  <a href="leaves.php" class="list-group-item" style="font-size:25px;">Leaves</a>
  <a href="addnoti.php" class="list-group-item" style="font-size:25px;">Notification</a>
  <a href="logout.php" class="list-group-item" style="font-size:25px;">logout</a>
</div>
</div>
<div class="col-sm-10">
</div>
<form action="changecode.php" method="post" class="form-horizontal" id="reg_form">
<div class="row" style="height:500px;width:700px;margin-top:130px;padding:110px;padding-top:9%;margin-left:38%;background-color:black;opacity:0.8;" >
<div class="form-group" style="margin-left:100px;margin-top:-70px;">
<h1 style="color:white; font-size:40px;">Change Password</h1></div>
<div class="form-group">
        <label class="col-md-4 control-label" style="color:white;">Old Password</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input  name="op" placeholder="Old Password" class="form-control"  type="password">
          </div>
        </div>
      </div>
	  <div class="form-group">
        <label class="col-md-4 control-label" style="color:white;">New Password</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input  name="np" placeholder="New Password" class="form-control"  type="password">
          </div>
        </div>
      </div>
	  <div class="form-group">
        <label class="col-md-4 control-label" style="color:white;">Confirm New Password</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input  name="cp" placeholder="Confirm New Password" class="form-control"  type="password">
          </div>
        </div>
      </div>
	   <div class="form-group">
	  <input class="btn btn-default" type="submit" value="Change Password" style="margin-left:230px;">
	  </div>
	  </div>

</div>
</form>
</body>
</html>