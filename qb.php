<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['SUBMIT'])){
            $stmt=$_POST['querry_board'];
            $conn=new mysqli('localhost','root','','dbms');
            if($conn->connect_error){
                die($conn->connect_error);
            }
            else{
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
        }
    ?>
    <button id="goback"> << BACK</button>
    <script src="qbback.js"></script>
    
</body>
</html>