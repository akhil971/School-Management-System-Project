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
    $query = "SELECT * FROM `tbl_notification` WHERE `id`='$id'";
    $run = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($run)) {
        $tbl_notification = $data;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Notification</title>
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
                        <div class="col-md-6">
                            <div class="card" style="border:1px solid #428bca">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Notification</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Notification<span style="color: red;">*</span></label>
                                                <input type="text" name="notification" value="<?php echo $tbl_notification['notification'] ?>" class="form-control mb-2 py-2" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label> Date<span style="color: red;">*</span></label>
                                                <input type="date" name="date" value="<?php echo $tbl_notification['date'] ?>" class="form-control mb-2 py-2" required>
                                                <input type="hidden" name="editid" value="<?php echo $tbl_notification['id']; ?>">
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <button type="submit" name="update_notification" class="btn btn-sm btn-primary">update</button>
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