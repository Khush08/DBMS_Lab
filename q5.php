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
                $stmt="SELECT email, status_description*payment_amt from customers C, payment_status ps, customer_payments cp, cars_sold cs where C.customer_id = cs.customer_id and cs.car_sold_id=cp.cars_sold_id and cp.payment_status_code=ps.payment_status_code and cp.payment_amt is NOT NULL";
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

