<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include('connection.php');

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $duration = $_POST['duration'];

    $sql = "UPDATE packages SET package_name='$package_name', description='$description', price='$price', duration='$duration' WHERE id='$id'";
    if ($conn->query($sql)) {
        echo "<p>Package updated successfully!</p>";
    } else {
        echo "<p>Error: " . $conn->error . "</p>";
    }
}

$sql = "SELECT * FROM packages WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
    <link rel="stylesheet" href="css/edit_package_css.css">
</head>
<body>

<header>
    <div class="header-content">
        <h1>Edit Package</h1>
        <a href="admin_panel.php" class="logout-btn">Back to Dashboard</a>
    </div>
</header>

<main class="main-content">
    <h2>Edit Package</h2>
    <form method="POST" action="edit_package.php?id=<?php echo $id; ?>">
        <label for="package_name">Package Name:</label>
        <input type="text" id="package_name" name="package_name" value="<?php echo $row['title']; ?>" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $row['description']; ?></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $row['price']; ?>" required>

        <label for="image">Package Image:</label>
    <input type="file" id="image" name="image" accept="image/*">
    <small>Current Image: <?php echo $row['image']; ?></small>
      

        <button type="submit">Update Package</button>
    </form>
</main>

</body>
</html>

<?php
$conn->close();
?>