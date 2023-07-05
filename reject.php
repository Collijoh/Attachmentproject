<?php
    include('functions.php');
    include('config.php');
    $id = $_GET['id'];
    
    $query = "DELETE FROM `products` WHERE `products`.`id` = '$id';";
        if(performQuery($query)){
           
            header("location:hom.php?msg=You have rejected the product successfully" );
        }else{
            echo "Unknown error occured. Please try again.";
        }

?>
<br/><br/>
<a href="home.php">Back</a>