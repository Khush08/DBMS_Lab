<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $conn=new mysqli('localhost','root','','dbms');
    $stmt="Select car_feature_id from customer_preferences GROUP by car_feature_id order by count(*) DESC LIMIT 1";
    $res=mysqli_query($conn,$stmt);
    $row=mysqli_fetch_row($res);
    echo "{$row[0]}"
    ?>
</body>
</html>