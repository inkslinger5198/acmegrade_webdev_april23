<?php
include_once "../shared/customer-authguard.php";
include "../shared/connection.php";
$userid=$_SESSION['userid'];
$pid=$_GET['pid'];
$uploaded_by=$_GET['uploaded_by'];
$quantity = $_GET['quantity'];
$cartResult = mysqli_query($conn, "select * from cart where pid=$pid and userid=$userid and status='A'");
if (mysqli_num_rows($cartResult) > 0) 
{
    $cartRow = mysqli_fetch_assoc($cartResult);
    $existingQuantity = $cartRow['qty'];
    $newQuantity = $existingQuantity + $quantity;

    mysqli_query($conn, "update cart set qty=$newQuantity where pid=$pid and userid=$userid");
} 
else 
{
    mysqli_query($conn, "insert into cart (userid, pid, qty,uploaded_by) values ($userid, $pid, $quantity,$uploaded_by)");
}
header("location: home.php");
exit();
?>
