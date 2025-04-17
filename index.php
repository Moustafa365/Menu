<?php
include "connection.php";
session_start();
?>
<?php if (isset($_GET['error'])): ?>
	    <p><?php echo $_GET['error']; ?></p>
<?php endif ?>

<?php

if (!isset($_GET['category'])) {
    $sql = "SELECT * FROM categories ORDER BY `cat_id` LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cat_name = $row['cat_name'];
        header("Location: index.php?category=" . urlencode($cat_name));
        ob_end_flush();
        exit();
    } else {
        echo "No categories found.";
        exit();
    }
}
else{
    $cat_name = $_GET["category"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Main Menu</title>
  <link rel="stylesheet" href="style/index.css">
</head>
<body>
  <div class="main-container">
    <?php include "header.php"?>
    <h1>Our Menu</h1>
    <h2>Categories</h2>
    <!-- Categories -->
    <div class="category-bar">
      <?php
        $catResult = $conn->query("SELECT * FROM categories ORDER BY `cat_name`");
        while($cat = $catResult->fetch_assoc()) {
          echo "<a href='index.php?category=" . urlencode($cat['cat_name']) . "' class='category-button'>" . htmlspecialchars($cat['cat_name']) . "</a>";
        }
      ?>
    </div>
    <h2><?php echo $cat_name ?></h2>
    <!-- Items -->
    <div class="items-list">
      <?php
        if (isset($_GET['category'])) {
            $selectedCat = $_GET['category'];
            $itemSQL = "SELECT * FROM items WHERE item_category = ?";
            $stmt = $conn->prepare($itemSQL);
            $stmt->bind_param("s", $selectedCat);
            $stmt->execute();
            $items = $stmt->get_result();
          if ($items->num_rows > 0) {
            while ($row = $items->fetch_assoc()) {
              echo "
                <div class='item-card'>
                  <div class='item-info'>
                    <h3>" . htmlspecialchars($row['item_name']) . "</h3>
                    <p class='ingredients'>" . htmlspecialchars($row['item_ingredients']) . "</p>
                  </div>
                  <div class='item-price'>
                  " . number_format($row['item_priceusd'], 2) . "$
                  </div>
                </div>
              ";
            }
          } else {
            echo "<p>No items found in this category.</p>";
          }
        } else {
          echo "<p>Please choose a category to view items.</p>";
        }
      ?>
    </div>
    <?php include "footer.php"?>
  </div>
</body>
</html>