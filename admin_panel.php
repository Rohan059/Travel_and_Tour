<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

$admin_name = $_SESSION['admin_name'];

// Database connection
include('connection.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

<!-- Admin Header Section -->
<header>
    <div class="header-content">
        <h1>Welcome, <?php echo $admin_name; ?></h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</header>

<!-- Sidebar Navigation -->
<aside class="sidebar">
    <nav>
        <ul>
            <li><a href="manage_packages.php" class="btn">Manage Packages</a></li>
            <li><a href="manage_bookings.php" class="btn">Manage Bookings</a></li>
            <li><a href="manage_reviews.php" class="btn">Client Reviews</a></li>
            <li><a href="admin_settings.php" class="btn">Settings</a></li>
        </ul>
    </nav>
</aside>

<!-- Admin Dashboard Main Content -->
<main class="main-content">
    <h2>Dashboard</h2>
    <div class="cards-container">
        <div class="card">
            <h3>Total Packages</h3>
            <p><?php echo $total_packages; ?></p>
        </div>
        <div class="card">
            <h3>Total Bookings</h3>
            <p><?php echo $total_bookings; ?></p>
        </div>
        <div class="card">
            <h3>Client Reviews</h3>
            <p><?php echo $total_reviews; ?></p>
        </div>
    </div>
</main>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
