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
                <h1 class="mt-4">View Users</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="<?php echo url(''); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Users</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Users
                            </div>
                            <div class="card-body">
                                <?php
                                if (isset($_GET['success'])) {
                                    echo '<div class="alert alert-success" role="alert">
                                                ' . $_GET['success'] . '
                                            </div>';
                                } elseif (isset($_GET['error'])) {
                                    echo '<div class="alert alert-danger" role="alert">
                                                ' . $_GET['error'] . '
                                            </div>';
                                }
                                ?>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `users`";
                                        $result = mysqli_query($con, $sql);

                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['password']; ?></td>
                                                <td>
                                                    <a href="<?php echo url('users/edit.php?id=' . $row['id']) ?>" class="btn btn-info">Edit</a>
                                                    <a href="<?php echo url('users/actions/delete.php?id=' . $row['id']) ?>" class="btn btn-danger">Delete</a>
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