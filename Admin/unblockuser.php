<?php
    include_once "authguard.php";
    include "../shared/connection.php";
    $userid=$_GET['userid'];

    $status= mysqli_query($conn,"update user set status='A' where userid=$userid");
    $status2=mysqli_query($conn,"update product set status='A' where uploaded_by=$userid");
    $status3=mysqli_query($conn,"update cart set status='A' where uploaded_by=$userid");
    if($status && $status2 && $status3)
    {
        echo "Account Unblocked Successfully";
        header("location:home.php");
    }
    else
    {
        header("location:error.php");
        alert ('Deletion failed');

    }
    

?>