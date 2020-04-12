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
                $stmt="Select email, fuel_type Pref_fuel, transmission_type Pref_audio, manufacture_name Match_man, model_name Match_model from customers C,customer_preferences cp,car_features cf, features_on_cars_for_sale fcs, cars_for_sale cfs, car_models cm where C.customer_id=cp.customer_id AND cp.car_feature_id=cf.car_feature_id and cf.car_feature_id=fcs.car_feature_id and fcs.cars_for_sale_id=cfs.cars_for_sale_id and cfs.model_code=cm.model_code";
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

