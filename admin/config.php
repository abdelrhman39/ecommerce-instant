<?php 
session_start();
$server = "localhost";
$dbName = "ecommerce";
$dbUser = "root";
$dbPassword = "";

$con = mysqli_connect($server,$dbUser,$dbPassword,$dbName);

 if(!$con){
    
     die("Error : ".mysqli_connect_error());
 }

 if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}


?>