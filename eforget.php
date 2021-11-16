<?php
include("connect.php");
$msg=$_REQUEST;
if($msg==1)
{
	echo "Password is successfully send on your ragisterd number";
}
?>
<html>
<head>
<style>


.divya
{
	height:300px;
	width:500px;
	margin-top:20px;
	background-color:#7e57c2;
	margin:20px auto auto 400px; 
	
}
body
{
	margin:0px;
	padding:0px;
	background-color:#13262e;
}
</style>
</head>
<body bgcolor ="skyblue">
<div class="divya">
<table align="center">
<form action="forgotcode.php" method="post">

<tr><td>
<input type="number" class="txt" placeholder="Enter your Ragisterd number" name="mobile" style="height:35px;width:250px; margin-top:100px;"/></td></tr>
<tr><td>
<input type="submit" value="Send your password" style="margin-left:0px;height:30px;width:250px; background-color:#13262e;color:white;border:none;"/></td></tr>
</div>
</table>
</body>
</html>

















