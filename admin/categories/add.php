<?php
include '../config.php';
include '../helpers/fun.php';
include '../layouts/header.php';
include '../layouts/nav.php';

?>



<div id="layoutSidenav">
    <?php include '../layouts/sidenav.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Add category</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo url(''); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add category</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Add category
                            </div>
                            <div class="card-body">
                            
                            <!-- Start Form Add Cat -->

                            <form action="<?php echo 'actions/store.php'; ?>" method="post">
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
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" name="cat_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category Name">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
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