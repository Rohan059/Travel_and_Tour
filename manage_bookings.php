<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include('connection.php');

// Fetch all bookings
$sql = "SELECT * FROM bookings ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="css/booking_css.css">
</head>
<body>

<header>
    <div class="header-content">
        <h1>Manage Bookings</h1>
        <a href="admin_panel.php" class="logout-btn">Back to Dashboard</a>
    </div>
</header>

<main class="main-content">
    <h2>Booking List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Location</th>
                <th>Guests</th>
                <th>Arrival Date</th>
                <th>Leaving Date</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['guests']; ?></td>
                <td><?php echo $row['arrivals']; ?></td>
                <td><?php echo $row['leaving']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td>
                    <a href="delete_booking.php?id=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this booking?')">Remove</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

</body>
</html>

<?php
$conn->close();
?>