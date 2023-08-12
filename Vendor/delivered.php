<?php
    include "../shared/vendor-authguard.php";
    include_once "../shared/connection.php";
    $orderid=$_GET['orderid'];

    $status= mysqli_query($conn,"update orders set order_status='D' where orderid=$orderid");

    if($status)
    {
        echo "Order delivered succesfully";
        header("location:vieworder.php");
    }
    else
    {
        alert ('Deletion failed');
        header("location:error.php");
        echo mysqli_error($conn);

    }
    

?>