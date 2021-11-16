<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php");
}
include("connect.php");
$email=$_SESSION['email'];
$query="select * from tbl_employee where email='$email'";
$res=mysql_query($query);


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

</head>
<body style="background-image: linear-gradient(to right, #56f9ff, #2de7ff, #25d3ff, #45beff, #68a7f6);">
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
	left:55;color:yellow;">
	
	<?php
	echo "<h4>";
	echo $_SESSION['email'];
	echo "</h4>";
	?>
	</div>
	<div class="row"  style="width:100%;margin-top:55px;margin-left:90px;color:yellow;">
	<?php
	echo date("d/m/y");
	?>
	</div>
	</div>
	<div style="margin-top:80px;">
	<ul class="nav nav-pills nav-stacked">
   <li role="presentation" ><a href="eprofile.php">Home</a></li>
  <li role="presentation"><a href="ask.php">Ask for Leave</a></li>
  <li role="presentation"><a href="myleave.php">My Leaves</a></li>
  <li role="presentation"><a href="mysalary.php">My Salary</a></li>
  <li role="presentation"><a href="myattendance.php">My Attendence</a></li>
  <li role="presentation"><a href="eupdate.php">Update Profile</a></li>
  <li role="presentation" class="active"><a href="echange.php">Change Password</a></li>
 
  <li role="presentation"><a href="elogout.php">Logout</a></li>
</ul></div>	
	</div>
	
	<div class="col-sm-10" style="background:rgba(0,0,0,0.5);background-image:url(images/em.jpg);height:100%;padding:0px;background-size:100% 100%;">
<form action="echangecode.php" method="post" class="form-horizontal" id="reg_form">
<div class="row" style="height:500px;width:700px;margin-top:130px;padding:110px;padding-top:9%;margin-left:24%;background-color:black;opacity:0.8;" >
<div class="form-group" style="margin-left:100px;margin-top:-70px;">
<h1 style="color:orange;text-align:center;font-size:40px;margin-left:-80px;">Change Password</h1></div>
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


</form>
</body>
</html>