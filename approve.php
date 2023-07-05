<?php
    include('config.php');
    include('functions.php');
    
    $id = $_GET['id'];
    $query = "select * from `products` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $name = $row['name'];
            $price = $row['price'];
            $image = $row['image'];
           
            $query = "INSERT INTO `attain` (`id`, `name`, `price`, `image`) VALUES (NULL, '$name', '$price', '$image');";
        }
        $query .= "DELETE FROM `products` WHERE `products`.`id` = '$id';";
        if(performQuery($query)){
            
           
            header("location:hom.php?msg=You have Approved the product successfully");
        }
    }
?>
<br/><br/>
<a href="home.php">Back</a>