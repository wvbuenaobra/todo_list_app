<?php
	require_once('./controllers/connect.php');

	$sql = "SELECT id, name FROM tasks";
	$result = $result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">

	<title>To-Do List App</title>

	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- external css -->
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center p-5">

					<p class="display-4">To-Do List App</p>

					<span id="errMsg" class="text-danger"></span>

					<form method="POST">
						<div class="input-group mb-4">
  							<input type="text" name="addtask" id="addtask" class="form-control" placeholder="Enter new task">
  							<div class="input-group-append">
    							<button class="btn btn-primary" type="submit" id="addnewtask">Add New Task</button>
  							</div>
						</div>
					</form>

					<div class="card">
						<div class="card-body">
							<ul id="tasklist">
								
								<?php
									while($row = mysqli_fetch_assoc($result)) {
								?>		
										<!-- <li data-id="<?php //echo $row['id'] ?>">
											<?php //echo $row['name'] ?>
											<button class="btn btn-success" type="button" id="btndone">Done</button>
									    	<button class="btn btn-danger btnremove">Remove</button>
										</li> -->
										<div class="input-group mb-3">
									  	<input type="text" name="task" id="task" class="form-control" value="<?php //echo $row['name'] ?>" readonly style="background-color: white;">
									  	<div class="input-group-append">
									    	<button class="btn btn-success" type="button" id="btndone">Done</button>
									    	<button class="btn btn-danger" type="button" id="btnremove">Remove</button>
									  	</div>
									</div>
								<?php
									}
								?>

							</ul>
						</div>
					</div>

					<p class="display-4">Done Tasks</p>
				</div>
			</div>
		</div>
	</div>

	<!-- <script src="./assets/js/script.js"></script> -->

	<script>
		$("#addnewtask").click( () => {
			event.preventDefault();
			const newTask = $("#addtask").val();

			if(newTask != "") {
				$("#errMsg").html("");

				$.ajax({
					method: "POST",
					url: "controllers/add_task.php",
					data: {addtask : newTask},
				}).done( data => {
					$("#addtask").val("");
					location.reload();
					console.log("added new task");
				});

			}else{
				$("#errMsg").html("Please enter a task.");
				$("#addtask").focus();
			}

		});

		$("#tasklist").on("click", ".btnremove", function() {
			const task_id = parseInt($(this).parent().attr('data-id'));
			console.log(task_id);
		// $("#btnremove").click( () => {
			// event.preventDefault();
// alert(task_id);
			// const task_id = $(this).parent().attr('id');
			// alert(task_id);

			 // parent.attr('id').replace('record-',''),
		});
	</script>
	<?php mysqli_close($conn); ?>
</body>
</html>