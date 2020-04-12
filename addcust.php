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
            $email=$_POST['custemail'];
            $mobile=$_POST['custmobile'];
            $age=$_POST['custage'];
            $addr1=$_POST['addr1'];
            $addr2=$_POST['addr2'];
            $addr3=$_POST['addr3'];
            $city=$_POST['city'];
            $state=$_POST['state'];
            $pincode=$_POST['pincode'];
            $fuel=$_POST['fuel'];
            $audio=$_POST['audio'];
            $transmission=$_POST['transmission'];
            $conn=new mysqli('localhost','root','','dbms');
            $stmt1="insert into customers(mobile_no,email,age) values('$mobile','$email','$age')";
            mysqli_query($conn,$stmt1);
            $stmt2="select customer_id from customers where email='$email'";
            $res=mysqli_query($conn,$stmt2);
            $c_id=mysqli_fetch_row($res);
            $stmt3="insert into addresses(customer_id,address1,address2,address3,city,state,country,pincode) values('$c_id[0]','$addr1','$addr2','$addr3','$city','$state','India','$pincode')";
            mysqli_query($conn,$stmt3);
            $stmt4="select car_feature_id from car_features where fuel_type='$fuel' and audio_company='$audio'and transmission_type='$transmission'";
            $res2=mysqli_query($conn,$stmt4);
            $cf_id=mysqli_fetch_row($res2);
            $stmt5="insert into customer_preferences(car_feature_id,customer_id) values('$cf_id[0]','$c_id[0]')";
            mysqli_query($conn,$stmt5);
            echo "Database Updated!!!";
            echo "<br /><hr /><br />";
        }
        else{
            echo "FORM SUBMISSION ERROR";
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