<?php include 'session.php' ?>
<?php

if($_GET['course_name']){
    $cname = $_GET['course_name'];
    $cvideo = $_GET['course_video'];
    
}

$query = "SELECT * FROM `tbl_course` WHERE `course_name`='$cname' AND `video`='$cvideo'";
$run = mysqli_query($conn, $query);
while ($data = mysqli_fetch_assoc($run)) {
    $tbl_course = $data;
}

// echo '<pre>';
// print_r($tbl_course); die;



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Course edit</title>
    <?php include 'includes/header-links.php'; ?>
    <?php include 'sweetalert.php' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php include('session_msg.php'); ?>

    <div class="wrapper">
        <?php include 'includes/top-header.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        <div class="content-wrapper">
            <?php include 'includes/page-header.php'; ?>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="border:1px solid #594caf">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Course</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-md-3">
                                                <label>Course Name<span style="color: red;">*</span></label>
                                                <input type="text" name="course_name" value="<?php echo $tbl_course['course_name']; ?>" class="form-control mb-2 py-2" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Description<span style="color: red;">*</span></label>
                                                <textarea class="form-control" name="course_description" rows="3"><?php echo $tbl_course['course_description']; ?></textarea>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Price<span style="color: red;">*</span></label>
                                                <input type="number" name="price" value="<?php echo $tbl_course['price']; ?>" class="form-control mb-2 py-2" required>
                                            </div>
                                       
                                            <div class="col-lg-3">
                                                <label>Video</label>
                                                <input type="text" name="video_name" value="<?php echo $tbl_course['video']; ?>" class="form-control mb-2 py-2" readonly>
                                                <input type="file" name="video" value="<?php echo $tbl_course['video']; ?>" class="form-control mb-2 py-2" accept="video/*">
                                            </div>
                                            <div class="col-lg-3">
                                                <label>PDF</label>
                                                <input type="text" value="<?php echo $tbl_course['pdf']; ?>" class="form-control mb-2 py-2" readonly>
                                                <input type="file" name="pdf" value="<?php echo $tbl_course['pdf']; ?>" class="form-control mb-2 py-2" accept="application/pdf">
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <input type="hidden" name="editid" value="<?php echo $tbl_course['course_name']; ?>">
                                                <button type="submit" name="editcourse" class="btn btn-sm btn-primary">Add Course</button>
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    
</body>

</html>