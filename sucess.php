<?php
require 'config.php';

if($_SERVER["REQUEST_METHOD"]==="GET"){
    $name=$_GET["product-name"];
    $price=$_GET["product-price"];
    $user=$_GET["user"];
}

$get=$pdo->prepare("SELECT * FROM `user-auth` WHERE `phoneno`=:n");
$get->bindParam(':n',$user,PDO::PARAM_STR);
$get->execute();
$res=$get->fetchAll(PDO::FETCH_ASSOC);
foreach($res as $r){
    $loc=$r["location"];
}

$query=$pdo->prepare("INSERT INTO `orders`(`user-number`, `location`, `product-name`, `product-price`) VALUES (:un,:l,:pn,:pp)");
$query->bindParam(":un",$user,PDO::PARAM_STR);
$query->bindParam(":l",$loc,PDO::PARAM_STR);
$query->bindParam(":pn",$name,PDO::PARAM_STR);
$query->bindParam(":pp",$price,PDO::PARAM_INT);
if($query->execute()){
    echo '<center><div id="sucess"><h1>ORDER PLACED SUCCESSFULLY!</h1><button class="btn" id="btn" onclick="homepage()">Go Back To Homepage</button?</div></center>';
}

$delete=$pdo->prepare("DELETE FROM `cart` WHERE `number`=:user AND `product-name`=:pn");
$delete->bindParam(":user",$user,PDO::PARAM_STR);
$delete->bindParam(":pn",$name,PDO::PARAM_STR);
$delete->execute();

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    *{
        font-family:"Poppins", sans-serif;
    }
#sucess{
    color:#363A46;;
}
#btn{
    background-color:#363A46;
    color:white;
}
</style>
<script>
function homepage(){
    window.location.href='index.html';
}
</script>