<?php
session_start();

if($_SESSION['email']=="")
{
	session_destroy();
	header("location:index.php?msg=3");
}
include("connect.php");
$query="select * from tbl_employee";
$res=mysql_query($query);
?>
<html>
<head>
<title>MARC|View Employee</title>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>

<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
<div class="row" style="background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">

<div  style="min-width:1000px;margin:15px;">
<div class="list-group  " style="width:15%;margin-top:3px; margin-left:0px;position:absolute;">
    <a href="profile.php" class="list-group-item" style="font-size:20px;background-color:black;opacity:0.5;text-shadow:2px 2px black;color:white;" >Home</a></div>
<h1 style="text-align:center;border:2px solid;padding:5px;background-color:black;text-shadow:2px 2px black;color:white;">View Employee</h1>






<table border="2"   class="table table-hover" style="font-size:17px;text-align:center;">
	<tr style="background-color:black;color:white;">
		<td style="padding:10px;">Sr. No.</td>
		<td style="padding:10px;">Department</td>
		<td style="padding:10px;">Name</td>
		<td style="padding:10px;">Father name</td>
		<td style="padding:10px;">Gender</td>
		<td style="padding:10px;">Email</td>
		
		<td style="padding:10px;">Mobile</td>
		<td style="padding:10px;">DoB</td>
		<td style="padding:10px;">Address</td>
		<td style="padding:10px;">City</td>
		<td style="padding:10px;">Photo</td>
		
		
		<td style="padding:10px;">Date</td>
		<td style="padding:10px;">Delete</td>
	
	</tr>
	
		<?php
	$i=1;
	while($row=mysql_fetch_array($res,MYSQL_BOTH))
	{
		?>
	<tr>
			<td><?php echo $i;?></td>
			<?php $did=$row['dptid']; 
			$query2="select * from tbl_dpt where dptid='$did'";
			$res2=mysql_query($query2);
			if($row2=mysql_fetch_array($res2,MYSQL_BOTH));
			{
				$dname=$row2['department'];
			}
			?>
			<td><?php echo $dname; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['email']; ?></td>
			
			<td><?php echo $row['mobile']; ?></td>
			<td><?php echo $row['dob']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['city']; ?></td>
			<td> <img src="employee/<?php echo $row['photo'];  ?> " height="140px" width="120px"/></td>
			<td><?php echo $row['date']; ?></td>
			<td><a href="delete.php?id=<?php echo $row['dptid'] ?>"><i class="glyphicon glyphicon-remove"></i></a></td>
		
	
	</tr>
	
	<?php
	$i++;
	}
	
?>
	
	</table>
	</div>
	</body>
	</html>