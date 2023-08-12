<?php
include_once "../shared/vendor-authguard.php";
include "menu.html";
?>
<html>
  <head>
    <title>Centered Message</title>
    <style>
        
        body
        {
          font-family: Arial, sans-serif;
          margin:10px;
        }
        .bg-cen
        {
            display:flex;
            align-items:center;
            justify-content:center;
            height:75vh;
        }

        .message 
        {
            background-color:  hsla(197, 6%, 76%, 0.7);
            padding: 100px;
            border-radius: 12px;
            font-family: "Times New Roman", Times, serif;
        }

        h1 
        {
            text-align:center;
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
    <div class="d-flex justify-content-center mt-2 align-items-center bg-cen">
      <div class="message">
        <h1>ERROR!</h1>
        <p>Looks like something went wrong</p>
      </div>
    </div>
    
  </body>
</html>


