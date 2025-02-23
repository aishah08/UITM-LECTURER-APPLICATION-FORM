<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'borang_uitm');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete related records in academic_qualifications
    $conn->query("DELETE FROM academic_qualifications WHERE application_id = $id");

    // Delete related records in professional_memberships
    $conn->query("DELETE FROM professional_memberships WHERE application_id = $id");

    // Delete the record in applications
    if ($conn->query("DELETE FROM applications WHERE id = $id") === TRUE) {
        echo "<script>alert('Record deleted successfully!'); window.location.href='record.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
$conn->close();
?>
