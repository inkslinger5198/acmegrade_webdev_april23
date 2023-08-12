<?php
    include_once "../shared/customer-authguard.php";
    include "../shared/connection.php";
    include "menu.html";
?>
<html>
<head>
  <title>Order Receipt</title>
  <style>   
        body
        {
            height:100vh;
            overflow: scroll;
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
        .receipt 
        {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 
        {
            color: #333;
        }

        h2 
        {
            color: #666;
        }

        table 
        {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td 
        {
            padding: 8px;
            text-align: left;
            width: 330px;
        }

        th 
        {
            background-color: #f2f2f2;
        }

        strong 
        {
            font-weight: bold;
        }
  </style>
</head>
<body>
</body> 
</html>

<?php
$s_username=$_GET['s_username'];
$result=mysqli_query($conn, "select * from cart join product on cart.pid=product.pid where userid=$userid and cart.status='A' and product.status='A'");
$n=0;$total=0;

echo "<div class='receipt'>
            <h1>Order Receipt</h1>
            
            <p><strong>Customerid:</strong> $userid</p>
            <table>
                <tr>
                    <th>Product </th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Seller Name</th>
                    <th>Details</th>
                </tr>
            </table>

    </div>";

while($row=mysqli_fetch_assoc($result))
{
    $cartid=$row['cartid'];
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $detail=$row['detail'];
    $imgpath=$row['imgpath'];
    $uploaded_by=$row['uploaded_by'];
    $qty=$row['qty'];
    
    $total=$total+($price*$qty);

    $status=mysqli_query($conn,"insert into orders(userid,pid,name,price,detail,imgpath,uploaded_by,qty) values('$userid',$pid,'$name', $price,'$detail','$imgpath',$uploaded_by,$qty)");   
    
    if($status)
    {
        
        $s=mysqli_query($conn,"delete from cart where cartid=$cartid");

        if($s)
        {
            $n=$n+1;
            echo "
            <div class='receipt' >
                <table>
                <tr>
                <td >$name</td>
                <td >$price</td>
                <td >$qty</td>
                <td >$s_username</td>
                <td >$detail</td>
                </tr>
                </table>            
            </div>
            ";    
        }
        else
        {
            echo "Error<br>";
            echo mysqli_error($conn);
            header("location:error.php");
        }
    }
    else
    {
        echo "$name was not added to the orders. Error<br>";
        echo mysqli_error($conn);
        header("location:error.php");
    }

}
echo "<div class= 'receipt'>
<h2>Total: $total</h2>
</div>";

?>