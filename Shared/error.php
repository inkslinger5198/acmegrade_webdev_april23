<html>
  <head>
    <title>Centered Message</title>
    <style>
        body 
        {
            background-image: url(../Shared/Background\ 6.jpg);
            background-position: center;
            margin:10px;
            background-repeat: no-repeat;
            background-attachment: fixed ;
            background-size: cover;
            height: 100vh;
            overflow: scroll;
            font-family: Arial, sans-serif;
        }
        body::-webkit-scrollbar 
        {
            width: 2px;
            height: 0;
        }
        body::-webkit-scrollbar-track 
        {
            background-color: #f1f1f1;
        }

        body::-webkit-scrollbar-thumb 
        {
            background-color: #888;
            border-radius: 4px;
        }
        body::-webkit-scrollbar-thumb 
        {
            background-color: #555;
        }
        .bg-cen
        {
            display:flex;
            align-items:center;
            justify-content:center;
            height:100vh;
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


