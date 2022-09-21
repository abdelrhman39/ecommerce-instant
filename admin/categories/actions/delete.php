<?php
include '../../config.php';
include '../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $cat_id = $_GET['id'];
    
    $sql = "DELETE FROM `categories` WHERE id=$cat_id";

    $result = mysqli_query($con, $sql);

    if($result){
        header('Location: '.url('categories/view.php').'?success= Deleted success...!');
    }else{

        header('Location: '.url('categories/view.php').'?error= Error!: Please Try Agine...!');
    }
}



?>