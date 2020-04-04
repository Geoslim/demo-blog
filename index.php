<?php

require_once 'includes/core.php'; 
require_once 'includes/dbconnect.php'; 
require_once 'includes/post.php'; // post 


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    
    <title>Blog</title>    
    
    <link rel="shortcut icon" href="">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class= "">
    
        <div class="container-full">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">BLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="#">Home </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    
                   
                    </ul>
                   
                </div>
            </nav>


        </div>

       
        <div class=" row mt-5">
               
            <span class="col-md-2"></span>
            <div class="col-md-8">
            <?php 
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) > 0){
            ?>
            <?php  while (mysqli_stmt_fetch($stmt)) {  ?>
                <div class="card mt-4">
                
                    <div class="card-header bg-dark">
                        <h5 class="text-white"><?php echo $title; ?></h5>
                        <p class="text-white"><?php echo $description; ?></p>
                    </div>

                    <div class="card-body">
                    <?php echo substr($content, 0,200); ?>
                    </div>

                    <div class="card-footer">
                        <a href="?post= <?php echo urlencode($id); ?>" class="btn btn-sm btn-dark"> View </a>
                    </div>
            
                </div>
                <?php } ?>
                <?php }else {?>
                    <h5 class="text-center">No posts to display</h5>       
                <?php  }?>
            </div>

           
            <span class="col-md-2"></span>
            
        </div>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    
    
 
    <?php mysqli_close($db_connect)?>
  </body>
</html>

                
           