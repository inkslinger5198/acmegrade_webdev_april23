<?php

include_once "../shared/customer-authguard.php";
include_once "../shared/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    if (isset($_POST['review_by'], $_POST['review'], $_POST['rating'], $_POST['pid'])) 
    {
        $review_by = $_POST['review_by'];
        $review = $_POST['review'];
        $rating = $_POST['rating'];
        $pid = $_POST['pid'];
        $orderid=$_POST['orderid'];

        
        if ($rating < 1 || $rating > 5) {
            echo "Invalid rating. Please provide a rating between 1 and 5.";
            header("location:error.php");
            exit;
        }

        $result = mysqli_query($conn, "insert into review (review_by, review, rating, pid, orderid) values ('$review_by', '$review', '$rating', '$pid','$orderid')");

        if ($result) 
        {
            echo "Review stored successfully.";
            header("location:viewreview.php?pid=$pid");
        } 
        else 
        {
            echo "Failed to store the review.";
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
