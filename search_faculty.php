<?php 
 error_reporting(0);

include('db_connect.php');


 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Faculty</title>
</head>
<body style="background-color: lightgray;">
<form method="post" action="find_faculty.php">
	<h1 style="text-align: center;color: green;">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center;">Search Faculty Members </h1>
	<table width="100%" border="1">
		<tr>
	Faculty Name:
			<br>
			<input type="text" name="Fm_Name" style = "width: 500px;" value="<?php echo $Fm_Name; ?>" required></td>
	</tr>
	
	<tr>
		<td>
			<input type="submit" name="search_faculty" value="Submit">
		</td>
	</tr>
	</table>
</form>
</body>
</html>