<?php
$id=$_REQUEST['id'];
echo $id;
mysql_connect("localhost","root","");
mysql_select_db("marc");
$query="delete from tbl_dpt where dptid='$id'";
mysql_query($query);
header("location:dpt.php");
?>