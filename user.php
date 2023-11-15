<?php
session_start(); // Start the session

// Check if the user is logged in (you can also implement more secure checks)
if (!isset($_SESSION["name"]) || !isset($_SESSION["phone"])) {
    header("Location: user/login.php"); // Redirect to login if not logged in
    exit;
}

// Include your database connection code here

// Replace these with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$database = "hotel_db";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data from the session
$user_name = $_SESSION["name"];
$user_phone = $_SESSION["phone"];

// Check if room_id is provided in the POST request (for canceling bookings)
if (isset($_POST["room_id"])) {
    $room_id = $_POST["room_id"];

    // Perform the room cancellation
    // Update the room availability to 1 (available)
    $update_room_sql = "UPDATE rooms SET is_available = 1 WHERE room_id = $room_id";
    if ($conn->query($update_room_sql) === TRUE) {
        // Delete the booking entry for the room
        $delete_booking_sql = "DELETE FROM bookings WHERE room_id = $room_id";
        if ($conn->query($delete_booking_sql) === TRUE) {
            // Room is successfully unbooked
            echo "Room with ID $room_id has been successfully canceled and is now available.";
        } else {
            echo "Error deleting booking: " . $conn->error;
        }
    } else {
        echo "Error updating room availability: " . $conn->error;
    }
}

// Fetch the user's booking details
$booking_data = array();
$sql = "SELECT b.room_id, r.room_type, b.check_in_date, b.check_out_date
        FROM bookings b
        JOIN rooms r ON b.room_id = r.room_id
        WHERE b.phone = '$user_phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $booking_data[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fafafa;
        }

        h1 {
            text-align: left;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .cancel-button {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .cancel-button:hover {
            background-color: #cc0000;
        }
        .gotohome{
	position: fixed;
	width: 50px;
	height: 50px;
	background:  #fff;
	top: 20px;
	right: 50px;
	text-align: center;
	line-height: 50px;
	text-decoration: none;
	color: #fff;
	font-size: 25px;
   
}
.gotohome i{
	color: #000;
}
.refunds{
    text-align: center;
    padding-top: 20px;
}
img{
    height: 100vh;
    background-size: cover;
}
    </style>
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
<a href="../index.php" class="gotohome"><i class="fa-solid fa-house"></i></a>

    <h1>Welcome, <span style="color:darkorange"><?php echo $user_name; ?></span></h1>
    <div class="container">
        <h2>Your Bookings </h2>
        <?php if (empty($booking_data)): ?>
            <p>No bookings found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Room ID</th>
                        <th>Room Type</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($booking_data as $booking): ?>
                        <tr>
                            <td><?php echo $booking['room_id']; ?></td>
                            <td><?php echo $booking['room_type']; ?></td>
                            <td><?php echo $booking['check_in_date']; ?></td>
                            <td><?php echo $booking['check_out_date']; ?></td>
                            <td>
                                <form method="post" action="">
                                    <input type="hidden" name="room_id" value="<?php echo $booking['room_id']; ?>">
                                    <button type="submit" class="cancel-button">Cancel</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    <div class="refunds">
        <span style=" color: blue; font-size: 20px">Refund Policy:</span> Refund will only be issued if a room is cancelled within 3 hours from the booking time.
    </div>
</body>
</html>

