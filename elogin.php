<?php

?>
<html>
<head>
<title>MARC|Employee Login</title>
<link rel="stylesheet" href="css/eloginstyle.css">
</head>
<body style="background-image: linear-gradient(to right, #56f9ff, #2de7ff, #25d3ff, #45beff, #68a7f6);">
<div class="box" style="margin-top:100px;margin-left:400px;">
<form action="elogcode.php" method="post">
<div style="float:left;margin-left:0px;">

</div>
<div style="float:right;margin-top:0px;">

<img src="images/2.jpg" style="clip-path: polygon(73% 0, 38% 0, 100% 100%, 100% 0);height:650px;width:900px;"/>

</div>
<h1 style="position:fixed;top:150;left:900;font-size:60px;color:white;">Welcome<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Back</h1>
<div style="position:fixed;top:140;left:480;">
<h1 style="font-size:60px;">Employee<br/>Log In</h1><br/>
<p>There Is NO End of Power&nbsp;</p><br/><br/><br/>
<input type="email" placeholder="Username" class="txtb" style="outline:none;" name="eemail"><br/><br/><br/>
<input type="password" placeholder="password" style="outline:none;" class="txtb" name="epass"><br/><br/>
<input type="checkbox">Remember Me &nbsp;&nbsp;&nbsp;&nbsp;<a href="eforget.php" class="link">Forgot password?</a><br/>
<br/><a href="index.php"class="link">Admin Login</a><input type="submit" value="LOGIN" class="login" style="outline:none;"><br/>
<p style="color:red;font-size:20px;"><?php
@$msg=$_REQUEST['msg'];
//echo $msg;
if($msg==1)
{
	echo "*invalid email or password";
}
if($msg==2)
{
	echo "*logout successful";
}
if($msg==3)
{
	echo "*first login then access the page";
}
if($msg==4)
{
	echo "*password changed . login again!!";
}
?></p>

</div>
</form>
</div>
</body>
</html>