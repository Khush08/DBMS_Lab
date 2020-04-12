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
            $email=$_POST['upcustemail'];
            $manfac=$_POST['upmnaufacturer'];
            $model=$_POST['upmodelname'];
            $price=$_POST['agreedprice'];
            $solddate=$_POST['solddate'];
            $status=$_POST['uppaysts'];
            $nxtpaydate=$_POST['nxtpaydate'];
            $dueamt=$_POST['dueamt'];
            $conn=new mysqli('localhost','root','','dbms');
            $stmt1="select model_code from car_models where model_name='$model'";
            $res1=mysqli_query($conn,$stmt1);
            $model_code=mysqli_fetch_row($res1);
            $stmt2="select customer_id from customers where email='$email'";
            $res2=mysqli_query($conn,$stmt2);
            $c_id=mysqli_fetch_row($res2);
            $stmt3="select cars_for_sale_id from cars_for_sale where model_code='$model_code[0]'";
            $res3=mysqli_query($conn,$stmt3);
            $cfs_id=mysqli_fetch_row($res3);
            $stmt4="insert into cars_sold(cars_for_sale_id,customer_id,agreed_price,date_sold) values('$cfs_id[0]','$c_id[0]','$price','$solddate')";
            mysqli_query($conn,$stmt4);
            $stmt5="select car_sold_id from cars_sold where customer_id='$c_id[0]'";
            $res4=mysqli_query($conn,$stmt5);
            $cs_id=mysqli_fetch_row($res4);
            $stmt6="insert into payment_status(status_description) values('$status')";
            mysqli_query($conn,$stmt6);
            $stmt7="select max(payment_status_code) from payment_status";
            $res5=mysqli_query($conn,$stmt7);
            $p_code=mysqli_fetch_row($res5);
            $stmt8="insert into customer_payments(cars_sold_id,customer_id,payment_status_code,customer_payment_due,payment_amt) values('$cs_id[0]','$c_id[0]','$p_code[0]','$nxtpaydate','$dueamt')";
            mysqli_query($conn,$stmt8);
            $stmt9="delete from customer_preferences where customer_id='$c_id[0]'";
            mysqli_query($conn,$stmt9);
            echo "Database Updated!!!";
            echo "<br /><hr /><br />";
        } 
    ?>
    <button id="goback"> << BACK</button>
    <script>
            var addcustomer=document.getElementById("goback");
            addcustomer.onclick=function addCusDetails(){
                window.open("update.html");
            }
    </script>
</body>
</html>