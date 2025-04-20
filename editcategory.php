<?php include "connection.php";
      session_start();
      if($_SESSION["isAdmin"] != true){
        echo '<script>window.location.assign("index")</script>';
    }
?>
<?php
    $category = $_GET["category"];
    if (isset($_POST["submit"])) {
        $id = $_POST['id'];
        $cat = $_POST["cat-name"];
      
        $sql = "UPDATE `categories` SET `cat_name`= '$cat' WHERE cat_id = '$id'";
      
        $result = mysqli_query($conn, $sql);
      
        if ($result) {
          echo '<script>window.location.assign("viewcategories.php")</script>';
        } else {
          echo "Failed: " . mysqli_error($conn);
        }
      }

    if($category != null){
        $sql = "SELECT * FROM categories WHERE cat_name='$category'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="style/style2.css">
</head>
<body>
    <div class="form-container">
        <h1>Edit Category</h1>
        <form action="editcategory.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $row["cat_id"]; ?>">

            <label for="item-name">Category Name</label>
            <input type="text" id="item-name" name="cat-name" value="<?php echo $row['cat_name']; ?>" required>
            <button type="submit" name="submit" value="submit">Edit</button>
        </form>
        <br>
        <a href="viewcategories.php" style="margin-left: 40%;"><button>BACK</button></a>
    </div>
    <script src="JS/script.js"></script>
</body>
</html>