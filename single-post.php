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
    
    <title>  | Blog</title>    
    
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

                <?php $posts_query_run = get_all_posts();
                $posts_row_count = mysqli_num_rows($posts_query_run);
                ?>
                <?php
                if($posts_row_count > 0) { ?>
                  <?php  while ($posts_row = mysqli_fetch_array($posts_query_run)) { ?>
                <div class="card mt-4">
                
                    <div class="card-header bg-dark">
                        <h5 class="text-white"><?php echo $posts_row['title']; ?></h5>
                        <p class="text-white"><?php echo $posts_row['description']; ?></p>
                    </div>

                    <div class="card-body">
                    <?php echo substr($posts_row['content'], 0,200); ?>
                    </div>

                    <div class="card-footer">
                        <a href="?post= <?php echo urlencode($posts_row['id']); ?>" class="btn btn-sm btn-dark"> View Details </a>
                    </div>
            
                </div>
                <?php } ?>
                <?php } else {?>
                    <span class="text-center alert alert-dark text-white"><h3>No Posts to display</h3></span>
                <?php }?>
            </div>

           
            <span class="col-md-2"></span>
            
        </div>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    
    
 
    <?php mysqli_close($db_connect)?>
  </body>
</html>

                
           