<?php
    $db = mysqli_connect('localhost', 'root', '', 'cmart');

    if($db){
        // echo 'db connected';
    }
    else{
        die('Database connection error'.mysqli_connect($db));
    }

?>