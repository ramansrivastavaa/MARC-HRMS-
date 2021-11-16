<?php
$id=$_POST['id'];
$dept=$_POST['depart'];


mysql_connect("localhost","root","");
mysql_select_db("marc");
$query="update tbl_dpt set department='$dept' where dptid='$id'";
mysql_query($query);
header("Location:dpt.php");
?>