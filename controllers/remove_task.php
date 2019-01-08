<?php

require_once('./connect.php');

$deltask = $_POST['deltask'];

$sql = "DELETE FROM tasks WHERE id='$deltask'";
$result = mysqli_query($conn, $sql);

if($result === TRUE) {
	echo "Task deleted successfully!";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>