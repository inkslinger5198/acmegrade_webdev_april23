<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .auth-parent
        {
            display:flex;
            justify-content:space-around;
        }
    </style>
</head>
<body>
</body>
</html>
<?php
    session_start();

    

    if(!isset($_SESSION['login status']))
    {
        echo "Illegal Attempt";
        header("location:../shared/Auth_error.php");
        die;
    }
    if($_SESSION['login status']!=true)
    {
        echo "Unauthorized Credentials";
        header("location:../shared/Auth_error.php");
        die;
    }
    $usertype=$_SESSION['usertype'];
    $status=$_SESSION['status'];
    if($usertype!='vendor')
    {
        echo "Unauthorised";
        header("location:../shared/Auth_error.php");
        die;
    }
    if($status!='A')
    {
        echo "Blocked";
        header("location:../shared/Blocked.php");
    }

    $userid=$_SESSION['userid'];
    $username=$_SESSION['username'];
    
    

    
?>
