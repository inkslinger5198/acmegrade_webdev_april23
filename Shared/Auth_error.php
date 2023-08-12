
<html>
  <head>
    <title>Centered Message</title>
    <style>
        body
        {
            background-image: url(Background\ 6.jpg);
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
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container 
        {
            text-align: center;
        }

        .message 
        {
            background-color:  hsla(197, 6%, 76%, 0.7);
            padding: 75px;
            border-radius: 12px;
        }

        h1 
        {
            font-size: 50px;
            color: #121212;
        }

        p 
        {
            font-size: 20px;
            color: #2c2c2c;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="message">
        <h1>Unauthorised!</h1>
        <p>Looks like your Credentials are invalid.<br>Please check that you have entered the correct username and password.<br>If the issue persists, it might be possible your account was blocked.<br><br>Contact us at: support123@email.com</p>
      </div>
    </div>
    x
  </body>
</html>
<?php
session_start();
die;
?>
