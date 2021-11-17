<?php 
error_reporting(0);
     $page_title = $_GET['page_title'];
     $page = explode(",",$page_title);
     $page_title_id  = $page[0];
     $page_id    = $page[1];
     
include('db_connect.php');

$stmt = mysqli_query($con,"SELECT * FROM faculty_members WHERE Fm_ID = '$page_id'");
			$row =mysqli_fetch_array($stmt);
		  $Fm_ID = $row['Fm_ID'];
			$Fm_Name = $row['Fm_Name'];
			$Fm_Address = $row['Fm_Address'];
			$Fm_Salary = $row['Fm_Salary'];
			$Fm_Designation = $row['Fm_Designation'];
	


if(isset($_POST['submit_faculty'])){

$Fm_ID=$_POST['Fm_ID'];
$Fm_Name=$_POST['Fm_Name'];
$Fm_Address=$_POST['Fm_Address'];
$Fm_Designation=$_POST['Fm_Designation'];
$Fm_Salary=$_POST['Fm_Salary'];

$select=mysqli_query($con, "SELECT Fm_ID FROM faculty_members WHERE Fm_ID != '$page_id' AND Fm_ID = '$Fm_ID'");
$rows = mysqli_num_rows($select);

if($rows > 0){
$user = mysqli_fetch_assoc($sql);

}
else {
 $update = mysqli_query($con,"UPDATE faculty_members
     SET 
     Fm_ID ='$Fm_ID',
     Fm_Name ='$Fm_Name',
     Fm_Address ='$Fm_Address',
     Fm_Salary ='$Fm_Salary',
     Fm_Designation ='$Fm_Designation'
     WHERE Fm_ID  = '$page_id'");


header("location:index.php");
}
   }
?>
  <?php if($page_title_id == "edit_faculty"){?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Faculty</title>
</head>
<body style="background-color: lightgray;">
<form method="post" action="#">
	<h1 style="text-align: center;color: green;">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center;">Edit Faculty Members </h1>
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
<?php } ?>




