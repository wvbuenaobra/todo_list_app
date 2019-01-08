<?php

require_once('./connect.php');

$task = $_POST['addtask'];

$sql = "INSERT INTO tasks (name) VALUES ('$task')";
$result = mysqli_query($conn, $sql);

if($result === TRUE) {
	echo "New task added successfully!";
	// header("Location:../index.php");
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>