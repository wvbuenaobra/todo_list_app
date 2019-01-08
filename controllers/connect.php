<?php

// local
// $host = "localhost";
// $username = "root";
// $password = "";
// $dbname = "todo_app_db";

//live
$host = "db4free.net";
$username = "rootwb";
$password = "admin123";
$dbname = "todo_app_db_wb";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
	die("Connection failed: " . mysqli_error($conn));
}