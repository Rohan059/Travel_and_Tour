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
    
    <!-- Inline CSS -->
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body & Font Style */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin-bottom: 10px;
        }

        .logout-btn {
            color: white;
            text-decoration: none;
            background-color: #555;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .logout-btn:hover {
            background-color: #444;
        }

        /* Form Container */
        .form-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .form-wrapper {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }

        .form-wrapper h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-group textarea {
            height: 100px;
            resize: vertical;
        }

        button.btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            cursor: pointer;
        }

        button.btn:hover {
            background-color: #218838;
        }

        /* Message Styles */
        .message {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
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
