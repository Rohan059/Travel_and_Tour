<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    
   <link rel="stylesheet" href="css/admin_css.css">
</head>
<body>

<!-- Admin Header -->
<header>
    <div class="header-content">
        <h1>Welcome, <?php echo $_SESSION['admin_name']; ?></h1>
        <a href="admin_logout.php" class="logout-btn">Logout</a>
    </div>
</header>

<!-- Sidebar Navigation -->
<aside class="sidebar">
    <nav>
        <ul>
            <li><a href="add_package.php" class="btn">Add Package</a></li>
            <li><a href="manage_packages.php" class="btn">Manage Packages</a></li>
            <li><a href="manage_bookings.php" class="btn">View Bookings</a></li>
            <li><a href="manage_reviews.php" class="btn">View Reviews</a></li>
        </ul>
    </nav>
</aside>

<!-- Main Content -->
<main class="main-content">
    <h2>Admin Dashboard</h2>
    <p>Welcome to the admin panel. Use the sidebar to manage packages, bookings, and reviews.</p>
</main>

</body>
</html>

<?php
$conn->close();
?>