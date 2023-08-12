
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
          padding: 100px;
          border-radius: 12px;
        }

        h1 
        {
          font-size: 45px;
          color: #121212;
        }
        p
        {
          font-size: 22px;
          color: #2c2c2c;
        }
        
    </style>
    <script>
          function delayRedirect() 
          {
            setTimeout(function() {window.location.href = "login.html";}, 5000); // Delay in milliseconds (5 seconds in this example)
          }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="message">
        <h1>Registration Success!</h1>
        <p>Redirecting to Login page...</p>
        <script>
          delayRedirect();
        </script>
        </div>
    </div>

  </body>
</html>
<?php
session_start();
die;
?>
