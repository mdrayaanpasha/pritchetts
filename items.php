<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    *{
        font-family:"Poppins", sans-serif;
    }
        .other{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-evenly;
            margin-top: -5vh;
        }

        .other img{
            height: 30vh;
            width: 30vw;
            object-fit: contain;
        }

        .product img{
            margin-top: 2vh;
            width: 70vw;
            height: auto;
            object-fit: contain;
            border-radius: 1vw;
            /* border:4px solid #8E8CF6; */
        }

        .product h1{
            color: #363A46;
            margin-top: 2vh;
            font-size: 4vh;
        }
        #desc{
            color:silver;
            font-size:1vh;
        }
        .action-btns{
            display:flex;
            margin-left: 0;
            position: fixed;
            bottom: 0vh;
            /* margin-left: 3vw; */
        }

        .action-btns input{
            width: 49vw;
            height: 5vh;
            font-size: 2vh;
            font-weight: bold;
            border: none;
            background-color: #363A46;
            color: white;
        }

        #add-to-cart{
            background-color: white;
            border: 3px solid #363A46;
            color: #363A46;
        }

        .extra-img{
            border-radius: 5vw;
        }

        #similar-txt{
            margin-top: 2vh;
            color: #363A46;
            margin-left: 2vw;
            font-size: 4vh;
        }

        #price{
            margin-top: 1.5vh;
            margin-bottom: 1.5vh;
            font-size: 3vh;
        }

        #desc{
            font-size: 2vh;
        }

        @media(min-width:450px){
            #similar-txt{
                margin-bottom:5vh;
            }
            
            .product img{
                height: 30vh;
                border-radius: 4vh;
            }
        }
        @media(min-width:600px){
            .other img{
                height:20vh;
                width:20vw;
                border-radius:none;
            }
            .other{
                margin-top:5vh;
            }
            
        }
        @media(max-width:590px){
            .actions{
                width:95vw;
            }
            #add-to-cart,#orders{
                width:42vw;
            }
        }
        @media(min-width:800px){
            .other img{
                height:30vh;
                width:30vw;
            }

            .other{
                margin-bottom:10vh;
                margin-left:-2vw;
            }
            .action-btns{
                display:flex;
                width:98vw;
            }
            #add-to-cart,#order{
                width:48.5vw;
                height:7vh;
                font-size:3vh;
            }

        }
        @media (min-width: 1000px)  {
            .product img {
                margin-top: 2vh;
                width: 700px; /* Adjust as needed */
                height: 50vh; /* Adjust as needed */
            }

            #desc{
                font-size:3vh;
            }

}
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
<?php
error_reporting(0);
require 'config.php';
session_start();

// #363A46
//get the data of the product: 
$category = $_SESSION["category"];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $product = $_GET["product"];
    $category=$_SESSION["category"];


$get = $pdo->prepare("SELECT * FROM `$category` WHERE `name`=:product");
$get->bindParam(':product', $product, PDO::PARAM_STR);
$get->execute();
$res = $get->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $row) {
    echo '<div class="product">';
    echo '<center><img  src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '" alt="' . $row["name"] . '"></center>';
    echo  "<center><h1> " . $row["name"] . "</h1>";
    echo '<p id="price"><b>$' . $row["price"] . '</b></p>';
    echo '<p id="desc">' . $row["description"] . "</p><br></center>";
    echo '</div>';
}
    echo '<h1 id="similar-txt">Similar Products</h1><div class="other">';
   $similar=$pdo->prepare("SELECT * FROM `$category` WHERE `name` <> :n ORDER BY RAND() LIMIT 3");
    $similar->bindParam(":n", $product, PDO::PARAM_STR);
    $similar->execute();
    $results = $similar->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $r) {
        echo '<form action="items.php" method="GET" class="prod">';
        echo '<img class="extra-img" src="data:image/jpeg;base64,' . base64_encode($r["image"]) . '" alt="' . $r["name"] . '" onclick="imageclicked(this.parentNode)">';
        echo '<input name="product" value="' . $r["name"] . '" type="hidden">';
        echo "</form>";
    }
    echo "</div>";
}
    ?>
</div>

<div class="action-btns">
    <form action="orders.php" method="GET">
        <input type="hidden"  name="product-name" value="<?php echo $product ?>">
        <input type="hidden" name="product-category" value="<?php echo $_SESSION["category"] ?>">
        <input type="submit" onclick="order" value="Order" name="order" id="order">
    </form>
    <form action="items.php" method="POST">
        <input type="hidden"  name="product-name" value="<?php echo $product ?>">
        <input type="hidden" name="product-category" value="<?php echo $_SESSION["category"] ?>">
        <input type="submit" onclick="add" value="Add To Cart!" name="add-to-cart" id="add-to-cart">
    </form>
</div>

<?php
if(isset($_POST["add-to-cart"])){
    $name=$_POST["product-name"];
    $category=$_POST["product-category"];

    if(!isset($_SESSION["user"])){
        header("Location: register.php");
        exit();
    }else{
        $no=$_SESSION["user"];
    }

    //check if it is already in the cart?
    $check=$pdo->prepare("SELECT * FROM `cart` WHERE `number`=:num AND `product-name`=:pn");
    $check->bindParam(":num",$no,PDO::PARAM_STR);
    $check->bindParam(":pn",$name,PDO::PARAM_STR);
    $check->execute();
    $row=$check->rowCount();
    $modified_name=str_replace("'","%27",$name);
    $modified_name=str_replace(" ","+",$modified_name);

    if($row > 0){
        echo "<script>alert('Item Already Exists In Your Cart!');</script>"; 
        echo "<script>window.location.href='items.php?product=".$modified_name."&submit=See+Details'</script>";
    }else{
        $query=$pdo->prepare("INSERT INTO `cart` (`number`,`product-name`,`product-category`) VALUES (:num,:pn,:pc)");
        $query->bindParam(":num",$no,PDO::PARAM_STR);
        $query->bindParam(":pn",$name,PDO::PARAM_STR);
        $query->bindParam(":pc",$category,PDO::PARAM_STR);
        if($query->execute()){
            echo "<script>alert('Added To Cart!');</script>";
            echo "<script>window.location.href='items.php?product=".$modified_name."&submit=See+Details'</script>";
        }else{
            echo "<script>alert('There Was A Problem!');</script>";   
            echo "<script>window.location.href='items.php?product=".$modified_name."&submit=See+Details'</script>";
        }
    }
    

}
?>
<script>
    function imageclicked(form) {
        form.submit();
    }
    function order(){
        window.location.href='orders.php';
    }
    function add(){
        window.location.hred='cart.php';
    }
</script>
</body>
</html>
