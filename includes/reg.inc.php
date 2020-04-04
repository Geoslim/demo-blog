<?php

global $reg_success;
global $reg_error;

    if(isset($_POST['submit']) && !empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $fullname =  $_POST['fullname'];
        $email =  $_POST['email'];
        $your_password = $_POST['password'];// for demo purposes only to display to registered user after succesful sign up
        $password = md5($_POST['password']);
        



        $stmt = mysqli_prepare($db_connect, "INSERT INTO users (fullname,email,password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $fullname, $email, $password);

        if(mysqli_stmt_execute($stmt)) {
            
            $reg_success =  "User Created Successfully.";
            
        } else {
            $reg_error =  "Error in Creating User" . mysqli_stmt_error($stmt); 
     }
 }