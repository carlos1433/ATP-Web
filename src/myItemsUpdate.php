<?php 
session_start();
include('connect.php');
include('session_check.php');

$date = date("Y/m/d");
if (isset($_POST['isReturned'])) {
    $ids = implode("','", $_POST['isReturned']);
    $sql = "UPDATE items
            SET item_returned = 1, item_return_date = '$date'
            WHERE item_ID in ('$ids')";
    mysqli_query($connection, $sql);
}
header('Location: myItems.php');
?>