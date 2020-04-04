<?php

global $post_success;
global $post_error;
    if(isset($_POST['submit']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {

      $stmt = mysqli_prepare($db_connect, "INSERT INTO posts (title,description,content) VALUES (?, ?, ?)");
      mysqli_stmt_bind_param($stmt, 'sss', $title, $description, $content);
  
      $title = $_POST['title'];
      $description = $_POST['description'];
      $content = $_POST['content'];
  
      if(mysqli_stmt_execute($stmt)) {
    
       $post_success =  "Post Created Successfully.";
       
        } else {
            $post_error =  "Error in Creating Post" . mysqli_error($db_connect) ;
          }
      }



function confirm_query($result_set) {
    if(!$result_set) {
      die("Connection Failed" . mysqli_error($result_set));
    }
}

function get_all_posts() {
  global $db_connect;
  $posts_query = "SELECT * FROM `posts` ORDER BY `created_at` desc";
  confirm_query($posts_query); 
  $posts_query_run =  mysqli_query($db_connect, $posts_query);
  return $posts_query_run;
}

?>