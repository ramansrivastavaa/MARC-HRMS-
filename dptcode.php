<?php
$n=$_POST['name'];
//echo $n;
mysql_connect("localhost","root","");
mysql_select_db("marc");
$query="insert into tbl_dpt(department,date) values('$n',now())";
mysql_query($query);
header("location:dpt.php");
?>