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
            $email=$_POST['uploanemail'];
            $start=$_POST['loanstartdate'];
            $end=$_POST['loanlastdate'];
            $amt=$_POST['loanamount'];
            $category=$_POST['category'];
            $conn=new mysqli('localhost','root','','dbms');
            $stmt1="select customer_id from customers where email='$email'";
            $res1=mysqli_query($conn,$stmt1);
            $c_id=mysqli_fetch_row($res1);
            $stmt2="select car_sold_id from cars_sold where customer_id='$c_id[0]'";
            $res2=mysqli_query($conn,$stmt2);
            $cs_id=mysqli_fetch_row($res2);
            $stmt3="select finance_company_id from finance_companies where company_name='$category'";
            $res3=mysqli_query($conn,$stmt3);
            $fc_id=mysqli_fetch_row($res3);
            $stmt4="insert into car_loans(car_sold_id,start_date,end_date,monthly_amt,finance_company_id) values('$cs_id[0]','$start','$end','$amt','$fc_id[0]')";
            mysqli_query($conn,$stmt4);
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