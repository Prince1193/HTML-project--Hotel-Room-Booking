<?php
// Database configuration
$servername = "localhost"; // Change this if your database is hosted on a different server
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "hotel_db"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$room_id = $name = $email = $phone = $check_in_date = $check_out_date ="";
$payment_validation_error = "";

// Check if the "Book Rooms" button is pressed
if (isset($_POST['book_now'])) {
    // Retrieve user input data
    $room_id = $_POST['room_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $check_in_date = $_POST['check_in_date'];
    $check_out_date = $_POST['check_out_date'];
   
    $_SESSION['room_id'] = $room_id;
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['check_in_date'] = $check_in_date;
    $_SESSION['check_out_date'] = $check_out_date;
    header("Location: payment.php");
    exit;
}




// Close the database connection when you're done
$conn->close();

?>
