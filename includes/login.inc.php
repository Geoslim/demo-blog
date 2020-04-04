<?php

global $invalid;
global $error;

    if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {     
   
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        // $stmt = mysqli_prepare($db_connect, "SELECT fullname, email, password FROM users WHERE email=? AND password=?");
        // mysqli_stmt_execute($stmt);

        //     mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
        //     mysqli_stmt_bind_result($stmt, $email, $password);
        
        //     if($stmt){
        //         echo "yeh";
        //     }
            /* fetch value */
           
        



    

    $query= "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $query_run =  mysqli_query($db_connect, $query);
        $query_row = mysqli_fetch_array($query_run);
       
            if ( $query_row) {
                $_SESSION['user_id'] = $query_row['id'];
                $_SESSION['fullname'] = $query_row['fullname'];
                $_SESSION['email'] = $query_row['email'];
                
                
                header('Location: dashboard/index.php');                
            }  else {
                $invalid =  'Access Denied! Check your login details properly.'. mysqli_error($db_connect); 
            }
       } else{
                $error =  'Login Error.'. mysqli_error($db_connect); 
       }
