<?php
// Add the database connection
include('connection.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle the image upload
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_folder = "images/packages/" . $image;

    // Skip moving the file, directly using the temp image path
    // SQL query to insert data into the packages table
    $sql = "INSERT INTO packages (title, description, price, image) 
            VALUES ('$title', '$description', '$price', '$image')";

    if ($conn->query($sql) === TRUE) {
        $message = "Package added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <link rel="stylesheet" href="css/addpackage_css.css">
    <!-- Inline CSS -->
    
</head>
<body>

<!-- Admin Panel Header -->
<header>
    <div class="header-content">
        <h1>Add New Package</h1>
        <a href="admin_panel.php" class="logout-btn">Back to Dashboard</a>
    </div>
</header>

<!-- Admin Panel Form for Adding Package -->
<main class="form-container">
    <div class="form-wrapper">
        <h2>Package Details</h2>
        
        <?php
        if (isset($message)) {
            echo "<div class='message'>$message</div>";
        }
        ?>

        <form action="add_package.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Package Title</label>
                <input type="text" name="title" id="title" placeholder="Enter package title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" placeholder="Enter package description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" placeholder="Enter package price" required>
            </div>
            <div class="form-group">
                <label for="image">Package Image</label>
                <input type="file" name="image" id="image" required>
            </div>
            <button type="submit" class="btn">Add Package</button>
        </form>
    </div>
</main>

</body>
</html>
