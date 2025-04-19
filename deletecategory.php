<?php
include "connection.php";

session_start();
if ($_SESSION["isAdmin"] != true) {
    echo '<script>window.location.assign("index")</script>';
    exit();
}

if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];

    $sql = "DELETE FROM categories WHERE cat_id = '$cat_id'";

    if (mysqli_query($conn, $sql)) {
        echo '<script>window.location.assign("viewcategories.php")</script>';
    } else {
        echo "Error deleting category: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>