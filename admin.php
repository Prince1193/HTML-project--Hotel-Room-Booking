<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <!-- Add your CSS stylesheets and JavaScript libraries here -->
    <style>
        /* Add CSS for styling the admin page here */
        /* Style for the entire admin page */
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

/* Style for the sidebar */
#sidebar {
    background-color: rgba(0, 0, 0, 0);
    color: #fff;
    width: 250px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    overflow-x: hidden;
    padding-top: 20px;
}

#sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
}

#sidebar ul {
    list-style-type: none;
    padding: 0;
}

#sidebar ul li {
    padding: 10px;
    text-align: center;
}

#sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 5px 10px;
}

#sidebar ul li a:hover {
    background-color: #555;
}

/* Style for the content area */
#content {
    margin-left: 250px;
    padding: 20px;
}

/* Style for page heading */
h2{
    font-size: 24px;
    padding-top: 30px;
}

/* Style for tables (if used) */
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
    text-align: center;
}
/* Style for the entire admin page */
body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Hide horizontal scrollbar */
}

/* Style for the sidebar */
#sidebar {
    
    color: #fff;
    width: 249px;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    padding-top: 20px;
}

#sidebar h2 {
    text-align: center;
    margin-bottom: 20px;
}

#sidebar ul {
    list-style-type: none;
    padding: 0;
}

#sidebar ul li {
    padding: 10px;
    text-align: center;
}
.da {
    width: 250px;
    height: 100vh;
}
.da img{
    width: 250px;
    height: 100%;
}
#sidebar ul li a {
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 5px 10px;
}

#sidebar ul li a:hover {
    color: darkorange;
    background-color: rgba(0, 0, 0, 0);
}

/* Style for the content area */
#content {
    margin-left: 250px;
    padding: 20px;
    overflow: hidden; /* Hide content overflow */
    width: calc(100% - 250px); /* Calculate the width to fit viewport */
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    
}

/* Style for table headers */
th {
    background-color: #007BFF;
    color: #fff;
}

/* Style for table rows */
tr:nth-child(even) {
    background-color: #f2f2f2;
}

        /* ... */
        iframe {
            border: none;
            width: 100%;
            height: 100%;
        }
    </style>

</head>
<body>
    <div class="da">
<img src="../img/dash.jpg">
    </div>
    <div id="sidebar">
        <h2>Welcome, <span style=" color:darkorange;">Admin!</span></h2>
        <ul>
            <li><a href="adminbookings.php" target="content_frame">Bookings</a></li>
            <li><a href="add_rooms.php" target="content_frame">Add Rooms</a></li>
            <li><a href="user_booking.php" target="content_frame">User Booking</a></li>
            <li><a href="view_available.php" target="content_frame">Available Rooms</a></li>
            <!-- Add more links to other admin pages as needed -->
        </ul>
    </div>
    <div id="content">
        <iframe src="adminbookings.php" name="content_frame"></iframe>
    </div>

</body>
</html>

