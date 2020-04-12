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
    if(isset($_POST['SUBMIT'])){
        $manufacture=$_POST['man'];
        $category=$_POST['category'];
        $model=$_POST['modelname'];
        $fuel=$_POST['fuel'];
        $audio=$_POST['audio'];
        $transmission=$_POST['transmission'];
        $price=$_POST['price'];
        $mileage=$_POST['mileage'];
        $aquired=$_POST['aquired'];
        $regyear=$_POST['regyear'];
        $conn=new mysqli('localhost','root','','dbms');
        $stmt="select manufactue_code from car_manufactures where manufacture_name='$manufacture'";
        $res1=mysqli_query($conn,$stmt);
        $man_code=mysqli_fetch_row($res1);
        $stmt="select car_feature_id from car_features where fuel_type='$fuel' and audio_company='$audio'and transmission_type='$transmission'";
        $res2=mysqli_query($conn,$stmt);
        $cf_id=mysqli_fetch_row($res2);
        $stmt="select vehicle_category_code from vehicle_categories where description='$category'";
        $res3=mysqli_query($conn,$stmt);
        $vc_code=mysqli_fetch_row($res3);
        $stmt="insert into car_models(manufactue_code,model_name) values('$man_code[0]','$model')";
        mysqli_query($conn,$stmt);
        $stmt="Select max(model_code) from car_models";
        $res4=mysqli_query($conn,$stmt);
        $model_code=mysqli_fetch_row($res4);
        $stmt="insert into cars_for_sale(manufacture_name,model_code,vehicle_category_code,asking_price,current_mileage,date_aquired,registration_year) values('$manufacture','$model_code[0]','$vc_code[0]','$price','$mileage','$aquired','$regyear')";
        mysqli_query($conn,$stmt);
        $stmt="select cars_for_sale_id from cars_for_sale where model_code='$model_code[0]'";
        $res=mysqli_query($conn,$stmt);
        $cfs_id=mysqli_fetch_row($res);
        $stmt="insert into features_on_cars_for_sale(cars_for_sale_id,car_feature_id) values('$cfs_id[0]','$cf_id[0]')";
        mysqli_query($conn,$stmt);
        echo "Database Updated!!!";
        echo "<br /><hr /><br />";
    }
    else{
        echo "NO submission";

    }
?>
    <button id="goback"> << BACK</button>
    <script>
            var addcustomer=document.getElementById("goback");
            addcustomer.onclick=function addCusDetails(){
                window.open("dashboard.html");
            }
    </script>
</body>
</html>