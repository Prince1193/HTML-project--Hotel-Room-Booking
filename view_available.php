<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin View Available Rooms</title>
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
            font-size: 20px;
            color: #333;
            margin: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
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

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-bottom: .2rem solid rgba(0, 0, 0, 0.1);
            border-top: 0;
            border-left: 0;
            border-right: 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Available Rooms</h1>

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
            $room_type = $_POST['room_type'];

            // Query to retrieve available rooms of the selected type
            $sql = "SELECT room_id FROM rooms WHERE room_type = '$room_type' AND is_available = 1";

            $result = $conn->query($sql);

            if ($result === false) {
                // Handle the query error
                die("Error in SQL query: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                echo "<h2>Available $room_type Rooms:</h2>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>Room Number: " . $row["room_id"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<h2>No available $room_type rooms.</h2>";
            }
        }
        ?>

        <form method="POST">
            <label for="room_type">Select <span style="color:darkorange">Room Type:</span></label>
            <select name="room_type" id="room_type">
                <option value="Single">Single</option>
                <option value="Deluxe">Deluxe</option>
                <option value="Premium">Premium</option>
                <!-- Add more room types as needed -->
            </select><br><br>

            <input type="submit" value=" Check">
        </form>
    </div>
</body>
</html>
