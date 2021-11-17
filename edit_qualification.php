<?php 
error_reporting(0);
     $page_title = $_GET['page_title'];
     $page = explode(",",$page_title);
     $page_title_id  = $page[0];
      $page_id    = $page[1];
      $page_name    = $page[2];
     
include('db_connect.php');
$stmt = mysqli_query($con,"SELECT * FROM qualification WHERE Q_ID = '$page_id' AND Degree_title = '$page_name'");
			$row =mysqli_fetch_array($stmt);
		  $Q_ID = $row['Q_ID'];
			$Degree_title = $row['Degree_title'];
			$Year_of_Passing = $row['Year_of_Passing'];
			$Institute_attended = $row['Institute_attended'];
			
		
if(isset($_POST['submit_qualification'])){

$Q_ID=$_POST['Q_ID'];
$Degree_title=$_POST['Degree_title'];
$Year_of_Passing=$_POST['Year_of_Passing'];
$Institute_attended=$_POST['Institute_attended'];

$select=mysqli_query($con, "SELECT Degree_title FROM qualification WHERE Q_ID != '$page_id' AND Q_ID = '$Q_ID' AND Degree_title = '$page_name'");

 $rows = mysqli_num_rows($select);
 echo $rows;
exit;
if($rows > 0){
$user = mysqli_fetch_assoc($sql);

}
else {
 $update = mysqli_query($con,"UPDATE qualification
     SET 
     Q_ID ='$Q_ID',
     Degree_title ='$Degree_title',
     Year_of_Passing ='$Year_of_Passing',
     Institute_attended ='$Institute_attended'
       WHERE Q_ID  = '$page_id' AND Degree_title = '$page_name' ");

$message ="edit_qualification".",".$page_id;
      header("Location:view_qualification.php?page_title=$message");

}
   }
?>
  <?php if($page_title_id == "edit_qualification"){?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Faculty Qualification</title>
</head>
<body style="background-color: lightgray;">
<form method="post" action="#">
	<h1 style="text-align: center;color: green;">University Faculty Qualification Record Management System </h1>
<h1 style="text-align: center;">Edit Qualification </h1>
	<table width="100%" border="1">
		<tr>
		<td>Qualification ID:
			<br>
			<input type="text" name="Q_ID" style = "width: 500px;" readonly value="<?php echo $Q_ID; ?>" required></td>
		<td>Degree Title:
			<br>
			<input type="text" name="Degree_title" style = "width: 500px;" readonly value="<?php echo $Degree_title; ?>" required></td>
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
<?php } ?>