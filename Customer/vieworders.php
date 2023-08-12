<?php
include_once "../shared/customer-authguard.php";
include "menu.html";

$userid=$_SESSION['userid'];
include_once "../shared/connection.php";

$result = mysqli_query($conn, "select o.*, u.username as seller_username
                              from orders o
                              join user u on o.uploaded_by = u.userid
                              where o.userid = $userid");

if (mysqli_num_rows($result) == 0) 
{
    header("location:empty.php");
    exit(); // Add exit to stop executing further code
}
?>
<html>
    <head>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <style>
             .card
            {
                background-color: rgb(239, 245, 238,0.9);
                height:485px;
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
        </style>
        </head>
    <body>
        
    </body>
</html>

<?php
    
    
    echo "<div class='d-flex overflow'>";
    while($row=mysqli_fetch_assoc($result))
    {
        $orderid=$row['orderid'];
        $pid=$row['pid'];
        $name=$row['name'];
        $price=$row['price'];
        $detail=$row['detail'];
        $imgpath=$row['imgpath'];
        $time=$row['created_date'];
        $qty=$row['qty'];
        $s_username=$row['seller_username'];
        $order_status=$row['order_status'];

        echo "<br><div class='card' style='width: 14.6rem;'>
                <img src='$imgpath' class='card-img-top'  alt=''>
                <div class='card-body'>
                    <h5 class='card-title'>$name</h5>
                    <h6 class='card-title text-danger' style='display:inline;'>Rs. $price</h6>
                    <h6 style='display:inline;text-align:right;margin-left:30px'class='card-title text-success'>Quantity: $qty</h6>
                    <p class='scroll-content card-text' style='margin-top:2px;'><span class='text-primary'style='font-weight:bold;'>Seller: $s_username<br></span>$detail</p>
                    <p style='color:blue;'>Order Placed on: $time</p>";
                    if($order_status=='R')
                    {
                        echo "<h5 class='text-primary'>Product returned</h5>
                        <a href='review.php?userid=$userid&pid=$pid&orderid=$orderid' class='btn btn-primary'>Review</a>"; //WORKS
                    }
                    else if($order_status=='C')
                    {
                        echo "<h5 class='text-danger'>Order Cancelled</h5>"; //WORKS
                    }
                    else if($order_status=='D')
                    {
                        echo "<h6 class='text-success'>Order Delivered</h6>
                        <a href='review.php?userid=$userid&pid=$pid&orderid=$orderid' class='btn btn-primary'>Review</a> <!--WORKS-->
                        <a href='return.php?orderid=$orderid' class='btn btn-primary'>Return</a> <!--WORKS-->
                        ";
                    }
                    else //WORKS
                    {
                        echo"
                        <a href='deleteorder.php?orderid=$orderid' class='btn btn-danger'>Cancel Order</a>";
                        
                    }

                echo"
                
                </div>
            </div>";
    }
    echo "</div>"
?>