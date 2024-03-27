<?php
session_start();
require 'config.php';
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
    .card{
        transition: all 0.3s ease;
    }
    .card:hover{
        transform: scale(1.1);
       box-shadow: 5px 5px 5px silver;
    }
    #title{
        color:#8E8CF6;
    }

    .navbar-expand-lg, .navbar{
        background-color:#8E8CF6;
        border-radius:0px 0px 1vw 1vw;
    }
    .container-fluid{
        color:white;
    }

    @media(min-width:320px){
        .all,.card{
            margin-left:5vw;
        }
    }
    @media(min-width:390px){
        
    .card{
        margin-left:10vw;
        margin-top:4vh;
        border-radius:5vw;
    }
    .card-body{
        align-items:center;
    }
    }
    @media(min-width:400px){
        .all{
            display:flex;
            flex-wrap:wrap;
        }
        .card{
            margin-left:17vw;
        }
    }
    @media(min-width:500px){
        .card{
            margin-left:20vw;
        }
    }
    @media(min-width:661px){
        .card{
            margin-left:2vw;
        }
    }
    @media(min-width:700px){
        .card{
           margin-left:5vw;
        }
    }
    @media(min-width:800px){
        .card{
            margin-left:8vw;
        }
    }
    @media(min-width:900px){
        .card{
            margin-left:10vw;
        }
    }
    @media(min-width:1000px){
        .card{
            margin-left:2vw;
        }
        .all{
            justify-content:space-evenly;
            align-items:center;
            margin-left:0;

        }
    }
    #btn{
        background-color: #363A46;
    color:white;
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
    <title>Walk-In Closets-Pritchetts Closets!</title>
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
  <div class="all">
      <?php
      

      $query=$pdo->prepare("SELECT * FROM `jay-special` ORDER BY RAND() LIMIT 6");
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_ASSOC);
      foreach($results as $row){
        echo '<form method="GET" action="items.php" ><div class="card" style="width: 18rem;" name="item">';
        echo '<input type="hidden" name="product" value="'.$row["name"].'">';
        echo '<img class="card-img-top" src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '" alt="' . $row["name"] . '">';
        echo '<div class="card-body"><h5 class="card-title">'.$row["name"].'</h5><p>$'.$row["price"].'<p><input type="submit" onclick="submit()" name="submit" value="See Details" class="btn" id="btn"></center></div></div></form>';
    }
    
      ?>
</div>
<script>
    function submit(){
        window.location.href="items.php";
        <?php
        $_SESSION["category"]="jay-special";
        ?>
    }
</script>

  
</body>
</html>