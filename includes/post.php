<?php

//to insert post to database
global $post_success;
global $post_error;

    if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {

      $title = $_POST['title'];
      $description = $_POST['description'];
      $content = $_POST['content'];

      $query = "INSERT INTO posts (title,description,content) VALUES (?, ?, ?)";

      $stmt = mysqli_prepare($db_connect, $query);

          mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $content);
      
          if(mysqli_stmt_execute($stmt)) {
        
          $post_success =  "Post Created Successfully.";
          
          } else {
                $post_error =  "Error in Creating Post" . mysqli_error($db_connect) ;
                }
    }




// to fetch posts from database
  $fetch_query = "SELECT id, title, description, content FROM posts ORDER by created_at DESC";
  $stmt = mysqli_prepare($db_connect, $fetch_query);

      mysqli_stmt_execute($stmt);

      mysqli_stmt_bind_result($stmt, $id, $title, $description, $content);

      mysqli_stmt_store_result($stmt);
?>