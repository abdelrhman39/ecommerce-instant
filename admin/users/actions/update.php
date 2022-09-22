<?php
include '../../config.php';
include '../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    /*$cat_name = $_POST['cat_name'];
    $id_cat = $_POST['id_cat'];
*/
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    if (!empty($user_email)) {
        
        

        //$sql ="UPDATE `users` SET `name`='$cat_name' WHERE id= $id_cat";
        $sql ="UPDATE `users` SET `name` = '$name', `email` = '$user_email', `password` = '$user_password' WHERE `users`.`id` = $user_id;";
        $result = mysqli_query($con , $sql);

        if($result){
            header('Location: '.url('users/view.php').'?success= Update success...!');
        }
    }else{

        header('Location: '.url('users/edit.php').'?id='.$id_cat.'&&error=Category Name Required...!');
    }


}



?>