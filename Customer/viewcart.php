<?php
include_once "../shared/customer-authguard.php";
include "menu.html";
include "../shared/connection.php";

$userid = $_SESSION['userid'];

$result = mysqli_query($conn, "select c.*, p.*, u.username as seller_username
                              from cart c
                              join product p on c.pid = p.pid
                              join user u on p.uploaded_by = u.userid
                              where c.userid = $userid and c.status = 'A' and p.status = 'A'");

if (mysqli_num_rows($result) == 0) 
{
    header("location:empty.php");
    exit(); // Add exit to stop executing further code
}
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <style>
             .card
            {
                background-color: rgb(239, 245, 238,0.9);
                height:470px;
                margin:1px;
            }
            .card-img-top
            {
                width:92%;
                margin: 8px;
                height: 150px;
                object-fit: cover;
                object-position: center;
                
            }
            .card-text
            {
                height: 85px;
                overflow: scroll;
                font-size: small;
            }
            
            .scroll-content 
            {
                width: calc(100% + 16px); /* Adjust for scrollbar width */
                overflow: auto;
                margin-right: -16px; 
                padding-right: 16px; 
            }
            .scroll-content::-webkit-scrollbar 
            {
                width: 2px;
                height: 0;
            }

            .scroll-content::-webkit-scrollbar-track 
            {
                background-color: #f1f1f1;
            }

            .scroll-content::-webkit-scrollbar-thumb 
            {
                background-color: #888;
                border-radius: 4px;
            }
            .scroll-content:hover::-webkit-scrollbar-thumb 
            {
                background-color: #555;
            } 
            .overflow
            {
                
                display:flex;
                flex-wrap:wrap;
            }
            .place-order
            {
                margin-top:100px;
            }
        </style>
        </head>
    <body></body>
</html>

<?php

$total=0;
echo "<div class='d-flex flex-wrap'>";
while($row=mysqli_fetch_assoc($result))
{
    $cartid=$row['cartid'];
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $detail=$row['detail'];
    $imgpath=$row['imgpath'];
    $quantity=$row['qty'];
    $s_username=$row['seller_username'];
    $total=$total+($price*$quantity);
    echo "";
    echo "";
    echo "<div class='card' style='width: 14.6rem;'>
    <img src='$imgpath' class='card-img-top' alt=''>
    <div class='card-body'>
        <h5 class='card-title'>$name</h5>
        <h5 class='card-title text-danger'>Rs. $price</h5>
        <p class='scroll-content card-text'><span class='text-success'style='font-weight:bold;'>Seller: $s_username<br></span>$detail</p>
        <form action='updatecart.php' method='POST'>
            <input type='hidden' name='cartid' value='$cartid'>
            <input type='hidden' name='pid' value='$pid'>
            <label for='quantity'style='display:inline;'>Qty:</label>
            <input type='number' class='form-control' style='width:35%; display:inline;font-size:12px;margin-right:10px;'  id='quantity' name='quantity' value='$quantity' min='1'>
            <button type='submit' class='btn btn-primary' style='font-size:13px;display:inline; width:40%;'>Update Quantity</button><br><br>
        </form>
        <div class='d-flex justify-content-center'>
            <a href='deletecart.php?cartid=$cartid' class='btn btn-danger' style:'width:50%; text-align:center;'>Remove from Cart</a>
        </div>
    </div>
</div>";
}
echo "<div class='place-order p-3 w-25'>
<div class='display-3 text-white'>Rs.$total</div>
<a href='placeorder.php?s_username=$s_username'>
    <button class='btn btn-success mt-2'>Place Order</button>
</a>
</div>";
echo "</div>";
?>