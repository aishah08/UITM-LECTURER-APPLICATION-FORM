<?php
$servername = "localhost";
$username = "root";  // Change this if needed
$password = "";       // Change this if needed
$dbname = "borang_uitm"; // Change to your actual database name

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
