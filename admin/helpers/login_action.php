<?php
include '../config.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $email    = $_POST['email'];
    $password = $_POST['password'];

    
    $sql = "SELECT * FROM `admin` WHERE email='$email' and `password`='$password'";
    $op  = mysqli_query($con,$sql);

        if(mysqli_num_rows($op) == 1){
            // continue ....
            $_SESSION['admin'] = mysqli_fetch_assoc($op);

            header("Location: ../index.php");
        }else{

            // $_SESSION['Message'] = ['Error in Your Credentials try Again .... '];
            echo 'Error in Your Credentials try Again .... ';

        }
        
 }
?>