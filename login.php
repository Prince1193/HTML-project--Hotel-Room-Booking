<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        /* Style for the login page container */
body {
    font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            background-image: url('../img/loginx.jpg');
            background-size: cover;
}



/* Style for the login form */
h1 {
    font-size: 24px;
    padding-left: 5px;
    padding-top: 40px;
}
.box{
    background-color: rgba(0, 0, 0, 0);
            width: 300px;
            padding: 20px;
            margin: auto;
            margin-top: 100px;
            border-radius: 5px;
            
}

input[type="text"], input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: .8rem;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 0.8rem;
    cursor: pointer;
    font-size: 18px;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
.logo{
            width: 30%;
            color: #fff;
        }
        i{
            font-size: 100px;
            padding-top: 200px;
            padding-left: 400px;
        }
    </style>
</head>
<body>
    

    

    <?php
    session_start();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Check admin credentials (you can replace with your actual admin username and password)
        if ($username === 'admin' && $password === 'admin1234') {
            $_SESSION['admin'] = true;
            header('Location: admin.php'); // Redirect to admin page
            exit();
        } else {
            echo "Invalid admin credentials.";
        }
    }
    ?>
    <div class="logo"><i class="fas fa-thin fa-user"></i></div>
<div class="box">
<h1><span style="color:darkorange;">Admin</span> Login</h1>
    <form method="post" action="">
        
        <input type="text" name="username" id="username" placeholder="Username"><br>
        
        <input type="password" name="password" id="password" placeholder="Password"><br>
        <input type="submit" name="login" value="Login">
    </form>
</div>
</body>
</html>
