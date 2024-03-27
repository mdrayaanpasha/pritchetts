<?php
require 'config.php';

if(isset($_POST["upload"])){
    $image_name=$_FILES["image"]["tmp_name"];
    $image_content=file_get_contents($image_name);
    $name=$_POST["name"];
    $des=$_POST["description"];
    $price=$_POST["price"];
    $category=$_POST["category"];

    $query=$pdo->prepare("INSERT INTO `$category`(`name`, `price`, `description`, `image`) VALUES (:n,:p,:d,:i)");
    $query->bindParam(":n",$name,PDO::PARAM_STR);
    $query->bindParam(":p",$price,PDO::PARAM_STR);
    $query->bindParam(":d",$des,PDO::PARAM_STR);
    $query->bindParam(":i",$image_content,PDO::PARAM_LOB);
    if($query->execute()) {
        $message = "Entry added successfully.";
    } else {
        $message = "Error adding entry: " . $query->errorInfo()[2];
    }
}

?>

<style>
    #form{
        width:40vw;
        border:2px solid #f0eded;
        padding:4vw;
    }
    #logo{
        width:20vw;
        height:25vh;
    }

    @media(min-width:280px){
        #form{
            width:90vw;
        }
        #logo{
            width:40vw;
        }
    }
    @media (min-width:1000px){
        #logo{
            height:30vh;
        }
    }
    @media (min-width:1000px){
        #logo{
            width:30vw;
        }
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<body>
    <center>
        <img src="pritchetts.png" alt="Pritchets-Closets" id="logo">
    <form action="post.php" method="post" id="form" enctype="multipart/form-data">
    
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Product Price</label>
        <input name="price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Product Description!</label>
        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    
        
        <label for="category">Category</label>
        <select name="category" class="form-select" aria-label="Default select example" required><br>
            <option value="jay-special">Jay's special</option>   
            <option value="wardrobes">Wardrobes</option>   
            <option value="walk-in">Walk-In Closets</option>   
            <option value="reach-in">Reach-In Closets</option>   
</select><br>
        <div class="input-group mb-3">
            <input type="file" name="image" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="image">Upload</label>
        </div>
        <input type="submit" value="post" name="upload" onclick="mess()" class="btn btn-success" required>
       
    </form>
    </center>
</body>
<script>
function mess(){
    <?php echo "<p>".$message."</p>";?>
}
</script>
</html>
