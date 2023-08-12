<?php
    include_once "authguard.php";
    include "../shared/connection.php";
    $pid=$_GET['pid'];

    $status= mysqli_query($conn,"delete from product where pid=$pid");
    $status2=mysqli_query($conn,"delete from cart where pid=$pid");
    if($status && $status2)
    {
        echo "product deleted succesfully";
        header("location:products.php");
    }
    else
    {
        header("location:error.php");
        alert ('Deletion failed');

    }
?>