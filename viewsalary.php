<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
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
?>

<html>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>






<style>
.showdata{
	height:auto;
	width:100%;
	border:3px solid black;
}
th{
	background-color:black;
	color:white;
	font-family:rockwell;
}
table{
	cursor:not-allowed;
	
}
tr:nth-child(odd){
	background-color:lightgrey;
}
</style>
</head>
<body style="background-image: linear-gradient(to right top, #76ebeb, #58ddf6, #52cdfd, #68bafd, #89a5f3);">
<div class="list-group  " style="width:15%;margin-top:10px; margin-left:10px;position:absolute;">
    <a href="saldemo.php" class="list-group-item" style="font-size:20px;background-color:lightgrey;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Back</a></div>
	<div class="list-group  " style="width:15%;margin-top:10px; margin-left:83%;position:absolute;">
    <a href="profile.php" class="list-group-item" style="font-size:20px;background-color:lightgrey;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home</a></div>
<center>

<div  class="row" style="height:70px;width:100%;border:3px solid;background-color:white;padding:1px;">
<h1 >Bulk Salary</h1>
</div>

<div class="showdata" style="margin-top:10px;">
	<table border="1" style="border-collapse:collapse;" width="100%" class="table table-hover">
	<thead> 
	<tr>
	<th>sr no</th>
	<th>emp name</th>
	<th>department</th>
	<th>Basic Salary</th>
	
	<th>Calculate($)</th>

	</tr>
	</thead>
	<tbody>
	<?php
	$query1="select * from tbl_salary";
	$res1=mysql_query($query1);
	$a=1;
	while($row1=mysql_fetch_array($res1,MYSQL_BOTH))
	{
		//print_r($row1);
		//Array
//create a local varible for further use		
		$sal_id=$row1['sal_id'];
		$dptid=$row1['dptid'];
		$paygrade=$row1['paygrade'];
		$basic=$row1['basic'];
		//echo $sal_id;
		//echo $dptid;
		//echo $paygrade;
		 //echo $basic;
		 $query2="select * from tbl_employee where dptid='$dptid'";
		 $res2=mysql_query($query2);
		 while($row2=mysql_fetch_array($res2,MYSQL_BOTH))
		 {
			//print_r($row2); 
		
			
			//[empid][name][dptid]
			//echo $row2['empid'];
			//echo $row2['name'];
			//echo $row2['dptid'];
			$empid=$row2['empid'];
			$name=$row2['name'];
			$dpid=$row2['dptid'];
			//now make a query to get department
			$query3="select * from tbl_dpt where dptid='$dpid'";
			$res3=mysql_query($query3);
			if($row3=mysql_fetch_array($res3,MYSQL_BOTH))
			{
				$deptname=$row3['department'];
				//echo $deptname;
				
			}
			?>
			<tr>
				<td><?php echo $a; ?></td>
				<td><?php echo $name; ?></td>
				<td><?php echo $deptname; ?></td>
				<td><?php echo $basic; ?></td>
				<td><a href="calcsalary.php?empid=<?php echo $empid;  ?>&dept_id=<?php echo $dpid; ?>&paygrade=<?php echo $paygrade; ?>">Calculate</a></td>
			</tr>
			
			<?php
		$a++; }//inner while 	
		
	}//outer while
	

	?>	
	
	
	
	
	
	
	
	</tbody>
	</table>
</div>
</center>

</body>
</html>