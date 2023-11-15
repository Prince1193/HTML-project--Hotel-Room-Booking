<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Room Availability</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
            margin: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            margin-top: 80px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"]{
            border-bottom: .2rem solid rgba(0, 0, 0, 0.1);
            border-top: 0;
            border-left: 0;
            border-right: 0;
            font-size: 18px;
            width: 80%;
            border-radius: 5px;
        }

        input[type="radio"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="radio"] {
            width: auto;
        }

        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>

    <div class="container">
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $room_number = $_POST['room_number'];
            $is_available = $_POST['is_available'];

            // Update room availability based on room number
            $update_sql = "UPDATE rooms SET is_available = '$is_available' WHERE room_id = '$room_number'";

            if ($conn->query($update_sql) === TRUE) {
                echo "Room availability updated successfully.";
            } else {
                echo "Error updating room availability: " . $conn->error;
            }
        }
        ?>

        <form method="POST">
            <label for="room_number">Room <span style="color:darkorange;">Number:</span></label>
            <input type="text" name="room_number" id="room_number" required><br><br>

            <label>Availability:</label>
            <input type="radio" name="is_available" value="1" checked> Unbook
            <input type="radio" name="is_available" value="0"> Book<br><br>

            <input type="submit" value="Update Availability">
        </form>
    </div>
</body>
</html>
