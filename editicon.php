<?php
session_start();
include 'connection.php';
$msg = "";
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
if ($msg != "") {
    echo "<script> alert('$msg')</script>";
}
if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tbl_icon WHERE id='$id'";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    // echo '<pre>';
    // print_r($data);
    // die;
}
// echo '<pre>';
// print_r($_GET['id']); die;
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit enquiry</title>
    <?php include 'includes/header-links.php'; ?>
    <?php include 'sweetalert.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'includes/top-header.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="content-wrapper">
            <?php include 'includes/page-header.php'; ?>
            <?php
            
            
            if ($_GET['id']) {
                $id = $_GET['id'];
                $query = "SELECT * FROM tbl_icon WHERE id='$id'";
                $run = mysqli_query($conn, $query);
                $data = mysqli_fetch_assoc($run);
                // echo '<pre>';
                // print_r($data);
                // die;
            }
            
            
            ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <div class="card">
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                        <fieldset>
                                        <div class="row">
                                                <div class="col-md-6">
                                                    <label>current Icon</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['icon'] ?>" name="icon" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label fw-bold">Insert icon</label>
                                                    <input type="text" name="insert icon" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Heading</label>
                                                    <div class="input-group">
                                                        <input type="text"value="<?php echo $data['heading'] ?>" name="heading" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Content </label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['content'] ?>" name="content" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                                <div class="col-md-3">
                                                    <input type="submit" name="update_icon" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:rgb(2, 135, 39);" value="Submit" />
                                                </div>

                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php include 'includes/copyright.php'; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <?php include 'includes/footer-links.php'; ?>
</body>

</html>