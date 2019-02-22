<?php
// used to connect to the database
$host = "localhost";
$db_name = "php_beginner_crud_level_1";
$username = "root";
$password = "";

    $con = mysqli_connect($host,$username,$password,$db_name);
    or
    die("Error Connecting to server")
  

?>