<?php

require_once '../includes/core.php'; 
require_once '../includes/dbconnect.php'; 
require_once '../includes/post.php'; // post 

if (!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
}
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
    
    <title>Dashboard | Blog</title>    
    
    <link rel="shortcut icon" href="">
    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class= "">
    
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">BLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="../index.php">Home </a>
                    </li>

                    <?php  if (!isset($_SESSION['user_id'])) {?> 
                    <li class="nav-item ">
                        <a class="nav-link" href="../login.php">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../register.php">Register</a>
                    </li>
                    
                    <?php  } else {?>
                        <li class="nav-item ">
                        <a class="nav-link" href="../logout.php" onclick="return confirm('You are about to log out')">Logout</a>
                    </li>
                    <?php } ?>
                   
                    </ul>
                    <ul class="navbar-nav ml-auto">
                   
                    <?php  if (isset($_SESSION['user_id'])) {?> 
                    <li class="nav-item ">
                       <p class="text-white">Hello, <?php echo $_SESSION['fullname']; ?></p>
                    </li>
                   
                   <?php } ?>
                   
                    </ul>
                </div>
            </nav>


        </div>

        <div class="row">
            <div class="col-md-12">
            <?php if($post_success){ 
                    echo "<div class=\"alert alert-success text-center\">$post_success</div>";

                    }elseif($post_error){
                    echo "<div class=\"alert alert-danger text-center\"> $post_error </div>";
                    }
                    ?>
            </div>
        </div>

        <div class=" row mt-5">
               
            <span class="col-md-2"></span>
            <div class="col-md-4">
            
                <div class="card ">
                
                    <div class="card-header bg-dark">
                        <h2 class="text-center text-white">POSTS</h2>
                    </div>

                    <div class="card-body">

                        <?php 
                        mysqli_stmt_store_result($stmt);
                        if(mysqli_stmt_num_rows($stmt) > 0){
                        ?>
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                <th>Title</th>
                                <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  
                            
                            while (mysqli_stmt_fetch($stmt)) {
                               
                                 ?>
                                <tr>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td></td>                                   
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                            <?php }else {?>
                                <h5 class="text-center">No posts to display</h5>       

                           <?php  }?>
                    </div>
            
                </div>
            
            </div>

            <div class="col-md-4">


                <div class="card ">
               
                    <div class="card-header bg-dark">
                        <h2 class="text-center text-white">ADD POST</h2>
                    </div>

                    <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                        </div>
                    
                        <button type="submit" name="submit" class="btn btn-dark">Add Post</button>
                    </form>
                    </div>
                
                </div>
            </div>
            
            <span class="col-md-2"></span>
            
        </div>

    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    
    
 
    <?php mysqli_close($db_connect)?>
  </body>
</html>

                
           