<?php

include 'config.php';

session_start();

$time=time();
    $actual_time=date('D M Y',$time);
    

$superadmin_id = $_SESSION['superadmin_id'];

$msg="";

if(!isset($superadmin_id)){
   header('location:login.php');


}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Approve Or reject item</title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="css/super_admin.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   

</head>

<body>



<header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
          <div class="row">
    <div class="col">
      Hi,
    </div>
    <div class="col">
    <p id="demo"></p>

<script>
const time = new Date().getHours();
let greeting;
if (time < 10) {
  greeting = "Good morning";
} else if (time < 17) {
  greeting = "Good Afternoon";
} else {
  greeting = "Good evening";
}
document.getElementById("demo").innerHTML = greeting;
</script>
    </div>
    <div class="col">
    <div> <?php echo  $_SESSION['superadmin_name']  ?></div>
    </div>
    <div class="col text-warning">
    <div><?php  echo$actual_time; ?></strong></div>
    </div>
  </div>
           
            
          </a>
            <div class="pull-right">
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:home.php');
                }
    
                ?>
                    <form method="post">
                        <button name="logout" class="btn btn-danger my-2">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <div class="card-body">
               
                

                    <table class="table table-bordered text-center">
                        <tr class="bg-dark text-white">
                            <td>Id</td>
                            <td>Product Name</td>
                            <td>price</td>
                            <td>Image</td>
                            <td>Approve</td>
                            <td>Reject</td>

                        </tr>
                        <tr>
                            <?php
                            include('config.php');
                            $query = "select* from products";
                            $result = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>



                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['price']; ?>
                                </td>
                                <td> <img class="image" src="uploaded_img/<?php echo $row['image']; ?>" alt="">
                                    
                                   <td> <a href="approve.php?id=<?php echo $row['id'] ?>" class="btn btn-primary ">Approve</a></td>
                                   <td> <a href="reject.php?id=<?php echo $row['id'] ?>" class="btn btn-danger ">Reject</a></td>
                              
                                </td>
                               



                            </tr>
                            <?php
                            }


                            ?>

                    </table>
                    

                </div>

            </div>

        </section>
        </form>
<?php 
if(isset($_GET['msg'])){

    $msg=$_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
   ' .$msg.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>
      
       
    </main>

   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>