<?php include 'session.php' ?>

<?php

if ($_GET['id']) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `tbl_student` WHERE `id`='$id'";
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
                                                    <label>Name</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo  $data["name"] ?>" name="name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Number</label>
                                                    <div class="input-group">
                                                        <input type="text" value="<?php echo $data['number'] ?>" name="number" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                    <div class="input-group">
                                                        <input type="email" value="<?php echo $data['email'] ?>" name="email" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Class </label>
                                                    <div class="input-group">
                                                        <select name="class_id" class="form-control" required>
                                                            <option value="" disabled selected>Select Class</option>
                                                            <option value="1" <?php if ($data['class_id'] == '1') echo 'selected' ?>>Nur</option>
                                                            <option value="2" <?php if ($data['class_id'] == '2') echo 'selected' ?>>LKG</option>
                                                            <option value="3" <?php if ($data['class_id'] == '3') echo 'selected' ?>>UKG</option>
                                                            <option value="4" <?php if ($data['class_id'] == '4') echo 'selected' ?>>I</option>
                                                            <option value="5" <?php if ($data['class_id'] == '5') echo 'selected' ?>>II</option>
                                                            <option value="6" <?php if ($data['class_id'] == '6') echo 'selected' ?>>III</option>
                                                            <option value="7" <?php if ($data['class_id'] == '7') echo 'selected' ?>>IV</option>
                                                            <option value="8" <?php if ($data['class_id'] == '8') echo 'selected' ?>>V</option>
                                                            <option value="9" <?php if ($data['class_id'] == '9') echo 'selected' ?>>VI</option>
                                                            <option value="10" <?php if ($data['class_id'] == '20') echo 'selected' ?>>VII</option>
                                                            <option value="11" <?php if ($data['class_id'] == '11') echo 'selected' ?>>VIII</option>
                                                            <option value="12" <?php if ($data['class_id'] == '12') echo 'selected' ?>>IX</option>
                                                            <option value="13" <?php if ($data['class_id'] == '13') echo 'selected' ?>>X</option>
                                                            <option value="14" <?php if ($data['class_id'] == '14') echo 'selected' ?>>XI</option>
                                                            <option value="15" <?php if ($data['class_id'] == '15') echo 'selected' ?>>XII</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Address </label>
                                                    <div class="input-group">
                                                        <input type="text" value=" <?php echo $data['address'] ?>" name="address" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>DOB</label>
                                                    <div class="input-group">
                                                        <input type="text" value=" <?php echo $data['dob'] ?>" name="dob" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Father's Name</label>
                                                    <div class="input-group">
                                                        <input type="text" value=" <?php echo $data['f_name'] ?>" name="f_name" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Mother's Name</label>
                                                    <div class="input-group">
                                                        <input type="text" value=" <?php echo $data['m_name'] ?>" name="m_name" class="form-control">
                                                    </div>
                                                </div>
                                                <input type="hidden" value="<?php echo $data['id'] ?>" name="id" class="form-control">
                                            </div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <input type="submit" name="update_students" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:#2b4685;" value="Submit" />
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> 
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