<?php

//to insert post to database
global $post_success;
global $post_error;
    if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {

      $title = $_POST['title'];
      $description = $_POST['description'];
      $content = $_POST['content'];

      $stmt = mysqli_prepare($db_connect, "INSERT INTO posts (title,description,content) VALUES (?, ?, ?)");
      mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $content);
  
      if(mysqli_stmt_execute($stmt)) {
    
       $post_success =  "Post Created Successfully.";
       
        } else {
            $post_error =  "Error in Creating Post" . mysqli_error($db_connect) ;
          }
      }




// to fetch posts from database
$query = "SELECT id, title, description, content FROM posts ORDER by created_at DESC";
$stmt = mysqli_prepare($db_connect, $query);

    /* execute statement */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $id, $title, $description, $content);

?>