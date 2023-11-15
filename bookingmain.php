<!DOCTYPE html>
 <html>

 <head>
 <title>Hotel Booking Page</title>
 <link rel="stylesheet" type="text/css" href="style/bookstyle.css">
 <style>
 .gotohome {
 position: fixed;
 width: 50px;
 height: 50px;
 background: darkorange;
 top: 20px;
 right: 50px;
 text-align: center;
 line-height: 50px;
 text-decoration: none;
 color: #fff;
 font-size: 25px;
 border-radius: 1rem;
 }

 .gotohome i {
 color: #fff;
 }
 </style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/6.4.2/css/all.min.css">
 <?php
 // Database configuration
 $servername = "localhost"; // Change this if your database is hosted on a different
 $username = "root"; // Replace with your database username
 $password = ""; // Replace with your database password
 $database = "hotel_db"; // Replace with your database name

 // Create a database connection
 $conn = new mysqli($servername, $username, $password, $database);

 // Check the connection
 if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
 }

 $room_type = $check_in_date = $check_out_date = "";
 $available_rooms = array();

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $room_type = $_POST['room_type'];
 $check_in_date = $_POST['check_in_date'];
 $check_out_date = $_POST['check_out_date'];

 // Query to check room availability
 $sql = "SELECT rooms.room_id
 FROM rooms
 WHERE room_type = '$room_type'
 AND is_available = 1
 AND room_id NOT IN (
     SELECT bookings.room_id 
     FROM bookings 
     WHERE (check_in_date <= '$check_in_date' AND check_out_date >= '$check_in_date')
     OR (check_in_date <= '$check_out_date' AND check_out_date >= '$check_out_date')
 )";

 $result = $conn->query($sql);

 if ($result === false) {
 // Handle the query error
 die("Error in SQL query: " . $conn->error);
 }

 if ($result->num_rows > 0) {
 // Rooms are available
 while ($row = $result->fetch_assoc()) {
 $available_rooms[] = $row["room_id"];
 }
 }
 }




 ?>
 </head>

 <body>
 <a href="index.php" class="gotohome"><i class="fas-solid fa-house"></i></a>
 <div class="container">
 <div class="container1">
 <!-- Form for checking room availability -->
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

 <h2>Check Room <span style="color: darkorange;">Availability</span></h2>
 <label for="room_type">Room Type<span style="color: red;">*</span></label>
 <select name="room_type" id="room_type">
 <option value="Single">Single</option>
 <option value="Deluxe">Deluxe</option>
 <option value="Premium">Premium</option>
 </select><br>
 <label for="check_in_date">Check-In Date<span style="color: red;">*</span>
</label>
 <input type="date" name="check_in_date" id="check_in_date"><br>
 <label for="check_out_date">Check-Out Date<span style="color: red;">*</span></label>
 <input type="date" name="check_out_date" id="check_out_date"><br>
 <input type="submit" class="btn" value="Check Availability">
 </form>
 <div class="container3">
 <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
 <?php if (count($available_rooms) > 0) : ?>
 <h2>Available <span style="color:darkorange"><?php echo $room_type; ?> Rooms:</span></h2>
 <ul>
 <?php foreach ($available_rooms as $room_id) : ?>
 <li>Room ID: <?php echo $room_id; ?></li>
 <?php endforeach; ?>
 </ul>
 <?php else : ?>
 <h2>No available <?php echo $room_type; ?> rooms for the selected dates.</h2>
 <?php endif; ?>
 <?php endif; ?>
 </div>


 </div>
 <!-- Display availability results here -->

 <!-- Form for booking a room -->

 <form action="booking.php" method="post">
 <div class="container2">
 <h2>Book a <span style="color:darkorange;">Room</span></h2>
 <div class="box1">
 <!-- Add input fields for user details (name, email, phone, etc.) here-->

 <label for="name">Name<span style="color: red;">*</span></label>
 <input type="text" name="name" id="name"><br>

 <label for="email">Email<span style="color: red;">*</span></label>
 <input type="text" name="email" id="email"><br>

 <label for="phone">Phone<span style="color: red;">*</span></label>
 <input type="text" name="phone" id="phone"><br>
 </div>
 <div class="box2">
 <label for="room_id">Room ID<span style="color: red;">*</span></label>
 <input type="text" name="room_id" id="room_id">


 <label for="check_in_date">Check-In Date<span style="color: red;">*</span></label>
 <input type="date" name="check_in_date" id="check_in_date"><br>


 <label for="check_out_date">Check-Out Date<span style="color: red;">*</span></label>
 <input type="date" name="check_out_date" id="check_out_date"><br>
 </div>

 </div>

 <input type="submit" class="btn" name="book_now" id= "book_now" value="Book Rooms">

 </form>

 </div>

 </body>

 </html>