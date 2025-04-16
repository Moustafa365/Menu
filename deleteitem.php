<?php
include "connection.php";

session_start();
if ($_SESSION["isAdmin"] != true) {
    echo '<script>window.location.assign("index")</script>';
    exit();
}

if (isset($_GET['item'])) {
    $item_id = $_GET['item'];
    
    $sql = "DELETE FROM items WHERE item_id = '$item_id'";
    
    if (mysqli_query($conn, $sql)) {
        echo '<script>window.location.assign("viewitems.php")</script>';
    } else {
        echo "Error deleting item: " . mysqli_error($conn);
    }
}
// Close the database connection
$conn->close();
?>