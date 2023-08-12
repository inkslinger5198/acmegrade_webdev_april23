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
            font-family: "Times New Roman", Times, serif;
            padding: 100px;
            border-radius: 12px;
        }

        h1 
        {
            text-align:center;
            font-size: 60px;
            color: #f2f2f2;
        }

        
    </style>
  </head>
  <body>
    <div class="d-flex justify-content-center mt-2 align-items-center bg-cen">
      <div class="message">
        <h1>Looks very empty here!</h1>
      </div>
    </div>
    
  </body>
</html>


