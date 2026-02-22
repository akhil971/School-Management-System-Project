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
    $query = "SELECT * FROM `tbl_student` WHERE `s_id`='$id'";
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
    <title>Edit Student</title>
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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #428bca">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Student</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="row">
                                                <div class=" col-md-6">
                                                    <label>First Name</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['first_name'] ?>" name="first_name" class="form-control" id="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Last Name</label>
                                                    <div class="input-group">
                                                        <input type="name" value="<?php echo $data['last_name'] ?>" name="last_name" class="form-control" id="name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>DOB </label>
                                                    <div class="input-group">
                                                        <input type="date" value="<?php echo $data['dob'] ?>" name="dob" class="form-control" id="date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Gender </label>
                                                    <div class="input-group">
                                                        <select name="gender" class="form-control">
                                                            <option value="Male" <?php if ($data['gender'] == 'Male') echo 'selected' ?>>Male</option>
                                                            <option value="Female" <?php if ($data['gender'] == 'Female') echo 'selected' ?>>Female</option>
                                                            <option value="Other" <?php if ($data['gender'] == 'Other') echo 'selected' ?>>Other</option>
                    
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Phone Number </label>
                                                    <div class="input-group">
                                                        <input type="text" value=" <?php echo $data['phone_number'] ?>" name="phone_number" class="form-control" id="number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Address </label>
                                                    <div class="input-group">
                                                        <input type="text" value=" <?php echo $data['address'] ?>" name="address" class="form-control" id="address">
                                                    </div>
                                                </div>
                                                <input type="hidden" value="<?php echo $data['s_id'] ?>" name="s_id" class="form-control">

                                            </div>

                                            <div class="col-md-12">
                                                <input type="submit" name="update_student_list" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:#2b4685;" value="Submit" />

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