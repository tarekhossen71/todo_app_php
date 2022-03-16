<?php 
	include_once("config.php");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo Task Simple Application</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
</head>
<body>
	<div class="container">
		<div class="card my-5">
			<div class="card-header">
				<h2 class="card-title"><a href="index.php" class="text-decoration-none text-dark">Todo Task Simple Application With MySQL Database</a>
					
				</h2>
			</div>
			<div class="card-body">
				<form action="save.php" method="post">
				  <div class="mb-3">
				    <label class="form-label">Add Task</label>
				    <input name="task" type="text" class="form-control" >
				  </div>
				  <button name="submit" type="submit" class="btn btn-primary">Add Task</button>
				</form>
			</div>
		</div>

		<!-- Tables data -->
		<h2>Show All Task</h2>
		<table id="example" class="table table-striped table-hover border" style="width:100%">
	        <thead>
	            <tr>
	                <th style="width:10px">Serial No</th>
					<th style="width:">Task</th>
					<th style="width:130px !important">Action</th>
	            </tr>
	        </thead>
	        <tbody >
						
				<?php 
					$query = "SELECT * FROM tasktable";
					$result = $con->query($query);
					
					$serial = 1;
					while($rows = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td><?php echo $serial; ?></td>
						<td><?php echo $rows['task']; ?></td>
						<td>
							
							<a class="btn btn-primary" href="edit.php?id=<?php echo $rows['id']; ?>">Edit</a>
							<a onclick="return confirm('Are you sure?')" class="btn btn-danger " href="delete.php?id=<?php echo $rows['id']; ?>">Delete</a>
						</td>
					</tr>
				<?php
				$serial++;
				}
			 ?>	
			</tbody>
		</table>
		<footer class="bg-dark text-light py-2 mt-3 text-center">
			<p class="lead pt-3">Copyright &copy; All Right Reserved</p>
		</footer>
	</div>


	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
	<?php 
		if (isset($_SESSION['status']) == true) {
			?>
			<script>
				swal({
					  title: "<?php echo $_SESSION['status']; ?>",
					  icon: "<?php echo $_SESSION['status_code']; ?>",
					  button: "OK",
					});
			</script>
			<?php
			unset($_SESSION['status']);
		}
	 ?>
	
</body>
</html>