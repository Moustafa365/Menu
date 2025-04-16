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
    <title>Add Item</title>
    <link rel="stylesheet" href="style/style2.css">
</head>
<body>
    <div class="form-container">
        <h1>Add Item</h1>
        <form action="additem.php" method="POST" enctype="multipart/form-data">
            <label for="item-name">Item Name</label>
            <input type="text" id="item-name" name="item-name" placeholder="Enter item name" required>
            
            <label for="ingredients">Item Ingredients</label>
            <textarea type="text" id="ingredients" name="ingredients" placeholder="Enter item ingredients" rows="4"></textarea>

            <label for="price-lbp">Item Price (lbp)</label>
            <input type="number" id="price-lbp" name="price-lbp" placeholder="Enter Price in lbp">
            
            <label for="price-usd">Item Price (usd)</label>
            <input type="number" id="price-usd" name="price-usd" placeholder="Enter Price in usd" step="0.01">

            
            <label for="category">Item Category</label>
            <select name="category" id="category" required>
            <option value="" disabled selected>Select a category</option>
                <?php 
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <option value="<?php echo $row["cat_name"] ?>"><?php echo $row["cat_name"] ?></option>
                <?php
                        }
                    }
                        
                ?>
        </select>
        <button type="submit" name="submit" value="submit">Add Item</button> 
        </form>
        <br>
        <a href="dashboard.php" style="margin-left: 40%;"><button>BACK</button></a>
    </div>
    <script src="JS/script.js"></script>
</body>
</html>
<?php
if(isset($_POST["submit"])){
    $name = $_POST["item-name"];
    $pricelbp = $_POST["price-lbp"];
    $priceusd = $_POST["price-usd"];
    $category = $_POST["category"];
    $ingredients = $_POST["ingredients"];

    $query = "INSERT INTO items (item_name, item_category, item_pricelbp, item_ingredients, item_priceusd) VALUES ('$name', '$category', '$pricelbp', '$ingredients','$priceusd')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo '<div class="container">Item Added</div>';
        echo '<script>window.location.assign("additem.php")</script>';
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>