<?php

session_start();

define('URL', 'http://localhost/electricialCar/');
define('LOCAHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cars');

 $conn = mysqli_connect(LOCAHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());  //con to database
 $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //name database



 
?>