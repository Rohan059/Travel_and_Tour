<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the booking from the database
    $sql = "DELETE FROM bookings WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the manage bookings page with a success message
        header("Location: manage_bookings.php?message=Booking deleted successfully");
    } else {
        // Redirect back with an error message
        header("Location: manage_bookings.php?error=Error deleting booking: " . $conn->error);
    }
} else {
    // If no ID is provided, redirect back
    header("Location: manage_bookings.php");
}

$conn->close();
?>