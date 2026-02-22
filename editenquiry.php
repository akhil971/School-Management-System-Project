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
    $query = "SELECT * FROM tbl_enquiry WHERE id='$id'";
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
                                                    <label>Name</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['name'] ?>" name="name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Class Applying For</label>
                                                    <div class="input-group">
                                                    <select name="class" class="form-control" required>
                                                            <option value="Nur" <?php if ($data['class'] == 'Nur') echo 'selected' ?>>Nur</option>
                                                            <option value="LKG" <?php if ($data['class'] == 'LKG') echo 'selected' ?>>LKG</option>
                                                            <option value="UKG" <?php if ($data['class'] == 'UKG') echo 'selected' ?>>UKG</option>
                                                            <option value="I" <?php if ($data['class'] == 'I') echo 'selected' ?>>I</option>
                                                            <option value="II"<?php if ($data['class'] == 'II') echo 'selected' ?>>II</option>
                                                            <option value="III"<?php if ($data['class'] == 'III') echo 'selected' ?>>III</option>
                                                            <option value="IV" <?php if ($data['class'] == 'IV') echo 'selected' ?>>IV</option>
                                                            <option value="V" <?php if ($data['class'] == 'V') echo 'selected' ?>>V</option>
                                                            <option value="VI" <?php if ($data['class'] == 'VI') echo 'selected' ?>>VI</option>
                                                            <option value="VII" <?php if ($data['class'] == 'VII') echo 'selected' ?>>VII</option>
                                                            <option value="VIII" <?php if ($data['class'] == 'VIII') echo 'selected' ?>>VIII</option>
                                                            <option value="IX" <?php if ($data['class'] == 'IX') echo 'selected' ?>>IX</option>
                                                            <option value="X" <?php if ($data['class'] == 'X') echo 'selected' ?>>X</option>
                                                            <option value="XI" <?php if ($data['class'] == 'XI') echo 'selected' ?>>XI</option>
                                                            <option value="XII" <?php if ($data['class'] == 'XII') echo 'selected' ?>>XII</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Parent Contact No.</label>
                                                    <div class="input-group">
                                                        <input type="number" value="<?php echo $data['number'] ?>" name="number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email ID</label>
                                                    <div class="input-group">
                                                        <input type="email" value="<?php echo $data['email'] ?>" name="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label>Address</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['address'] ?>" name="address" class="form-control" required>
                                                    </div>
                                                </div>
                                                <br>

                                                <div class="col-md-12">
                                                    <input type="submit" name="update_enquiry" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:rgb(2, 135, 39);" value="Submit" />
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