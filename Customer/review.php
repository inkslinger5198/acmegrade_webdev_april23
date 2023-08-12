<?php

include_once "../shared/customer-authguard.php";
include "menu.html";
include_once "../shared/connection.php";
$userid = $_GET['userid'];
$orderid=$_GET['orderid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .auth-parent
        {
            display:flex;
            justify-content:space-around;
        }
        .bg-cen
        {
            display:flex;
            align-items:center;
            justify-content:center;
            height:80vh;
        }
        .bg-form
        {
            background-color:#043927;
            border-radius:12px;
        }
        .h
        {
            color:white;
            margin:3px;
            padding-bottom: 10px;
        }
        label
        {
            color:white;
        }
        .cen
        {
            display:flex;
            align-items:center;
            justify-content:center;
        }
    </style>
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    if (isset($_GET['pid'])) 
    {
        $pid = $_GET['pid'];
        $result = mysqli_query($conn, "select * from orders where orderid=$orderid");

        if (mysqli_num_rows($result) == 1) 
        {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            

            echo "
            <div class='d-flex justify-content-center mt-2 align-items-center bg-cen'>
                <form method='post' action='reviewupdate.php' class='w-25 bg-form p-4' enctype='multipart/form-data'>
                    <h2 class='h'>Write a Review</h2>
                    <input type='hidden' name='pid' value='$pid'>
                    <input type='hidden' name='orderid' value='$orderid'>
                    <label for='review'>Review:</label><br>
                    <textarea required class='form-control mt-2' name='review'></textarea><br>
                    <label for='rating'>Rating (1-5):</label><br>
                    <input required type='number' class='form-control mt-2' name='rating' min='1' max='5'><br>
                    <input type='hidden' name='review_by' value='$userid'>
                    <div class='align-items-center justify-content-center cen'>
                        <button type='submit' class='btn btn-success' style='margin-right:10px;'>Submit Review</button>
                        <a href='viewreview.php?pid=$pid' style='text-decoration:none;' class='btn btn-primary'>View Reviews</a>
                    </div>
                </form>
            </div>
            ";
        } 
        else 
        {
            echo "Product not found.";
            header("location:error.php");
        }
    } 
    else 
    {
        echo "Invalid product ID.";
        header("location:error.php");
    }
} 
else 
{
    echo "Invalid request.";
    header("location:error.php");
}
?>

</body>
</html>
