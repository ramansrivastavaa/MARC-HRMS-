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
$email=$_SESSION['email']; 
$query="select * from tbl_employee where email='$email'";
$res=mysql_query($query);
$emailp=$_SESSION['email'];
$queryp="select * from tbl_employee where email='$email'";
$resp=mysql_query($queryp);
if($row=mysql_fetch_array($res,MYSQL_BOTH))
{

?>
<html>
<head>
<title>MARC|Employee Update</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
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
	while($rowp=mysql_fetch_array($resp,MYSQL_BOTH))
	{
	?>
	<td><img src="employee/<?php echo $rowp['photo']; } ?>" style="position:absolute; top:0; left:0;height:100px;width:100px;border-radius:50px;"/></td>
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
  <li role="presentation"><a href="ask.php">Ask for Leave</a></li>
  <li role="presentation"><a href="myleave.php">My Leaves</a></li>
  <li role="presentation"><a href="mysalary.php">My Salary</a></li>
  <li role="presentation"><a href="myattendance.php">My Attendence</a></li>
  <li role="presentation" class="active"><a href="eupdate.php">Update Profile</a></li>
  <li role="presentation"><a href="echange.php">Change Password</a></li>
 
  <li role="presentation"><a href="elogout.php">Logout</a></li>
</ul></div>	
	</div>
	
	<div class="col-sm-10"  style="padding:0;background-image:url(images/em2.jpg);height:100%;background-size:100% 100%;padding-top:120px;">
  <form class="form-horizontal" action="eupcode.php" method="post" >
    <fieldset>
      
      <!-- Form Name -->
      <legend> <h1 style="color:orange;text-align:center;font-size:40px;">Update Information </h1></legend>
    
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="name" value="<?php echo $row['name']; ?>" class="form-control"  type="text">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label" >Father Name</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input name="fname" value="<?php echo $row['fname']; ?>" class="form-control"  type="text">
          </div>
        </div>
      </div>
       <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label">Gender</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
           &nbsp; <input name="a" value="male" <?php if($row['gender']=='male'){ ?> checked <?php }?> type="radio">male
            <input name="a"  value="female" <?php if($row['gender']=='female'){ ?> checked <?php }?> type="radio">Female
          </div>
        </div>
      </div>
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Phone</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="mobile" value="<?php echo $row['mobile']; ?>" class="form-control" type="text">
          </div>
        </div>
      </div> 

 <!-- Text input-->
	  <div class="form-group">
        <label class="col-md-4 control-label">DOB</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <input name="dob" value="<?php echo $row['dob']; ?>" class="form-control" type="date">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">Address</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="address" value="<?php echo $row['address']; ?>" class="form-control" type="text">
          </div>
        </div>
      </div>
      
      <!-- Text input-->
      
      <div class="form-group">
        <label class="col-md-4 control-label">City</label>
        <div class="col-md-6  inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
            <input name="city" value="<?php echo $row['city']; ?>" class="form-control"  type="text">
          </div>
        </div>
      </div>
	    <!-- Text input-->
     
     <div class="form-group">
        <label class="col-md-4 control-label"></label>
        <div class="col-md-4">
          <button type="submit" class="btn btn-warning" >Update <span class="glyphicon glyphicon-send"></span></button>
        </div>
      </div>
     
</fieldset>      
      <!-- Text input-->
</form>
<?php
}
?>
</div>
</body>
</html>