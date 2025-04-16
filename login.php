<?php include "connection.php";

// Include the connection file to establish a database connection
      session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style3.css">
</head>
<body>
    <div class="dashboard-container">
        <?php include "header.php"; ?>
        <h1>Login</h1>
        <form action="login.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter Username" required>

        <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <button type="submit" name="submit" value="submit" class="submit">Login</button>
        </form>  
        <?php include "footer.php"; ?> 
    </div>
    
    <?php
    if(isset($_POST['submit'])){
        $name = $_POST["username"];
        $pass = $_POST["password"];
        $query = "SELECT * FROM users WHERE username = '$name' AND userpassword = '$pass'";
        $result = mysqli_query($conn, $query); 
        if ($result) {
            $_SESSION["username"] = $name;
            $_SESSION["isAdmin"] = true;
            echo '<script>window.location.assign("dashboard.php")</script>';
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }
    ?>
    
</body>
</html>