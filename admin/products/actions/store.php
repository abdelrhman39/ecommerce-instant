<?php
include '../../config.php';
include '../../helpers/fun.php';





$pro_name       = $_POST['pro_name'];
$description    = $_POST['description'];
$price          = $_POST['price'];
$discount       = $_POST['discount'];


// Start Image
$fileName       = $_FILES['image']['name'];
$fileType       = $_FILES['image']['type'];
$fileSize      = $_FILES['image']['size'];
$file          = $_FILES['image']['tmp_name'];


$file_types = ['image/jpg', 'image/jpeg', 'image/png'];

if ($fileSize == 0) {
    header('Location: ' . url('products/add.php') . '?error=Product Image Required !');
}
if (!in_array($fileType, $file_types) && $fileSize != 0) {
    header('Location: ' . url('products/add.php') . '?error=File type you are using is not supported !');
}

if ($fileSize > 1000000000) {
    header('Location: ' . url('products/add.php') . '?error=The file you uploaded is too large');
}




$extension      = explode('/',$fileType)[1];


$newImageName  =  date("Y.m.dh.i.s").strtotime("now").uniqid().'.'.$extension;
$destination   = '../../../uploads/'.$newImageName;



move_uploaded_file($file, $destination);



if (empty($pro_name) || empty($description) || empty($price) || empty($discount)) {
    header('Location: ' . url('products/add.php') . '?error=All Product is Required!');
} else {
    $result = mysqli_query($con, "INSERT INTO `products`(`name`, `description`, `price`, `discount`, `image`) VALUES ('$pro_name' , '$description', '$price', '$discount',  '$newImageName')");
    if ($result) {
        header('Location: ' . url('products/add.php') . '?success= Add success!');
    } else {
        header('Location: ' . url('products/add.php') . '?error=query erro!');
    }
}
