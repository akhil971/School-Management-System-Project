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
    $query = "SELECT * FROM `tbl_admission` WHERE id='$id'";
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
    <title>Edit admission</title>
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
                                                    <label>Student name</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['student_name'] ?>" name="student_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>DOB</label>
                                                    <div class="input-group">
                                                        <input type="date" value="<?php echo $data['dob'] ?>" name="dob" class="form-control" required>
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
                                                    <label>Class Applying </label>
                                                    <div class="input-group">
                                                        <select name="class_applying" class="form-control" required>
                                                            <option value="" disabled selected>Select Class</option>
                                                            <option value="Nur" <?php if ($data['class_applying'] == 'Nur') echo 'selected' ?>>Nur</option>
                                                            <option value="LKG" <?php if ($data['class_applying'] == 'LKG') echo 'selected' ?>>LKG</option>
                                                            <option value="UKG" <?php if ($data['class_applying'] == 'UKG') echo 'selected' ?>>UKG</option>
                                                            <option value="I" <?php if ($data['class_applying'] == 'I') echo 'selected' ?>>I</option>
                                                            <option value="II" <?php if ($data['class_applying'] == 'II') echo 'selected' ?>>II</option>
                                                            <option value="III" <?php if ($data['class_applying'] == 'III') echo 'selected' ?>>III</option>
                                                            <option value="IV" <?php if ($data['class_applying'] == 'IV') echo 'selected' ?>>IV</option>
                                                            <option value="V" <?php if ($data['class_applying'] == 'V') echo 'selected' ?>>V</option>
                                                            <option value="VI" <?php if ($data['class_applying'] == 'VI') echo 'selected' ?>>VI</option>
                                                            <option value="VII" <?php if ($data['class_applying'] == 'VII') echo 'selected' ?>>VII</option>
                                                            <option value="VIII" <?php if ($data['class_applying'] == 'VIII') echo 'selected' ?>>VIII</option>
                                                            <option value="IX" <?php if ($data['class_applying'] == 'IX') echo 'selected' ?>>IX</option>
                                                            <option value="X" <?php if ($data['class_applying'] == 'X') echo 'selected' ?>>X</option>
                                                            <option value="XI" <?php if ($data['class_applying'] == 'XI') echo 'selected' ?>>XI</option>
                                                            <option value="XII" <?php if ($data['class_applying'] == 'XII') echo 'selected' ?>>XII</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Last Class</label>
                                                    <div class="input-group">
                                                        <select name="last_class" class="form-control" required>
                                                            <option value="Nur" <?php if ($data['last_class'] == 'Nur') echo 'selected' ?>>Nur</option>
                                                            <option value="LKG" <?php if ($data['last_class'] == 'LKG') echo 'selected' ?>>LKG</option>
                                                            <option value="UKG" <?php if ($data['last_class'] == 'UKG') echo 'selected' ?>>UKG</option>
                                                            <option value="I" <?php if ($data['last_class'] == 'I') echo 'selected' ?>>I</option>
                                                            <option value="II"<?php if ($data['last_class'] == 'II') echo 'selected' ?>>II</option>
                                                            <option value="III"<?php if ($data['last_class'] == 'III') echo 'selected' ?>>III</option>
                                                            <option value="IV" <?php if ($data['last_class'] == 'IV') echo 'selected' ?>>IV</option>
                                                            <option value="V" <?php if ($data['last_class'] == 'V') echo 'selected' ?>>V</option>
                                                            <option value="VI" <?php if ($data['last_class'] == 'VI') echo 'selected' ?>>VI</option>
                                                            <option value="VII" <?php if ($data['last_class'] == 'VII') echo 'selected' ?>>VII</option>
                                                            <option value="VIII" <?php if ($data['last_class'] == 'VIII') echo 'selected' ?>>VIII</option>
                                                            <option value="IX" <?php if ($data['last_class'] == 'IX') echo 'selected' ?>>IX</option>
                                                            <option value="X" <?php if ($data['last_class'] == 'X') echo 'selected' ?>>X</option>
                                                            <option value="XI" <?php if ($data['last_class'] == 'XI') echo 'selected' ?>>XI</option>
                                                            <option value="XII" <?php if ($data['last_class'] == 'XII') echo 'selected' ?>>XII</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Student Email</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['student_email'] ?>" name="student_email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Father's Name</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['father_name'] ?>" name="father_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Mother's Name</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['mother_name'] ?>" name="mother_name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Parent's contact</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['parent_contact'] ?>" name="parent_contact" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Parent email</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['parent_email'] ?>" name="parent_email" class="form-control" required>
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
                                                    <input type="submit" name="update_admission" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:rgb(2, 135, 39);" value="Submit" />
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