<?php 
  error_reporting(0);
	$page_title = $_GET['page_title'];
	$page = explode(",",$page_title);
	$page_title_id  = $page[0];
	$page_id    = $page[1];
	include('db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/font-awesome-ie7.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<title>View Qualification</title>
</head>
<body style="background-color: lightgray;">
<h1 style="text-align: center;color: green;">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center;">View Faculty Members Qualification</h1>
<a href="add_qualification.php?page_title=<?php echo "add_qualification".",".$page_id?>"> Add New Qualification</a>
<table id="table" border="1" width="100%">
	<tr>
		<th style="text-align:left;">ID</th>
		<th style="text-align:left;">Title</th>
		<th style="text-align:left;">Passing Year</th>
		<th style="text-align:left;">Institute</th>
		<th style="text-align:left;">Action</th>
	</tr>
  <tbody>
			<?php
			$stmt = mysqli_query($con,"SELECT * FROM qualification WHERE Q_ID = '$page_id' ");
			while($row =mysqli_fetch_array($stmt)){
		  $Q_ID = $row['Q_ID'];
			$Degree_title = $row['Degree_title'];
			$Year_of_Passing = $row['Year_of_Passing'];
			$Institute_attended = $row['Institute_attended'];
    ?>
			<tr>
				<td><?php echo $Q_ID; ?></td>
				<td><?php echo $Degree_title; ?></td>
				<td><?php echo $Year_of_Passing; ?></td>
				<td><?php echo $Institute_attended; ?></td>
			 	<td>
					<!-- <a href="edit_qualification.php?page_title=<?php echo "edit_qualification".",".$Q_ID.",".$Degree_title?>"><i class="fa fa-edit"></i></a> -->
					<a href="delete_qualification.php?page_title=<?php echo "delete_qualification".",".$Q_ID.",".$Degree_title?>">Delete</a>
				</td> 
			</tr>
			<?php } ?>
			</tbody>
</table>
</body>
</html>


