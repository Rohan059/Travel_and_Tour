<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location: admin_panel.php");
    exit();
}

$admin_username = "admin";
$admin_password = "admin123"; // Example credentials, ideally from a database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Check if the credentials match
    if ($input_username == $admin_username && $input_password == $admin_password) {
        $_SESSION['admin_id'] = 1; // Set session variable for admin
        $_SESSION['admin_name'] = "Admin"; // Set admin's name
        header("Location: admin_panel.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <h1>Welcome to GloSlowNepal Tour And Travel</h1>
    <title>
        
        Admin Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <section class="admin-login">
        <h2>Admin Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form action="admin_login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </section>
</body>
</html>
<?php


