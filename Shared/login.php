<?php

    session_start();
    $_START['login status']=false; //assuming at the start login fails
    
    $uname=$_POST['username'];
    $upass=$_POST['pass1'];
        
    $login_cipher_text=md5($upass);//encrypting the password 'upass' using md5

    include_once "../shared/connection.php";

    $query="select * from user where username='$uname' and password='$login_cipher_text'";
    
    $result=mysqli_query($conn,$query);

    $row_count=mysqli_num_rows($result);

    if($row_count==0)
    {
        echo "Invalid Credentials<br>";
        header("location:../shared/Auth_error.php");
    }
    else
    {
        $row=mysqli_fetch_assoc($result);
        print_r($row);//This is taking out an individual row from the user db
        $_SESSION['login status']=true;

        //extracting data from the session
        $_SESSION['userid']=$row['userid'];
        $_SESSION['username']=$row['username'];
        $_SESSION['usertype']=$row['usertype'];
        $_SESSION['status']=$row['status'];

        //Based on the type of user redirect page to the vendor home page or customer home page
        if($row['usertype']=="vendor")
        {
            header("location:../vendor/view.php");
        }
        else if($row['usertype']=="customer")
        {
            header("location:../customer/home.php");
        }
        else if($row['usertype']=="super")
        {
            header("location:../admin/home.php");
        }
        else if($row['status']!="A")
        {
            echo "Blocked user";
            header("location:Blocked.php");
            die;
        }
        else // INVALID USER, not in the code provided in class
        {
            echo "Invalid usertype";
            header("location:Auth_error.php");
            die;
        }
    }


?>