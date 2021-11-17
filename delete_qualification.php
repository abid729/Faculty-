<?php 
error_reporting(0);

include('db_connect.php');
$page_title = $_GET['page_title'];
	$page = explode(",",$page_title);
	$page_title_id = $page[0];
	$page_id = $page[1];
	$Degree_title = $page[2];

	if($page_title_id =="delete_qualification"){
	
	  $check_result = mysqli_query($con,"DELETE FROM qualification WHERE Q_ID  = '$page_id' AND  Degree_title = '$Degree_title'");
      $message ="edit_qualification".",".$page_id;
      header("Location:view_qualification.php?page_title=$message");
}

?>