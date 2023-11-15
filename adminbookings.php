<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Bookings</title>
    <!-- Add your CSS stylesheets and JavaScript libraries here -->
    <style>
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
    padding: 10px;
    margin-right: 10px;
    background-color: darkorange;
    border: 0;
    color: #fff;
    border-radius: .6rem; ;
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
        <h1>Booking <span style="color: darkorange;">Details</span></h1>

        <!-- Filter by Month -->
        <form method="post">
            <label for="filter_month">Filter by Month:</label>
            <select name="filter_month" id="filter_month">
            <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
                <!-- Add options for each month here -->
            </select>
            <input type="submit"  class="btn" name="filter" value="Filter">
        </form>

        <!-- Display Bookings Table -->
        <div class="box">
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Room ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Check-In Date</th>
                    <th>Check-Out Date</th>
                    <!-- Add more table headers as needed -->
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to retrieve and display booking records goes here -->
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "hotel_db";

                // Create a connection
                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Handle form submission and filter bookings based on the selected month
                if (isset($_POST['filter'])) {
                    $selectedMonth = $_POST['filter_month'];
                    // Implement SQL query to filter bookings by month
                    $sql = "SELECT b.booking_id, b.room_id, u.name, b.phone, b.check_in_date, b.check_out_date 
                    FROM bookings b
                    INNER JOIN users u ON b.phone = u.phone 
                    WHERE MONTH(b.check_in_date) = '$selectedMonth'";
                } else {
                    // Display all bookings (initial page load)
                    $sql = "SELECT b.booking_id, b.room_id, u.name, b.phone, b.check_in_date, b.check_out_date 
            FROM bookings b
            INNER JOIN users u ON b.phone = u.phone";
                }

                // Execute the SQL query
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["booking_id"] . "</td>";
                        echo "<td>" . $row["room_id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["check_in_date"] . "</td>";
                        echo "<td>" . $row["check_out_date"] . "</td>";
                        // Add more table data cells for additional columns if needed
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No bookings found.</td></tr>";
                }

                // Close the database connection
                $conn->close();
                ?>
            </tbody>
        </table>
            </div>
    </div>
</body>
</html>
