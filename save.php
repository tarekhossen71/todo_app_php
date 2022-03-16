<?php 
	$success = "Task Added Successfully";
	$failed = "Task Added Failed";
	include_once 'config.php';

if (isset($_POST['submit'])) {
	if ($_POST['task'] !='') {
	$task = $_POST['task'];

		if ($con) {
			$sql = mysqli_query($con, "INSERT INTO tasktable(task) VALUES ('$task')");
			if ($sql) {
				$_SESSION['status'] = $success;
				$_SESSION['status_code'] = "success";
				header("Location: index.php");
			}else{
				$_SESSION['status'] = $failed;
				$_SESSION['status_code'] = "error";
				header("Location: index.php");
			}
		}
		else{
			echo 'Error: Database Connection Failed';
		}
	}
	else{
		$_SESSION['status'] = "Field Must Not Be Empty";
		$_SESSION['status_code'] = "error";
		header("Location: index.php");
	}
}


