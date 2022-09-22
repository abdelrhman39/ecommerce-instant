<?php
include '../../config.php';
include '../../helpers/fun.php';

$id_pro         = $_POST['id_pro']; 

$pro_name       = $_POST['pro_name'];
$description    = $_POST['description'];
$price          = $_POST['price'];
$discount       = $_POST['discount'];


// Start Image
if(!empty($_FILES['image']['name'])){

    $fileName       = $_FILES['image']['name'];
    $fileType       = $_FILES['image']['type'];
    $fileSize       = $_FILES['image']['size'];
    $file           = $_FILES['image']['tmp_name'];


    $file_types = ['image/jpg', 'image/jpeg', 'image/png'];

    if ($fileSize == 0) {
        header('Location: ' . url('products/edit.php').'?id='.$id_pro. '&&error=Product Image Required !');
    }
    if (!in_array($fileType, $file_types) && $fileSize != 0) {
        header('Location: ' . url('products/edit.php').'?id='.$id_pro. '&&error=File type you are using is not supported !');
    }

    if ($fileSize > 1000000000) {
        header('Location: ' . url('products/edit.php').'?id='.$id_pro. '&&error=The file you uploaded is too large');
    }

    $extension      = explode('/',$fileType)[1];
    $newImageName  =  date("Y.m.dh.i.s").strtotime("now").uniqid().'.'.$extension;
    $destination   = '../../../uploads/'.$newImageName;

    move_uploaded_file($file, $destination);

}else{
    $sql ="SELECT * FROM `products` WHERE id=$id_pro ";
    $result = mysqli_query($con , $sql);
    $row = mysqli_fetch_assoc($result);
    
    $newImageName = $row['image'];
}








if (empty($pro_name) || empty($description) || empty($price) || empty($discount)) {
    header('Location: ' . url('products/edit.php') . '?error=All Product is Required!');
} else {
    $result = mysqli_query($con , "UPDATE `products` SET `name`='$pro_name',`description`='$description',`price`='$price',`discount`='$discount',`image`='$newImageName' WHERE `id` = $id_pro");
        if($result){
            header('Location: '.url('products/view.php').'?success= Add success!');
        }else{
            header('Location: '.url('products/edit.php').'?id='.$id_pro. '&&error=query erro!');
        }
}













        



// ?>