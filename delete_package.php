<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include('connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM packages WHERE id='$id'";
if ($conn->query($sql)) {
    header("Location: manage_packages.php");
} else {
    echo "<p>Error: " . $conn->error . "</p>";
}

$conn->close();
?>