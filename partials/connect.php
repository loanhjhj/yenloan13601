<?php
$host = "localhost";
$user_name = "root";
$user_password = "";
$db_name = "nienluan";

// Create connection
try{
   $conn = new PDO("mysql:host=localhost;dbname=$db_name","$user_name","$user_password");
   $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}