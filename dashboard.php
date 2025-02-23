<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include("db.php");

// Fetch user role
$username = $_SESSION['username'];
$query = $conn->prepare("SELECT role FROM users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();
$role = $user['role'];

if ($role == 'applicant') {
    if (file_exists("apply.php")) {
        include("apply.php");
    } else {
        echo "<p style='color: red;'>Error: apply is missing!</p>";
    }
}
?>