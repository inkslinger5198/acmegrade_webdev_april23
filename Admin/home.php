<?php
include_once "authguard.php";
include "menu.html";
include "../shared/connection.php";
$userid=$_SESSION['userid'];
$result=mysqli_query($conn,"select * from user order by usertype");
if (mysqli_num_rows($result) == 0) {
    header("location:empty.php");
    exit();
}
?>
<html>
    <head>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
        <style>
             .card
            {
                background-color: rgb(239, 245, 238,0.9);
                height:230px;
                margin:1px;
            }
            body
            {
                margin:10px;
            }
            .overflow
            {
                
                display:flex;
                flex-wrap:wrap;
            }
            .section-heading 
            {
                font-size: 45px;
                font-family: "Times New Roman", Times, serif;
                font-weight: bold;
                margin-top:13px;
                color: rgb(99, 129, 103);
                display:block;
            }
            .divider 
            {
                width: 100%;
                height: 2px;
                background-color: #000;
                margin: 20px 0;
            }
        </style>
        </head>
    <body>
        
    </body>
</html>

<?php

    
echo "<div class='d-flex overflow'>";

$previousUserType = null;

while($row = mysqli_fetch_assoc($result)) {
    $userid = $row['userid'];
    $username = $row['username'];
    $password = $row['password'];
    $usertype = $row['usertype'];
    $time = $row['created_date'];
    $status = $row['status'];

    if ($usertype !== $previousUserType) {
        echo "</div>"; 
        echo "<div class='section-heading'>";

        if ($usertype == 'customer') {
            echo "Customers";
        } elseif ($usertype == 'vendor') {
            echo "Vendors";
        } elseif ($usertype == 'super') {
            echo "Superadmins";
        }

        echo "</div>";
        echo "<div class='d-flex overflow'>";
        
        echo "<div class='divider'></div>";

        $previousUserType = $usertype;
    }

    echo "<br><div class='card' style='width: 14.6rem;'>
            <div class='card-body'>";
                if($usertype=='vendor')
                {
                    echo "<a href='viewproduct.php?userid=$userid' style='text-decoration:none'><h5 class='card-title' style='font-weight:bold;color:rgb(114, 35, 6);'>Username: $username</h5></a>";
                }
                else if($usertype=='customer')
                {
                    echo "<a href='vieworder.php?userid=$userid' style='text-decoration:none'><h5 class='card-title' style='font-weight:bold;color:rgb(114, 35, 6);'>Username: $username</h5></a>";
                }
                else
                {
                    echo "<h5 class='card-title' style='font-weight:bold;color:rgb(114, 35, 6);'>Username: $username</h5>";
                }
                echo "<p style='font-weight:bold; color:rgb(165, 81, 50); margin:0 0 8px;'>Usertype: $usertype</p>
                <p style='font-weight:bold;'>User Id: $userid</p>                    
                <p style='color:blue;font-size: 14px;'>Account created on: $time</p>";      
                if($usertype!='super')  
                {
                    echo "<a href='deleteuser.php?userid=$userid' class='btn btn-danger' style='margin-right:7px'>Delete</a>";
                    if ($status == 'A') 
                    {
                        echo "<a href='blockuser.php?userid=$userid' class='btn btn-danger'>Block</a>";
                    } 
                    else 
                    {
                        echo "<a href='unblockuser.php?userid=$userid' class='btn btn-success'>Unblock</a>";
                    }
                
                }      
                

    
    echo "</div></div>";
}
echo "</div>"; 

echo "</div>"

?>