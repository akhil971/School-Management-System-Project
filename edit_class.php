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
    $query = "SELECT * FROM `tbl_class` WHERE `id`='$id'";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($run);
    // echo '<pre>';
    // print_r($data); die;

}
// echo '<pre>';
// print_r($_GET['id']); die;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit class</title>
    <?php include 'includes/header-links.php'; ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php include 'includes/top-header.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="content-wrapper">
            <?php include 'includes/page-header.php'; ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #428bca">
                                <div class="card-header">
                                    <h3 class="card-title">Class</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="row">
                                                <div class=" col-md-6">
                                                    <label>Class</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo  $data['class_name'] ?>" name="class_name" class="form-control">
                                                    </div>

                                                    <input type="hidden" value="<?php echo $data['id'] ?>" name="id" class="form-control">

                                                </div>

                                                <div class="col-md-12">
                                                    <input type="submit" name="edit_class" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:#2b4685;" value="Submit" />

                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/copyright.php'; ?>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <?php include 'includes/footer-links.php'; ?>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>