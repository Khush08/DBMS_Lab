<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="res.css">
</head>
    <body>
        <?php
            $conn=new mysqli('localhost','root','','dbms');
            if($conn->connect_error){
                die($conn->connect_error);
            }
            else{
                $stmt="SELECT email, mobile_no from customers C where C.customer_id IN( SELECT customer_id from cars_sold where agreed_price>1000000 AND customer_id in(SELECT customer_id from cars_sold where agreed_price<2000000))";
                $res=mysqli_query($conn,$stmt);
                if(!$res){
                    die("Querry failed!");
                }
                while($row=mysqli_fetch_assoc($res)){
                    foreach($row as $key=>$val){
                        echo "{$key}:"."{$val}<br />";
                    }
                    echo "<br /><hr /><br />";
                }
                
            }
        ?>
        <button id="goback"> << BACK</button>
        <script>
            var addcustomer=document.getElementById("goback");
            addcustomer.onclick=function addCusDetails(){
                window.open("details.html");
            }
        </script>
    </body>
</html>

