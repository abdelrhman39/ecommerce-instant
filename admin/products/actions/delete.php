<?php
include '../../config.php';
include '../../helpers/fun.php';
include '../../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $pro_id = $_GET['id'];

    $q ="SELECT * FROM `products` WHERE id=$pro_id ";
    $result_q = mysqli_query($con , $q);
    $row_q = mysqli_fetch_assoc($result_q);

    if(file_exists('../../../uploads/'.$row_q['image'])){
        unlink('../../../uploads/'.$row_q['image']);
    }

    
    $sql = "DELETE FROM `products` WHERE id='$pro_id'";

    $result = mysqli_query($con, $sql);



    
    if($result){
        header('Location: '.url('products/view.php').'?success= Deleted success...!');
    }else{

        header('Location: '.url('products/view.php').'?error= Error!: Please Try Agine...!');
    }
}



?>