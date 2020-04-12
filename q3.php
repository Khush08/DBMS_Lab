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
                $stmt="Select email, asking_price, agreed_price, asking_price-agreed_price Discount from customers C, cars_sold cs, cars_for_sale cfs where C.customer_id=cs.customer_id AND cs.cars_for_sale_id=cfs.cars_for_sale_id";
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

