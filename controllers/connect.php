<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "todo_app_db";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn) {
	die("Connection failed: " . mysqli_error($conn));
}