<?php 
error_reporting(0);

include('db_connect.php');

if(isset($_POST['submit_faculty'])){

$Fm_ID=$_POST['Fm_ID'];
$Fm_Name=$_POST['Fm_Name'];
$Fm_Address=$_POST['Fm_Address'];
$Fm_Designation=$_POST['Fm_Designation'];
$Fm_Salary=$_POST['Fm_Salary'];

$select=mysqli_query($con, "SELECT Fm_ID FROM faculty_members WHERE Fm_ID = '$Fm_ID'");
$rows = mysqli_num_rows($select);

if($rows > 0){
header("location:add_faculty.php");
}

else {

$insert = mysqli_query($con,"INSERT INTO faculty_members 
    ( Fm_ID,  
      Fm_Name,  
      Fm_Address,
      Fm_Salary,
      Fm_Designation)
    Values
    ('$Fm_ID',
     '$Fm_Name',
     '$Fm_Address',
     '$Fm_Salary',
     '$Fm_Designation'
    )");
header("location:index.php");
   }
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Faculty</title>
</head>
<body style=" background-color: lightgray;">
<form method="post" action="#">
	<h1 style="text-align: center;color: green;">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center;">Add Faculty Members </h1>
	<table width="100%" border="1">
		<tr>
		<td>Faculty ID:
			<br>
			<input type="text" name="Fm_ID" style = "width: 500px;" value="<?php echo $Fm_ID; ?>" required></td>
		<td>Faculty Name:
			<br>
			<input type="text" name="Fm_Name" style = "width: 500px;" value="<?php echo $Fm_Name; ?>" required></td>
	</tr>
	<tr>
		<td>Faculty Designation:
			<br>
			<input type="text" name="Fm_Designation" style = "width: 500px;" value="<?php echo $Fm_Designation; ?>" required></td>
		<td>Faculty Salary:
			<br>
			<input type="text" style = "width: 500px;" name="Fm_Salary" value="<?php echo $Fm_Salary; ?>" required></td>
	</tr>
	<tr>
		<td colspan="2">Faculty Address:
			<br>
			<input style = "width: 1000px;" type="text" name="Fm_Address" value="<?php echo $Fm_Address; ?>" required></td>
		
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
			<input type="submit" name="submit_faculty" value="Submit">
		</td>
	</tr>
	</table>
</form>
</body>
</html>