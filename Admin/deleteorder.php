<?php
    include_once "../shared/authguard.php";
    include "../shared/connection.php";
    $orderid=$_GET['orderid'];

    $status= mysqli_query($conn,"update orders set order_status='C' where orderid=$orderid");

    if($status)
    {
        echo "Order Cancelled succesfully";
        if(isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);}
    }
    else
    {
        alert ('Deletion failed');
        header("location:error.php");
        echo mysqli_error($conn);

    }
    

?>