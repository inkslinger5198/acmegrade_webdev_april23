<?php
include_once "../shared/customer-authguard.php";
include "../shared/connection.php";

$cartid = $_POST['cartid'];
$pid = $_POST['pid'];
$quantity = $_POST['quantity'];

mysqli_query($conn, "update cart set qty=$quantity where cartid=$cartid");

header("location: viewcart.php");
exit();
?>
