<?php
// database connection mysql procedural
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>