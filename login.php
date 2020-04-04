
<?php 
require_once 'includes/core.php'; 
require_once 'includes/dbconnect.php';
 require_once 'includes/login.inc.php';
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
    
    <title>Login | Blog</title>    
    
    <link rel="shortcut icon" href="">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
  </head>

  <body class= "">
    
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark  ">
                <a class="navbar-brand" href="#">BLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto justify-content-end">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <?php  if (!isset($_SESSION['user_id'])) {?> 
                    <li class="nav-item ">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    
                    <?php  } else {?>
                        <li class="nav-item ">
                        <a class="nav-link" href="logout.php" onclick="return confirm('You are about to log out')">Logout</a>
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

        <div class=" row mt-5">
            <span class="col-md-4"></span>

            <div class="col-md-4">


            <?php if($invalid){ 
                    echo "<div class=\"alert alert-danger\"> $invalid </div>";

                    }
                ?>
                <div class="card ">
               
                <div class="card-header bg-dark">
                    <h2 class="text-center text-white">Login</h2>
                </div>

                <div class="card-body">
                <?php
                if (!isset($_SESSION['user_id'])) {?>
                    <form action="" method="post">
                      
                      <div class="form-group">
                          <label for="email">Email address</label>
                          <input type="email" class="form-control" id="email" name="email">
                      </div>
                      <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" class="form-control" id="password" name="password">
                      </div>
                  
                      <button type="submit" name="login" class="btn btn-dark">Login</button>
                  </form>
                    <?php  } else {?>

                        <a href="dashboard"><button class="btn btn-block btn-dark">RETURN TO DASHBOARD</button></a> <br>
                        <a href="logout.php"><button class="btn btn-block btn-dark" onclick="return confirm('You are about to log out')">LOG OUT</button></a>

                    <?php } ?>
                    
                </div>
                
            </div>
            </div>
            
            <span class="col-md-4"></span>
            
        </div>

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    
    
 
    <?php mysqli_close($db_connect)?>
  </body>
</html>

                
           