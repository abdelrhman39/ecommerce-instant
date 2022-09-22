<?php
include '../../config.php';
include '../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (!empty($_POST['email'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $sql ="INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password');";
        $result = mysqli_query($con , $sql);

        if($result){
            header('Location: '.url('users/add.php').'?success= Add success...!');
        }
    }else{

        header('Location: '.url('users/add.php').'?error=All fields Required...!');
    }


}



?>