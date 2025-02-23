<?php
include 'db.php';

$status = ""; // Default status message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname']; // Updated variable name
    $ICNumbers = $_POST['ICNumbers'];

    // Check if the user exists in the status table
    $query = "SELECT application_status FROM status WHERE fullname = ? AND ICNumbers = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $fullname, $ICNumbers);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $status = "Your application status: <strong>" . htmlspecialchars($row['application_status']) . "</strong>";
        } else {
            $status = "No application found with the provided details.";
        }

        mysqli_stmt_close($stmt);
    } else {
        $status = "Error in query execution.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Application Status</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Check Your Application Status</h1>

    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="ICNumbers" class="form-label">IC Numbers</label>
            <input type="text" name="ICNumbers" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Check Status</button>
    </form>

    <?php if (!empty($status)): ?>
        <div class="alert alert-info mt-4"><?php echo $status; ?></div>
    <?php endif; ?>
</div>
<br><br><br><br><br>
<footer class="text-center mt-5 p-3 bg-primary text-white">
    &copy; 2025 Universiti Teknologi MARA. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
