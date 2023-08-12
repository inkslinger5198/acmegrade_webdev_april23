<?php
    include "../shared/vendor-authguard.php";
    include_once "../shared/connection.php";
    include "menu.html";
    $userid=$_SESSION['userid'];
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color:white;
        }

        .user-details {
            background-color: hsla(197, 6%, 76%, 0.7);
            border-radius: 5px;
            padding: 20px;
        }

        .attribute {
            font-weight: bold;
        }

        .value {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Details</h1>
        <div class="user-details">
            <?php
            
            $result = mysqli_query($conn," select * from user where userid=$userid");
   
            while ($row=mysqli_fetch_assoc($result)) 
            {
                $userid=$row['userid'];
                $usertype=$row['usertype'];
                $username=$row['username'];
                $created_date=$row['created_date'];
                $status=$row['status'];
                echo "<p><span class='attribute'>User ID:</span> <span class='value'>" . $userid . "</span></p>
                    <p><span class='attribute'>User Type:</span> <span class='value'>" . $usertype. "</span></p>
                    <p><span class='attribute'>Username:</span> <span class='value'>" . $username . "</span></p>
                    <p><span class='attribute'>Created Date:</span> <span class='value'>" . $created_date . "</span></p>";
                if($status=='A')
                {
                    echo "<p><span class='attribute'>Status:</span> <span class='value'>" . 'Active Account' . "</span></p>";
                }
                else
                {
                    echo "<p><span class='attribute'>Status:</span> <span class='value'>" . 'Blocked Account' . "</span></p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
