<?php include "connection.php";
      session_start();
      if($_SESSION["isAdmin"] != true){
        echo '<script>window.location.assign("index")</script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="style/style2.css">
</head>
<body>
    <div class="form-container">
        <h1>Add Category</h1>
        <form action="addcategory.php" method="POST" enctype="multipart/form-data">
            <label for="item-name">Category Name</label>
            <input type="text" id="item-name" name="item-name" placeholder="Enter Category name" required>
        <button type="submit" name="submit" value="submit">Add Category</button>
        </form>
        <br>
        <a href="dashboard.php" style="margin-left: 40%;"><button>BACK</button></a>
    </div>
    <script src="JS/script.js"></script>
</body>
<?php

if(isset($_POST["submit"])){
    $name = $_POST["item-name"];
    $query = "INSERT INTO categories (cat_name) VALUES ('$name')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<div class="container">Category Added</div>';
        echo '<script>window.location.assign("addCategory.php")</script>';
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>
</html>