<?php

global $invalid;
global $error;

    if(isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['password'])) {     
   
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        $query = "SELECT id, fullname, email FROM users WHERE email=? AND password=?";

        $stmt = mysqli_prepare($db_connect, $query);

            mysqli_stmt_bind_param($stmt, "ss", $email, $password);

            mysqli_stmt_execute($stmt);

            mysqli_stmt_bind_result($stmt, $id, $fullname, $email);

            if (mysqli_stmt_fetch($stmt)) {

                $_SESSION['user_id'] = $id;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['email'] = $email;
                
                header('Location: dashboard/index.php');
                
            }  else {
                $invalid =  'Access Denied! Check your login details properly.'. mysqli_stmt_error($stmt); 
            }
       } 
