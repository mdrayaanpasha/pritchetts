<?php
session_start();
require 'config.php';
if(!isset($_SESSION["user"])){
    header("Location: register.php");
    exit();
}
$_GET["product-name"];
if(isset($_GET["product-name"]) && isset($_GET["product-category"])){
    $name=$_GET['product-name'];
    $category=$_GET["product-category"];
}else{
    echo "aint no way!";
}
$no=$_SESSION["user"]
?>
<style>
.product-specification{
    padding:5vw;
    width:90vw;
    border:4px solid #363A46;;
    margin-top:6vh;
    border-radius:2vw;
}

.btns{
    background-color:#363A46;;
    padding:2vw;
    margin-top:2vh;
    font-size:2.3vh;
    font-weight:bold;
    color:white;
    border:none;
    border-radius:2vw;
}

@media(min-width:500px){
    .product-specification{
        width:60vw;
    }
}

@media(min-width:750px){
    .product-specification{
        width:50vw;
    }
    .btns{
        padding:1vw;
    }
}

@media(min-width:900px){
    .product-specification{
        width:40vw;
    }
}

@media(min-width:1100px){
    .product-specification{
        width:35vw;
    }
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    *{
        font-family:"Poppins", sans-serif;
    }
    
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order-Summary!</title>
</head>
<style>
#nav{
    background-color: #363A46;
    color:white;
    border-radius:2%;
}
#nav a{
    color:white;
}
#navbarText{
    color:white;
}
</style>

<body>
        <nav class="navbar navbar-expand-lg navbar-light " id="nav">
                <a class="navbar-brand" href="index.html">Prittchet's</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="jayspecial.php">Jay's Special</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="wardrobe.php">Wardrobes</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="reachin.php">Reach-In</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="walkin.php">Walk-In</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                  </ul>
                </div>
              </nav>
<center>
    <h1>Order Summary!</h1>
        <form action="sucess.php" method="GET" class="product-specification">
            <?php
            $query=$pdo->prepare("SELECT * FROM `$category` WHERE `name`=:n");
            $query->bindParam(":n",$name,PDO::PARAM_STR);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach($results as $r){
                echo "<p><b>Product Name: </b>".$name."</p>";
                $price=$r["price"];
                echo "<p><b>Product Price: </b>".$price."</p>";
                $tax=($price*10)/100;
                echo "<p><b>Tax: </b>".$tax."</p>";
                $price+=$tax;
                echo "<p><b>Final Amount: </b>".$price."</p>";
                echo '<input type="hidden" name="product-name" value="'.$name.'">';                
                echo '<input type="hidden" name="product-price" value="'.$price.'">';
                echo '<input type="hidden" name="user" value="'.$no.'">';
                echo '<input type="submit" name="submit" value="Confirm-Order" class="btns">';              
            }
            ?>
        </form>


    </center>
</body>
</html>