<?php
require 'config.php';

session_start();

if(!isset($_SESSION["user"])){
    header("Location: register.php");
}else{
    $no=$_SESSION["user"];
}


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
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <center><h1>Your Cart!</h1></center>
    <div class="all">
        <?php
            $get=$pdo->prepare("SELECT * FROM `cart` WHERE `number`=:num");
            $get->bindParam(":num",$no,PDO::PARAM_STR);
            $get->execute();
            $results=$get->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $r){
                $product_name=$r["product-name"];
                $product_category=$r["product-category"];

                $filtered_name=str_replace("'","''",$product_name);
        

                $get_data=$pdo->prepare("SELECT * FROM `$product_category` WHERE `name`='$filtered_name'");
                $get_data->execute();
                $res=$get_data->fetchAll(PDO::FETCH_ASSOC);
                foreach($res as $row){
                    echo '<div class="all-p">';
                    echo '<div class="product">';
                    echo '<center><img  src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '" alt="' . $row["name"] . '"></center>';
                    echo '<form action="cart.php" method="POST">';
                    echo  "<center><h1> " . $row["name"] . "</h1>";
                    echo '<p id="price"><b>$' . $row["price"] . '</b></p>';
                    echo '<input type="hidden" name="product-name" value="'.$row["name"].'">';
                    echo '<input type="hidden" name="product-category" value="'.$product_category.'">';
                    echo '<input type="submit" name="order" value="Order Now!" class="btn btn-outline-primary">';
                    echo '<input type="submit" name="del" value="Remove" id="rem-btn" class="btn btn-outline-danger">';
                    echo '</form></center></div>';   
                }
                
            }

            if(isset($_POST["del"])){
                $name=$_POST["product-name"];
                $delete=$pdo->prepare("DELETE FROM `cart` WHERE `number`=:user AND `product-name`=:pn");
                $delete->bindParam(":user",$no,PDO::PARAM_STR);
                $delete->bindParam(":pn",$name,PDO::PARAM_STR);
                $delete->execute();
            }
            if(isset($_POST["order"])){
                $name=$_POST["product-name"];
                $category=$_POST["product-category"];
                $query_string = http_build_query(array(
                    'product-name' => $name,
                    'product-category' => $category
                ));
                echo "<script>window.location.href='orders.php?".$query_string."';</script>";
                exit;
            }

        ?>
    </div>
    <style>
    #rem-btn{
        margin-left:2vw;
    }
    .all-p{
        padding:0.5vw;
        border: 2px solid silver;
    }
    .product{
        display:flex;
        align-items:center;
        justify-content:space-evenly;
    }
    .product img{
        height: 30vh;
        width: 30vw;
        border-radius:2vw;
        object-fit: contain;
    }
    </style>
    <script>
  
    </script>
</body>
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>