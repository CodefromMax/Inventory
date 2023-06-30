<!DOCTYPE html>
<html>
<head>
    <title>Storage Room Inventory</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Storage Room Inventory</h1>

    <?php
    // Database configuration
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database_name";

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if form is submitted
    if (isset($_POST['submit'])) {
        $item_name = $_POST['item_name'];
        $quantity = $_POST['quantity'];

        // Insert the new item into the inventory table
        $sql = "INSERT INTO inventory (item_name, quantity) VALUES ('$item_name', '$quantity')";

        if ($conn->query($sql) === TRUE) {
            echo "New item added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Retrieve all items from the inventory table
    $sql = "SELECT * FROM inventory";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Current Inventory</h2>";
        echo "<table>";
        echo "<tr><th>Item Name</th><th>Quantity</th></tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["item_name"] . "</td><td>" . $row["quantity"] . "</td></tr>";
        }

        echo "</table>";
    } else {
        echo "No items found in the inventory.";
    }

    // Close the database connection
    $conn->close();
    ?>

    <h2>Add Item to Inventory</h2>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="item_name">Item Name:</label>
        <input type="text" name="item_name" id="item_name" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required><br>

        <input type="submit" name="submit" value="Add Item">
    </form>
</body>
</html>