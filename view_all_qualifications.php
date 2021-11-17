<?php 
  error_reporting(0);
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
<h1 style="text-align: center;">View All Qualifications</h1>

<table id="table" border="1" width="100%">
	<tr>
		<th style="text-align:left;">ID</th>
		<th style="text-align:left;">Title</th>
		<th style="text-align:left;">Passing Year</th>
		<th style="text-align:left;">Institute</th>
		
	</tr>
  <tbody>
			<?php
			$stmt = mysqli_query($con,"SELECT * FROM qualification");
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
				</tr>
			<?php } ?>
			</tbody>
</table>
</body>
</html>


