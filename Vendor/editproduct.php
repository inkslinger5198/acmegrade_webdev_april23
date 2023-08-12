<?php

include_once "../shared/vendor-authguard.php";
include "menu.html";
include_once "../shared/connection.php";
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
<body></body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    if (isset($_GET['pid'])) 
    {
        $pid = $_GET['pid'];
        $result = mysqli_query($conn, "select * from product where pid=$pid");

        if (mysqli_num_rows($result) == 1) 
        {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $price = $row['price'];
            $detail = $row['detail'];
            $imgpath = $row['imgpath'];

            echo "
            <div class='d-flex justify-content-center mt-2 align-items-center bg-cen'>
                <form method='post' action='updateproduct.php' class='w-25 bg-form p-4' enctype='multipart/form-data'>
                    <h2 class='h'>Update Here...</h2>
                    <input type='hidden' name='pid' value='$pid'>
                    <label for='name'>Name:</label><br>
                    <input required type='text' class='form-control mt-2' name='name' value='$name'><br>
                    <label for='price'>Price:</label><br>
                    <input required type='text' class='form-control mt-2' name='price' value='$price'><br>
                    <label for='detail'>Detail:</label><br>
                    <textarea required class='form-control mt-2' cols='30' rows=5' name='detail'>$detail</textarea><br>
                    <label for='imgpath'>Image Path:</label><br>
                    <input required type='text' class='form-control mt-2' name='imgpath' value='$imgpath'><br>
                    <div class='align-items-center justify-content-center cen'>
                        <button type='submit' class='btn btn-success'>Update</button>
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




