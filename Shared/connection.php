<?php
    $conn=new mysqli("localhost","root","","acme_apr_23");

    if($conn->connect_error)
    {
        echo "Connection Failed! Aborting execution";
        header("location:../shared/error.php");
        die;
        
    }
?>
