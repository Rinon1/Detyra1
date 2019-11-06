<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "php_form";

$db_connect = mysqli_connect($db_host, $db_username, $db_password, $db_name) or die();

//Conecction check

if(mysqli_connect_error()){
    
    die( " Failed to connect to MySQL: " .mysqli_connect_error());

}

