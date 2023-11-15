<?php
// Database configuration
$servername = "localhost"; // Replace with your database server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "your_database"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the current date
$current_date = date("Y-m-d");

// Query for bookings with check_out_date less than or equal to the current date
$query = "SELECT room_id FROM bookings WHERE check_out_date <= '$current_date'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $room_id = $row["room_id"];
        
        // Update the room's availability status (is_available) to 1 (available)
        $update_query = "UPDATE rooms SET is_available = 1 WHERE room_id = '$room_id'";
        $conn->query($update_query);
    }
}

// Close the database connection
$conn->close();
?>
