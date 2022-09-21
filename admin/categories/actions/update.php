<?php
include '../../config.php';
include '../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $cat_name = $_POST['cat_name'];
    $id_cat = $_POST['id_cat'];

    if (!empty($cat_name)) {
        
        
        $sql ="UPDATE `categories` SET `name`='$cat_name' WHERE id= $id_cat";
        $result = mysqli_query($con , $sql);

        if($result){
            header('Location: '.url('categories/view.php').'?success= Update success...!');
        }
    }else{

        header('Location: '.url('categories/edit.php').'?id='.$id_cat.'&&error=Category Name Required...!');
    }


}



?>