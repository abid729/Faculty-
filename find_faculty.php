<?php 
 error_reporting(0);

include('db_connect.php');

if(isset($_POST['search_faculty'])){
  $Fm_Name     = $_POST['Fm_Name'];
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<title>Search Faculty</title>
</head>
<body style="background-color: lightgray;">
<h1 style="text-align: center;color: green; background-color: lightgray;">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center; background-color: lightgray;"> Faculty Members View </h1>

<table id="table" border="1" width="100%" style=" background-color: lightgray;">
	<tr>
		<th style="text-align:left;">ID</th>
		<th style="text-align:left;">Name</th>
		<th style="text-align:left;">Address</th>
		<th style="text-align:left;">Designation</th>
		<th style="text-align:left;">Salary</th>
		
	</tr>
  <tbody>
			<?php
			$stmt = mysqli_query($con,"SELECT * FROM faculty_members Where Fm_Name = '$Fm_Name'");
			while($row =mysqli_fetch_array($stmt)){
		  $Fm_ID = $row['Fm_ID'];
			$Fm_Name = $row['Fm_Name'];
			$Fm_Address = $row['Fm_Address'];
			$Fm_Salary = $row['Fm_Salary'];
			$Fm_Designation = $row['Fm_Designation'];

				?>
			<tr>
				<td><?php echo $Fm_ID; ?></td>
				<td><?php echo $Fm_Name; ?></td>
				<td><?php echo $Fm_Address; ?></td>
				<td><?php echo $Fm_Designation; ?></td>
				<td><?php echo $Fm_Salary; ?></td>
			
			</tr>
			<?php } ?>
			</tbody>
</table>
</body>
</html>


