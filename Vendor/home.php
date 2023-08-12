<?php
    include_once "../shared/vendor-authguard.php";
    include "menu.html";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .auth-parent
        {
            display:flex;
            justify-content:space-around;
        }
        .bg-cen
        {
            display:flex;
            align-items:center;
            justify-content:center;
            height:80vh;
        }
        .bg-form
        {
            background-color:#043927;
            border-radius:12px;
        }
        .h
        {
            color:white;
            margin:3px;
            padding-bottom: 10px;
        }
    </style>
    </head>
<body>
    <div class="d-flex justify-content-center mt-2 align-items-center bg-cen">
        <form action="upload.php" method="post" class="w-25 bg-form p-4" enctype="multipart/form-data">
            <h2 class="h">Upload Here...</h2>
            <input required type="text" class="form-control mt-2" name="name" placeholder="Product Name">
            <input required type="number" class="form-control mt-2" name="price" placeholder="Product Price">
            <textarea required class="form-control mt-2" name="detail" id="" cols="30" rows="5" placeholder="Product Description"></textarea>  
            <input required class="form-control mt-2" name="pdtimg" type="file" accept=".jpg">
            <div class="text-center">
                <button class="mt-3 btn btn-success">Upload</button>
            </div>
        </form>
    </div>
</body>
</html>
