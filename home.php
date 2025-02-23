<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - UiTM Lecturer Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?university,education') no-repeat center center;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px 20px;
            position: relative;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }
        .hero h1, .hero p {
            position: relative;
            z-index: 2;
        }
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<?php 
// Ensure navbar.php exists before including it
if (file_exists('navbar.php')) {
    include 'navbar.php'; 
} else {
    echo "<p style='color:red; text-align:center;'>Error: navbar.php not found!</p>";
}
?>

<!-- Hero Section -->
<div class="hero">
    <div class="container">
        <h1 class="fw-bold">Welcome to UiTM Lecturer Application</h1>
        <p class="lead">Apply to be a lecturer and track your application status with ease.</p>
    </div>
</div>

<!-- Main Content -->
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Why Apply?</h5>
                    <p class="card-text">Join a prestigious institution and shape the future of education.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Application Process</h5>
                    <p class="card-text">Submit your details, upload required documents, and wait for approval.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Track Your Status</h5>
                    <p class="card-text">Easily check your application progress online.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    &copy; 2025 Universiti Teknologi MARA. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
