<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include("db.php");

// Fetch applications count
$query = "SELECT COUNT(*) AS total FROM applications";
$result = $conn->query($query);
$data = $result->fetch_assoc();
$totalApplications = $data['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Admin Dashboard</h1>
        <p>Total Applications Submitted: <strong><?php echo $totalApplications; ?></strong></p>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>
