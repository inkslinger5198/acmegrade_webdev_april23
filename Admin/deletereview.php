<?php

    include_once "../shared/connection.php";
    $reviewid=$_GET['reviewid'];
    $pid=$_GET['pid'];
    $status= mysqli_query($conn,"delete from review where reviewid=$reviewid");

    if($status)
    {
        echo "review deleted succesfully";
        header("location:viewreview.php?pid=$pid");
    }
    else
    {
        alert ('Deletion failed');
        header("location:error.php");
        echo mysqli_error($conn);

    }
?>