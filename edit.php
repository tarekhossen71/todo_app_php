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

</head>
<body>
	<div class="container-fulid">
		<div class="container">
			<div class="card mt-5">
				<div class="card-header">
					<h2 class="card-title"><a href="index.php" class="text-decoration-none text-dark">Todo Task Simple Application With MySQL Database</a> <br>
						<span class="card-title text-primary">
							<?php 
								if (isset($_GET['msg'])) {
									echo $_GET['msg'];
								}
							 ?>
						</span>
					</h2>
				</div>
				<div class="card-body">

					<?php 
						$id = $_GET['id'];
						$query = "SELECT * FROM tasktable WHERE id=$id";

						$result = $con->query($query);

						$rows = mysqli_fetch_assoc($result);

					 ?>
					<form action="update.php?id=<?php echo $rows['id'] ?>" method="post">
					  <div class="mb-3">
					    <label class="form-label">Edit Task</label>
					    <input name="task" type="text" class="form-control" value="<?php echo $rows['task'] ?>">
					  </div>
					  <button name="submit" type="submit" class="btn btn-primary">Update Task</button>
					  <a href="index.php" class="btn btn-danger">Cancel</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>