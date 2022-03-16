<?php 
	$success = "Task Updated Successfully!";
	$failed = "Task Updated Failed";
	include("config.php");

	$id = $_GET['id'];
	$task = $_POST['task'];

	$query = "UPDATE tasktable SET task='$task' WHERE id=$id";
	$sql = $con->query($query);

	if ($sql) {
		$_SESSION['status'] = $success;
		$_SESSION['status_code'] = "success";
		header("Location: index.php");
	}else{
		$_SESSION['status'] = $failed;
		$_SESSION['status_code'] = "error";
		header("Location: index.php");
	}
