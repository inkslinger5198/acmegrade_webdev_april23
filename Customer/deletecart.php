<?php

    include_once "../shared/connection.php";
    $cartid=$_GET['cartid'];

    $status= mysqli_query($conn,"delete from cart where cartid=$cartid");

    if($status)
    {
        echo "product deleted succesfully";
        header("location:viewcart.php");
    }
    else
    {
        alert ('Deletion failed');
        header("location:error.php");
        echo mysqli_error($conn);

    }
    

?>