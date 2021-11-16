<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:elogin.php?msg=3");
}
session_start();

session_destroy();
header("location:elogin.php?msg=2");
?>