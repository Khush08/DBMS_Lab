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
            $paysts=$_POST['uppaysts'];
            $paid=$_POST['amountpaid'];
            $paydate=$_POST['nxtpaydate'];
            $pdate=$_POST['pdate'];
            $conn=new mysqli('localhost','root','','dbms');
            $stmt1="select customer_id from customers where email='$email'";
            $res1=mysqli_query($conn,$stmt1);
            $c_id=mysqli_fetch_row($res1);
            $stmt2="select payment_status_code from customer_payments where customer_id='$c_id[0]'";
            $res2=mysqli_query($conn,$stmt2);
            $p_code=mysqli_fetch_row($res2);
            $stmt3="update payment_status set status_description='$paysts' where payment_status_code='$p_code[0]'";
            mysqli_query($conn,$stmt3);
            $stmt4="select payment_amt from customer_payments where customer_id='$c_id[0]'";
            $res3=mysqli_query($conn,$stmt4);
            $pay=mysqli_fetch_row($res3);
            $pay[0]=$pay[0]-$paid;
            $stmt5="update customer_payments set customer_payment_due='$paydate' where customer_id='$c_id[0]'";
            mysqli_query($conn,$stmt5);
            $stmt6="update customer_payments set customer_payment_made='$pdate' where customer_id='$c_id[0]'";
            mysqli_query($conn,$stmt6);
            $stmt7="update customer_payments set payment_amt='$pay[0]' where customer_id='$c_id[0]'";
            mysqli_query($conn,$stmt7);
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