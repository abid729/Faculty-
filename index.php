<?php 
 error_reporting(0);

include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/font-awesome-ie7.min.css">

	<title>Home</title>
</head>
<body style="background-color: lightgray;">
<h1 style="text-align: center;color: green; ">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center; background-color: lightgray;">View Faculty Members </h1>
<a href="add_faculty.php"> Add New Faculty</a>
<a href="search_faculty.php"> Search Faculty</a>
<a href="view_all_qualifications.php">View All Qualifications</a>
<table id="table" border="1" width="100%" style=" background-color: lightgray;">
	<tr>
		<th style="text-align:left;">ID</th>
		<th style="text-align:left;">Name</th>
		<th style="text-align:left;">Address</th>
		<th style="text-align:left;">Designation</th>
		<th style="text-align:left;">Salary</th>
		<th style="text-align:left;">Action</th>
	</tr>

  <tbody>
			<?php
			$xyz = mysqli_query($con,"SELECT * FROM faculty_members");
			
			while($r =mysqli_fetch_array($xyz)){
		  $Fm_ID = $r['Fm_ID'];
			$Fm_Name = $r['Fm_Name'];
			$Fm_Address = $r['Fm_Address'];
			$Fm_Salary = $r['Fm_Salary'];
			$Fm_Designation = $r['Fm_Designation'];

				?>
			<tr>
				<td><?php echo $Fm_ID; ?></td>
				<td><?php echo $Fm_Name; ?></td>
				<td><?php echo $Fm_Address; ?></td>
				<td><?php echo $Fm_Designation; ?></td>
				<td><?php echo $Fm_Salary; ?></td>
				<td>
					<a href="edit_faculty.php?page_title=<?php echo "edit_faculty".",".$Fm_ID?>">Edit</a>
					<a href="view_qualification.php?page_title=<?php echo "view_qualification".",".$Fm_ID?>">Qualification</a>
					<a href="delete_faculty.php?page_title=<?php echo "delete_facutly".",".$Fm_ID?>">Delete</a>
				</td>
			</tr>
			<?php } ?>
			</tbody>
</table>
</body>
</html>


