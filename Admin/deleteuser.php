<?php
    include_once "authguard.php";
    include "../shared/connection.php";
    
    $userid=$_GET['userid'];

    $status= mysqli_query($conn,"delete from user where userid=$userid");
    $status2=mysqli_query($conn,"delete from product where uploaded_by=$userid");
    $status3=mysqli_query($conn,"delete from cart where uploaded_by=$userid");
    if($status && $status2 && $status3)
    {
        echo "User Deleted Successfully";
        header("location:home.php");
    }
    else
    {
        header("location:error.php");
        echo "<script>alert ('Deletion failed')</script>";

    }
    

?>