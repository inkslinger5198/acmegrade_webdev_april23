<?php
    include_once "../shared/customer-authguard.php";
    include_once "../shared/connection.php";
    $orderid=$_GET['orderid'];

    $status= mysqli_query($conn,"update orders set order_status='R' where orderid=$orderid");

    if($status)
    {
        echo "Order Returned";
        header("location:vieworders.php");
    }
    else
    {
        alert ('Deletion failed');
        header("location:error.php");
        echo mysqli_error($conn);

    }
    

?>