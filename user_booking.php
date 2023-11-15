<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS stylesheets and JavaScript libraries here -->
    <!-- Add your CSS styles for the page here -->
    <style>
        /* Your CSS styles */
       
        /* Style for the entire bookings page */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    
}

/* Style for the header */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
    padding-left: 20px;
}

/* Style for the filter form */
form {
    margin-bottom: 20px;
    padding-left: 20px;
}

label {
    font-weight: bold;
}
select{
    font-size: 12px;
    width: 20%;
    padding-bottom: 10px;
    padding-top: 5px;
    border: 0;
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
input[type="text"]{
    border: 0;
    font-size: 25px;
}
.box{
    padding-left: 40px;
}
/* Style for the bookings table */
table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background-color: #007BFF;
            color: #fff;
        }

/* Style for table rows */
tr:nth-child(even) {
    background-color: #f2f2f2;
}
    </style>
</head>
<body>
    <div id="content">
        <h1>View <span style="color:darkorange">User Bookings</span></h1>
        <!-- User Phone Input Form -->
        <form method="post" action="">
            <label for="phone">User Phone:</label>
            <input type="text" id="phone" name="phone" required>
            <br><br>
            <input type="submit" name="search" value="Search User Bookings">
        </form>

        <?php
        // Include your database connection code here
        $servername = "localhost"; // Change this if your database is hosted on a different server
        $username = "root"; // Replace with your database username
        $password = ""; // Replace with your database password
        $database = "hotel_db"; // Replace with your database name

        // Create a database connection
        $db_connection = mysqli_connect($servername, $username, $password, $database);

        if (!$db_connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if (isset($_POST["search"])) {
            $user_phone = $_POST["phone"];

            // Query to retrieve user's bookings based on phone number
            $query = "SELECT b.booking_id, b.room_id, u.name, b.phone, b.check_in_date, b.check_out_date FROM bookings b
            JOIN users u ON b.phone = u.phone
            WHERE b.phone = '$user_phone'";

            // Execute the query and fetch results
            $result = mysqli_query($db_connection, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Bookings for User with Phone Number: $user_phone</h2>";
                echo "<table>";
                echo "<tr><th>Booking ID</th><th>Room ID</th><th>Name</th><th>Phone</th><th>Check-In Date</th><th>Check-Out Date</th></tr>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['booking_id']}</td>";
                    echo "<td>{$row['room_id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['phone']}</td>";
                    echo "<td>{$row['check_in_date']}</td>";
                    echo "<td>{$row['check_out_date']}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No bookings found for the user with phone number: $user_phone";
            }
        }

        // Close the database connection
        mysqli_close($db_connection);
        ?>
    </div>
</body>
</html>
