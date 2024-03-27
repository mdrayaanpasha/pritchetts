<?php
require 'config.php';
session_start();
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $no=$_POST["number"];
    $a=$_POST["adress"];
    $query=$pdo->prepare("INSERT INTO `user-auth` (`name`, `phoneno`, `location`) VALUES (:n,:p,:l)");
    $query->bindParam(":n",$name,PDO::PARAM_STR);
    $query->bindParam(":p",$no,PDO::PARAM_STR);
    $query->bindParam(":l",$a,PDO::PARAM_STR);
    if($query->execute()){
        $_SESSION["user"]=$_POST["number"];
    }else{
        echo "there was an error!";
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    *{
        font-family:"Poppins", sans-serif;
    }
    #btn{
        background-color: #363A46;
    color:white;
    }

    form{
        width:40vw;
        border:3px solid silver;
        padding:2vw;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register-Pritchett's</title>
</head>
<body>
    <center>
    
    <form action="register.php" method="POST">
    <img src="pritchetts.png" alt="">
        <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Name">
        </div>
        <div class="mb-3">
            <label for="number" class="form-label">Phone Number</label>
            <input type="text" name="number" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
        </div>
        <div class="mb-3">
            <label for="adress" class="form-label">Enter Your Location</label>
            <textarea class="form-control" name="adress" rows="3"></textarea>
        </div>
    <input type="submit" name="submit" value="Register" class="btn" id="btn"><br>

    </form>
    </center>
</body>
</html>