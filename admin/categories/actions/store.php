<?php
include '../../config.php';
include '../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cat_name = $_POST['cat_name'];

    if (!empty($cat_name)) {
        
        
        $sql ="INSERT INTO `categories`(`name`) VALUES ('$cat_name')";
        $result = mysqli_query($con , $sql);

        if($result){
            header('Location: '.url('categories/add.php').'?success= Add success...!');
        }
    }else{

        header('Location: '.url('categories/add.php').'?error=Category Name Required...!');
    }


}



?>