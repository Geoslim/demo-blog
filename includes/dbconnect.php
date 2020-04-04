<?php

        $db_host= 'localhost';
        $db_user = 'root';
        $db_pass ='';
        $db_error = 'Database Connection failed';
        $db_name = 'demo_blog';
        
       
       $db_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name ) ;

       if (!$db_connect) {
         die($db_error ." ". mysqli_connect_error());
       }
//       }else {
//           echo "connected";
