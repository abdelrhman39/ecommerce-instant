<?php
include '../config.php';
include '../helpers/fun.php';
include '../layouts/header.php';
include '../layouts/nav.php';


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $user_id = $_GET['id'];
    $sql ="SELECT * FROM `users` WHERE id=$user_id";
    $result = mysqli_query($con , $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        //$id_cat = $row['id'];
        $name = $row['name'];
        $user_email = $row['email'];
        $user_password = $row['password'];
    }
}
?>



<div id="layoutSidenav">
    <?php include '../layouts/sidenav.php'; ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit user</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo url(''); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit user</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Edit user
                            </div>
                            <div class="card-body">
                            
                            <!-- Start Form Add Cat -->

                            <form action="<?php echo 'actions/update.php'; ?>" method="post">
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
                                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                    <label for="name">Full Name</label>
                                    <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="name">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="<?php echo $user_email; ?>" class="form-control" id="email">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?php echo $user_password; ?>" class="form-control" id="password">
                                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                                
                                <button type="submit" class="btn btn-primary my-3">Update</button>
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