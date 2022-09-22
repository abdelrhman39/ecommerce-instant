<?php
include '../config.php';
include '../helpers/fun.php';
include '../layouts/header.php';
include '../layouts/nav.php';
include '../../helpers/fun.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $pro_id = $_GET['id'];
    $sql ="SELECT * FROM `products` WHERE id=$pro_id";
    $result = mysqli_query($con , $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id_pro = $row['id'];
        $name_pro = $row['name'];
        $des_pro = $row['description'];
        $price_pro = $row['price']; 
        $discount_pro = $row['discount'];
        $img_pro = $row['image'];
    }
}
?>



<div id="layoutSidenav">
    <?php include '../layouts/sidenav.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Products</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo url(''); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Products</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit Products
                            </div>
                            <div class="card-body">
                            
                            <!-- Start Form Add Cat -->

                            <form action="<?php echo 'actions/update.php'; ?>" method="post" enctype="multipart/form-data">
                                <?php
                                    if(isset($_GET['success'])){
                                        echo '<div class="alert alert-success" role="alert">
                                                '.$_GET['success'].'
                                            </div>';
                                    }elseif(isset($_GET['error'])){
                                        echo '<div class="alert alert-danger" role="alert">
                                                '.$_GET['error'].'
                                            </div>';
                                    }
                                ?>
                                <input type="hidden" name="id_pro" value="<?php echo $id_pro; ?>">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" name="pro_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Name" value="<?php echo $name_pro; ?>" >
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Description" value="<?php echo $des_pro; ?>" >
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Price" value="<?php echo $price_pro; ?>" >
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Discount</label>
                                    <input type="number" name="discount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product Discount" value="<?php echo $discount_pro; ?>" >
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                
                                <img src="<?php echo UsersUrl('uploads/'.$img_pro); ?>" height='100px' width='100px'/>
                                <div class="input-group form-group mt-3">
                                    <input type="file" name="image" class="form-control" id="inputGroupFile02" >
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                                
                                <button type="submit" class="btn btn-primary my-3">Submit</button>
                            </form>
                            <!-- End Form Add Cat -->



                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 100vh"></div>
            </div>
        </main>





        <?php
        include '../layouts/footer.php';
        ?>