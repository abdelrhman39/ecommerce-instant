<?php
include '../config.php';
include '../helpers/fun.php';
include '../../helpers/fun.php';
include '../layouts/header.php';
include '../layouts/nav.php';

?>



        <div id="layoutSidenav">
            <?php include '../layouts/sidenav.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo url(''); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Products</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Products
                            </div>
                            <div class="card-body">
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
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>description</th>
                                            <th>price</th>
                                            <th>discount</th>
                                            <th>image</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            $sql ="SELECT * FROM `products`";
                                            $result = mysqli_query($con , $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td><?php echo $row['discount']; ?></td>
                                            <td><img src="<?php echo UsersUrl('uploads/'.$row['image']); ?>" height='100px' width='100px'/></td>

                                            <td>
                                                <a href="<?php echo url('products/edit.php?id='.$row['id']) ?>" class="btn btn-info">Edit</a>
                                            </td>
                                            <td>
                                                <a href="<?php echo url('products/actions/delete.php?id='.$row['id']) ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
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