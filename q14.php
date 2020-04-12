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
                $stm="create view frequent as Select car_feature_id from customer_preferences GROUP by car_feature_id order by count(*) DESC LIMIT 1";
                $res1=mysqli_query($conn,$stm);
                if(!$res1){
                    die("Querry failed!");
                }
                $stmt="SELECT manufacture_name, model_name from features_on_cars_for_sale fcs, cars_for_sale cfs, car_models cm WHERE fcs.cars_for_sale_id=cfs.cars_for_sale_id AND cfs.model_code=cm.model_code AND fcs.car_feature_id IN (Select car_feature_id from frequent)";
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

