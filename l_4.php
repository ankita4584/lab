<?php
// Database connection details
$db_server = 'localhost';
$db_user = 'mysql'; // Correct username
$db_pass = 'utkarsh12@';
$db_data = 'restuarant';

// Create connection
$conn = new mysqli($db_server, $db_user, $db_pass, $db_data);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the menu table
$sql = "INSERT INTO menu (id,name, description, price, category) 
VALUES ('2','Cheeseburger', 'With lettuce and tomato', 5.99, 'Main')";

if ($conn->query($sql) === TRUE) {
    echo "New menu item added successfully.<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Fetch all menu items
$sql_1 = "SELECT id, name, description, price, category FROM menu";
$result = $conn->query($sql_1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        h3 {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h1>List of Food Items</h1>
    <?php
    if ($result && $result->num_rows > 0) {
        // Display each menu item
        while ($row = $result->fetch_assoc()) {
            echo "<h3>{$row['id']} - {$row['name']} - {$row['price']} USD</h3>";
        }
    } else {
        echo "<p>No menu items found.</p>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
