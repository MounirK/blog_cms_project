<?php
   
    
    //we conect to database this way for more security
    $db['db_host'] = "localhost";
    $db['db_user'] = "root";
    $db['db_pass'] = "";
    $db['db_name'] = "cms";
    //loop trough array and turn it to constant and uppercase
    foreach($db as $key => $value){
        define(strtoupper($key), $value);
    }

    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // if($connection){
    //     echo 'we are connected';
    // }
?>