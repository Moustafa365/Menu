<?php include "connection.php";
      session_start();
      if($_SESSION["isAdmin"] != true){
        echo '<script>window.location.assign("index")</script>';
    }
?>
  <title>View Items</title>
  <link rel="stylesheet" href="style/style4.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <?php
    $sql = "SELECT * FROM items";
    $result = $conn->query($sql);
    
  echo '<div class="dashboard-container">';
    echo '<h1>View Items</h1>';
    if ($result->num_rows > 0) {
    echo '<div class="item-list">';
     echo '<div class="item-row item-header">';
       echo '<span>Item Name</span>';
        echo '<span>Category</span>';
        echo '<span>Price(lbp)</span>';
        echo '<span>Price(usd)</span>';
        echo '<span>Edit</span>';
        echo '<span>Delete</span>';
        echo '</div>';

      while($row = $result->fetch_assoc()) {
        echo "<div class='item-row'>
                <span>".$row["item_name"]."</span>
                <span>".$row["item_category"]."</span>
                <span style='margin-left: 5px'>".$row["item_pricelbp"]." lbp</span>
                <span style='margin-left: 15px;'>".$row["item_priceusd"]." $</span>
                <span><a href='edititem.php?item=".$row["item_name"]."&category=".$row["item_category"]."'><i id='edit-btn' class='fas fa-pen'></i></a></span>
                <span><a href='deleteitem.php?id=" . $row["item_id"] . "' onclick='return confirm(\"Are you sure you want to delete this category?\");'><i id='delete-btn' class='fas fa-trash' ></i></a></span>
              </div>";
              
      }
    } else {
        echo "<div class='item-row'>No items found</div>";
      }
    echo '</div>'; // Close item-list div
    echo "<br>";
    echo "<a href='dashboard.php' style='margin-left: 40%;'><button>BACK</button></a>";
      $conn->close();
      ?>