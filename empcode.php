<?php
include("connect.php");
$name=$_POST['name'];
$fname=$_POST['fname'];
$gender=$_POST['a'];
$mobile=$_POST['mobile'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$city=$_POST['city'];
$filename=$_FILES['file']['name'];
$type=$_FILES['file']['type'];
$size=$_FILES['file']['size'];
$tmp_name=$_FILES['file']['tmp_name'];
$location="employee/";
$department=$_POST['Department'];
$email=$_POST['email'];
$password=$_POST['password'];
$query="insert into tbl_employee(name,fname,gender,mobile,dob,address,city,photo,dptid,email,password,date) values('$name','$fname','$gender','$mobile','$dob','$address','$city','$filename','$department','$email','$password',now()) ";
mysql_query($query);
move_uploaded_file($tmp_name,$location.$filename);
header("location:employee.php");

?>