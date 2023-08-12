<?php
    include_once "../shared/vendor-authguard.php";
    include "menu.html";

    $userid = $_SESSION['userid'];
    $pid=$_GET['pid'];
    include_once "../shared/connection.php";

    $result = mysqli_query($conn, "select * from review where pid=$pid");
    if (mysqli_num_rows($result) == 0) {
        header("location:empty.php");
        exit(); 
    }
?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <style>
            .card
            {
                background-color: rgb(239, 245, 238,0.9);
                height:275px;
                margin:1px;
            }
            .card-text
            {
                height:100px;
                overflow: scroll;
                font-size:15px;
            }
            
            .scroll-content 
            {
                width: calc(100% + 16px); /* Adjust for scrollbar width */
                overflow: auto;
                margin-right: -16px; 
                padding-right: 16px; 
            }
            .scroll-content::-webkit-scrollbar 
            {
                width: 2px;
                height: 0;
            }

            .scroll-content::-webkit-scrollbar-track 
            {
                background-color: #f1f1f1;
            }

            .scroll-content::-webkit-scrollbar-thumb 
            {
                background-color: #888;
                border-radius: 4px;
            }
            .scroll-content:hover::-webkit-scrollbar-thumb 
            {
                background-color: #555;
            } 
            .overflow
            {
                display:flex;
                flex-wrap:wrap;
            }
            .btn
            {
                padding:5px 10px;
                font-size:14px;
            }
        </style>
    </head>
    <body>
        <div class="d-flex overflow">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $review_id = $row['reviewid'];
                $review_by = $row['review_by'];
                $review = $row['review'];
                $rating = $row['rating'];
                $pid = $row['pid'];

                echo "<div class='card' style='width: 14.6rem;'>
                        <div class='card-body'>
                            <h5 class='card-title text-primary' style='padding:8px 0px;'>Customer Id: $review_by</h5>
                            <p class='card-text scroll-content'>Review: $review</p>
                            <p class='text-danger'>Rating: $rating</p>
                            <p class='text-success'>Product Id: $pid</p>
                        </div>
                    </div>";
            }
            ?>
        </div>
    </body>
</html>
