<?php
include '../../config.php';
include '../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $user_id = $_GET['id'];
    
    $sql = "DELETE FROM `users` WHERE id=$user_id";

    $result = mysqli_query($con, $sql);

    if($result){
        header('Location: '.url('users/view.php').'?success= Deleted success...!');
    }else{

        header('Location: '.url('users/view.php').'?error= Error!: Please Try Agine...!');
    }
}

?>