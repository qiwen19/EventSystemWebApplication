<?php
require_once 'dbconfig.php';

openconnection();

function openconnection(){
    global $connection;
    
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if(mysqli_connect_errno()){
        die("Database connection failed: ".mysqli_connect_error().
                " (".mysqli_connect_errno().")");
    }
}

function close_connection(){
    global $connection;
    if (isset($connection)){
        mysqli_close($connection);
        unset($connection);
    }
}
?>
