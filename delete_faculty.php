<?php 
error_reporting(0);

include('db_connect.php');
 $page_title = $_GET['page_title'];
	$page = explode(",",$page_title);
	$page_title_id = $page[0];
	$page_id = $page[1];

	if($page_title_id =="delete_facutly"){
	 $check_result = mysqli_query($con,"DELETE FROM faculty_members WHERE Fm_ID  = '$page_id'");
	header("location:index.php");
}

?>