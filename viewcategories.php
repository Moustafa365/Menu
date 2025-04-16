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
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    
  echo '<div class="cat-container">';
    echo '<h1>View Items</h1>';
    if ($result->num_rows > 0) {
    echo '<div class="item-list">';
     echo '<div class="cat-row item-header">';
       echo '<span>Category Name &emsp; &emsp;</span>';
        echo '<span>Edit</span>';
        echo '<span>Delete</span>';
      echo '</div>';

      while($row = $result->fetch_assoc()) {
        echo "<div class='cat-row'>
                <span>".$row["cat_name"]."</span>
                <span><a href='editcategory.php?category=".$row["cat_name"]."'><i id='edit-btn' class='fas fa-pen' ></i></a></span>
                <span><a href='deletecategory.php?id=" . $row["cat_id"] . "' onclick='return confirm(\"Are you sure you want to delete this category?\");'><i id='delete-btn' class='fas fa-trash' ></i></a></span>
              </div>";
      }
    } else {
        echo "<div class='item-row'>No Categories found</div>";
      }
    echo '</div>'; // Close item-list div
    echo "<br>";
    echo "<a href='dashboard.php' style='margin-left: 45%;'><button>BACK</button></a>";
      $conn->close();
      ?>