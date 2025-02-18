<?php
session_start();
include('db.php');

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['id'])) {
    $package_id = $_GET['id'];
    $sql = "SELECT * FROM packages WHERE package_id = '$package_id'";
    $result = $conn->query($sql);
    $package = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];
    $image = $_POST['image'];

    // SQL query to update the package
    $sql = "UPDATE packages SET 
            package_name = '$package_name', 
            description = '$description', 
            price = '$price', 
            duration = '$duration', 
            image = '$image' 
            WHERE package_id = '$package_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Package updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Package</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="admin-panel">
        <header>
            <h1>Modify Package</h1>
            <a href="admin_panel.php" class="btn">Back to Admin Panel</a>
        </header>
        <form method="POST">
            <div class="form-group">
                <label for="package_name">Package Name</label>
                <input type="text" id="package_name" name="package_name" value="<?php echo $package['package_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required><?php echo $package['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="<?php echo $package['price']; ?>" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" id="duration" name="duration" value="<?php echo $package['duration']; ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image URL</label>
                <input type="text" id="image" name="image" value="<?php echo $package['image']; ?>" required>
            </div>
            <button type="submit" class="btn">Update Package</button>
        </form>
    </section>
</body>
</html>
