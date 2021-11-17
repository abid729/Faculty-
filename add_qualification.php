<?php 
error_reporting(0);

// error_reporting(0);
 $page_title = $_GET['page_title'];
 $page = explode(",",$page_title);
 $page_title_id  = $page[0];
 $page_id    = $page[1];
 // $GLOBALS['page_title_id'] = $page[0];
include('db_connect.php');
if(isset($_POST['submit_qualification'])){

$Q_ID=$_POST['Q_ID'];
$Degree_title=$_POST['Degree_title'];
$Year_of_Passing=$_POST['Year_of_Passing'];
$Institute_attended=$_POST['Institute_attended'];
$select=mysqli_query($con, "SELECT Degree_title FROM qualification WHERE Degree_title = '$Degree_title' AND Q_ID = '$page_id' ");

 $rows = mysqli_num_rows($select);

if($rows > 0){
$message ="add_qualification".",".$page_id;
      header("Location:add_qualification.php?page_title=$message");
}
else {

$insert = mysqli_query($con,"INSERT INTO qualification 
    ( Q_ID,  
      Degree_title,  
      Year_of_Passing,
      Institute_attended)
    Values
    ('$Q_ID',
     '$Degree_title',
     '$Year_of_Passing',
     '$Institute_attended'
    )");
$message ="view_qualification".",".$page_id;
      header("Location:view_qualification.php?page_title=$message");
 }
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Faculty</title>
</head>
<body style="background-color: lightgray;">
<form method="post" action="#">
	<h1 style="text-align: center;color: green;">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center;">Add Qualification </h1>
	<table width="100%" border="1">
		<tr>
		<td>Qualification ID:
			<br>
			<input type="text" name="Q_ID" style = "width: 500px;" value="<?php echo $Q_ID; ?>" required></td>
		<td>Degree Title:
			<br>
			<input type="text" name="Degree_title" style = "width: 500px;" value="<?php echo $Degree_title; ?>" required></td>
	</tr>
	<tr>
		<td>Passing Year:
			<br>
			<input type="text" name="Year_of_Passing" style = "width: 500px;" value="<?php echo $Year_of_Passing; ?>" required></td>
		<td>Institute:
			<br>
			<input type="text" style = "width: 500px;" name="Institute_attended" value="<?php echo $Institute_attended; ?>" required></td>
	</tr>
	
	<tr>
		<td colspan="2" style="text-align: center;">
			<input type="submit" name="submit_qualification" value="Submit">
		</td>
	</tr>
	</table>
</form>
</body>
</html>