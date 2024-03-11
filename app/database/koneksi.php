<?php 
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");

$user = "root";
$pass = "";
$db = "db_bebas2";

try {
    $configs = new PDO("mysql:host=localhost; dbname=$db;", $user, $pass);
}catch(Exception $e){
    echo "error : ". $e->getMessage();
}
?>