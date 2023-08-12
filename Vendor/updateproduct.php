<?php

include_once "../shared/vendor-authguard.php";
include_once "../shared/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['pid'], $_POST['name'], $_POST['price'], $_POST['detail'], $_POST['imgpath'])) 
    {
        $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $detail = $_POST['detail'];
        $imgpath = $_POST['imgpath'];


        $result = mysqli_query($conn, "update product set name='$name', price='$price', detail='$detail', imgpath='$imgpath' where pid=$pid");

        if ($result) 
        {
            echo "Product details updated successfully.";
            header("location:view.php");
        } else 
        {
            echo "Failed to update product details.";
            header("location:error.php");
        }
    } 
    else 
    {
        echo "Invalid form data.";
        header("location:error.php");
    }
} 
else 
{
    echo "Invalid request.";
    header("location:error.php");
}
?>
