<?php
session_start();
session_destroy(); // Destroy any previous session
session_start(); // Start a new session after destroying the previous one

$error = "";
if (isset($_GET['error'])) {
    $error = htmlspecialchars($_GET['error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borang Permohonan Pensyarah - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            color: black;
        }
        .btn-custom {
            background-color: #6a11cb;
            color: white;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #5a0fb2;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">UiTM Lecturer Application</h2>
    <p class="text-center text-muted">Please login to continue</p>

    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

    <form action="process_login.php" method="post">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-custom">Login</button>
    </form>

    <p class="text-center mt-3"><a href="register.php">Don't have an account? Register</a></p>
</div>

</body>
</html>
