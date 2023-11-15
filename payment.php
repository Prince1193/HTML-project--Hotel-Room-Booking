<!DOCTYPE html>
 <html lang="en">

 <head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
rel="stylesheet">
 <link rel="stylesheet" href="style/paymentstyle.css">
 <title>Payment</title>


 <?php

session_start();
 // Database configuration
 $servername = "localhost"; // Change this if your database is hosted on a different server
 $username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
 $database = "hotel_db"; // Replace with your database name

 $conn = new mysqli($servername, $username, $password, $database);
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }
 
 if (isset($_SESSION['room_id'], $_SESSION['name'], $_SESSION['email'], $_SESSION['phone'], $_SESSION['check_in_date'], $_SESSION['check_out_date'])) {
       // Retrieve the values from session variables
       $room_id = $_SESSION['room_id'];
       $name = $_SESSION['name'];
       $email = $_SESSION['email'];
       $phone = $_SESSION['phone'];
       $check_in_date = $_SESSION['check_in_date'];
       $check_out_date = $_SESSION['check_out_date'];
 }
 
 if (isset($_POST['Pay'])) {
     


 // Payment is valid, proceed with booking
 $update_room_sql = "UPDATE rooms SET is_available = 0 WHERE room_id = $room_id";
 mysqli_query($conn, $update_room_sql);

 $insert_user_sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $conn->query($insert_user_sql);

    $insert_booking_sql = "INSERT INTO bookings ( room_id, phone, check_in_date, check_out_date)
                          VALUES ('$room_id', '$phone', '$check_in_date', '$check_out_date')";
    $conn->query($insert_booking_sql);
 echo '<script>alert("Payment done. Room booked successfuly");</script>';
 } else {

 // Payment validation failed, set an error message
 $payment_validation_error = "Payment validation failed. Please check the payment
details.";
 }
 $conn->close();
 ?>

 </head>

 <body>
 <header>
 <h1 class="logo">Payment</h1>
 <div class="menu-icons-container">
 <a href="index.php" class="gotohome"><i class="fas fa-home"></i></a>
 </div>
 </header>

 <div class="form-container">
 <h2 class="form-title">Payment Details</h2>
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="checkout-form" method="post">
 <div class="input-line">
 <label for="name">Name on card</label>
 <input type="text" name="cname" id="cname" placeholder="Your name and surname">
 </div>
 <div class="input-line">
 <label for="name">Card number</label>
 <input type="text" name="cno" id="cno" placeholder="1111-2222-3333-4444">
 </div>
 <div class="input-container">
 <div class="input-line">
 <label for="name">Expiring Date</label>
 <input type="text" name="exp" id="exp" placeholder="09-21">
 </div>
 <div class="input-line">
 <label for="name">CVC</label>
 <input type="text" name="cv" id="cv" placeholder="***">
 </div>
 </div>
 <input type="submit" value="Pay <?php
    if ($room_id >= 101 && $room_id <= 110) {
        echo ' $200';
    } elseif ($room_id >= 201 && $room_id <= 210) {
        echo ' $500';
    } elseif ($room_id >= 301 && $room_id <= 310) {
        echo ' $1000';
    } else {
        echo ''; // You can set a default value if the room ID doesn't fall into the specified ranges.
    }
?>" name="Pay">
 </form>

 </div>
 </div>
 <div>
 </div>


 </body>

 </html>