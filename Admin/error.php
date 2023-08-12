<?php
include_once "authguard.php";
include "menu.html";
?>
<html>
  <head>
    <title>Centered Message</title>
    <style>
        body
        {
            background-image: url(../shared/Background\ 6.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100%;
            overflow: hidden;
        }
        body 
        {
            margin: 0;
            display: flex;
            justify-items:center;
            height: 100vh;
        }
        .container 
        {
            display:flex;
            align-self: center;
            justify-self: center;
            text-align: center;
            
        }

        .message 
        {
            background-color:  hsla(197, 6%, 76%, 0.7);
            padding: 100px;
            border-radius: 12px;
        }

        h1 
        {
            font-size: 60px;
            color: #121212;
        }

        p 
        {
            font-size: 35px;
            color: #2c2c2c;
        }
        
    </style>
  </head>
  <body>
    <div class="container">
      <div class="message">
        <h1>ERROR!</h1>
        <p>Looks like something went wrong</p>
      </div>
    </div>
    
  </body>
</html>


