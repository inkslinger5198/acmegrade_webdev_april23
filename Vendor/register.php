<?php
   
    $uname=$_POST['username'];
    $upass=$_POST['pass1'];

    $cipher_text=md5($upass);//encryption
    
    include_once "../shared/connection.php";
    
    $status=mysqli_query($conn,"insert into user(username,password,usertype) values('$uname','$cipher_text','vendor')");
    
    if($status)
    {
        echo "Registration Success<br>";
        header("location:../shared/registersuccess.php");
    }
    else
    {
        echo "Registration Failed<br>";
        echo mysqli_error($conn);
        header("location:error.php");
    }


?>