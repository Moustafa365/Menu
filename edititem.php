<?php include "connection.php";
      session_start();
      if($_SESSION["isAdmin"] != true){
        echo '<script>window.location.assign("index")</script>';
    }
?>

<?php
    $item = $_GET["item"];
    $category = $_GET["category"];
    if (isset($_POST["submit"])) {
        $id = $_POST['id'];
        $name = $_POST['item-name'];
        $pricelbp = $_POST['price-lbp'];
        $priceusd = $_POST['price-usd'];
        $ingredients = $_POST["ingredients"];
        $cat = $_POST["category"];
      
        $sql = "UPDATE `items` SET `item_name`='$name',`item_pricelbp`='$pricelbp', `item_ingredients`= '$ingredients', `item_priceusd`='$priceusd', `item_category`= '$cat' WHERE item_id = '$id'";
      
        $result = mysqli_query($conn, $sql);
      
        if ($result) {
          echo '<script>window.location.assign("viewitems.php")</script>';
        } else {
          echo "Failed: " . mysqli_error($conn);
        }
      }

    if($item != null){
        $sql = "SELECT * FROM items WHERE item_name='$item' AND item_category='$category'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
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
        <h1>Edit Item </h1>
        <form action="edititem.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $row["item_id"]; ?>">

            <label for="item-name">Item Name</label>
            <input type="text" id="item-name" name="item-name" value="<?php echo $row['item_name']; ?>" required>
            
            <label for="ingredients">Item Ingredients</label>
            <textarea type="text" id="ingredients" name="ingredients" value="<?php echo $row['item_ingredients']; ?>" rows="4"></textarea>

            <label for="price-lbp">Item Price (lbp)</label>
            <input type="number" id="price-lbp" name="price-lbp" value="<?php echo $row['item_pricelbp']; ?>">
            
            <label for="price-usd">Item Price (usd)</label>
            <input type="number" id="price-usd" name="price-usd" value="<?php echo $row['item_priceusd']; ?>" step="0.01">

            
            <label for="category">Item Category</label>
            <select name="category" id="category" required>
                <option value="<?php echo $row["cat_name"] ?>"></option>
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
        <button type="submit" name="submit" value="update">Edit Item</button> 
        </form>
        <br>
        <a href="viewitems.php" style="margin-left: 40%;"><button>BACK</button></a>
    </div>
    <script src="JS/script.js"></script>
</body>
</html>


