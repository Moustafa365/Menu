<?php 
include "connection.php";
session_start();
      
      $isAdmin = 0;
      $username = $_SESSION["username"];
      $query = "SELECT isAdmin FROM users WHERE username = '$username'";
      $res = mysqli_query($conn, $query);
      if (mysqli_num_rows($res) === 1) {
          $row = mysqli_fetch_assoc($res);
          if($row["isAdmin"] == 1){
            $isAdmin = 1;
    }
    else{
        $isAdmin = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Dashboard</h1>
        <div class="button-grid">
            <a href="additem.php" class="dashboard-button">Add Item</a>
            <a href="addcategory.php" class="dashboard-button">Add Category</a>
            <a href="viewitems.php" class="dashboard-button">View Items</a>
            <a href="viewcategories.php" class="dashboard-button">View Categories</a>
            <a href="index.php" class="dashboard-button logout">Logout</a>
        </div>
    </div>
</body>
</html>