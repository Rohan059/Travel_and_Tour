<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['id'])) {
    $package_id = $_GET['id'];

    // SQL query to delete the package
    $sql = "DELETE FROM packages WHERE package_id = '$package_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Package deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
