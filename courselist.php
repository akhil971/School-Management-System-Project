<?php include 'session.php' ?>
<?php

$query = "SELECT * FROM `tbl_course` WHERE `status`=1";
$run = mysqli_query($conn, $query);
$tbl_course = [];

while ($row = mysqli_fetch_assoc($run)) {
    $tbl_course[] = $row;
}
$course_data = [];
foreach ($tbl_course as $course) {
    if (!isset($course_data[$course['course_name']])) {
        $course_data[$course['course_name']] = [
            'course_name' => $course['course_name'],
            'course_description' => $course['course_description'],
            'update_at' => $course['update_at'],
            'ppt' => $course['ppt'],
            'image' => $course['image'],
            'price' => $course['price'],
            'videos' => [],
            'pdfs' => [],
            'ids' => [],
        ];
    }
    if (!empty($course['video'])) {
        $course_data[$course['course_name']]['videos'][] = $course['video'];
    }
    if (!empty($course['pdf'])) {
        $course_data[$course['course_name']]['pdfs'][] = $course['pdf'];
    }
    if (!empty($course['id'])) {
        $course_data[$course['course_name']]['ids'][] = $course['id'];
    }
}
foreach ($course_data as $course_name => $data) {
    if (!empty($data['videos'])) {
        foreach ($data['videos'] as $video) {
        }
    } else {
        echo "No videos available.<br>";
    }
    if (!empty($data['pdfs'])) {
        foreach ($data['pdfs'] as $pdf) {
        }
    } else {
        echo "No PDFs available.<br>";
    }
}
// echo '<pre>';
// print_r($course_data);
// die;



?>
<!DOCTYPE html>
<html>
<style>
    .switch-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #dc3545;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked+.slider {
        background-color: #28a745;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }

    #status {
        margin-top: 20px;
        font-size: 24px;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User List</title>
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Course List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Course Name</th>
                                                    <th>Course Description</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Video</th>
                                                    <th>PDF</th>
                                                    <th>PPT</th>
                                                    <th>Action</th>
                                                    <!-- <th>Action<span style="color:white;">sdfd</span></th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($course_data as $key => $value) {
                                                    static $sn = 0;
                                                    $sn++; ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $value['course_name']; ?></td>
                                                        <td><?= $value['course_description']; ?></td>
                                                        <td><?= $value['price']; ?></td>
                                                        <td>
                                                            <img src="<?php echo 'uploads/' . $value['image'] ?>" alt="" class="img-fluid" style="width:100px; height:100px;">
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($value['videos'])): ?>
                                                                <?php foreach ($value['videos'] as $video): ?>
                                                                    <a href="<?php echo 'uploads/videos/' . $video; ?>">View</a><span>[<?php echo $video; ?>]</span></span><br>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                Data not found
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($value['pdfs'])): ?>
                                                                <?php foreach ($value['pdfs'] as $pdf): ?>
                                                                    <a href="<?php echo 'uploads/pdf/' . $pdf; ?>">View</a><span>[<?php echo $pdf; ?>]</span><br>
                                                                <?php endforeach; ?>
                                                            <?php else: ?>
                                                                Data not found
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (!empty($value['ppt']) && file_exists('uploads/ppt/' . $value['ppt'])): ?>
                                                                <a href="<?php echo 'uploads/ppt/' . $value['ppt']; ?>">View</a>
                                                            <?php else: ?>
                                                                Data not found
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-success edit" data-toggle="modal" data-target="#editModal"
                                                                data-course_name="<?php echo $value['course_name']; ?>"
                                                                data-course_video="<?php echo implode(',', $value['videos']); ?>">
                                                                <i class="fa fa-edit" style="color:white;"></i>
                                                            </button>

                                                            <button type="button" class="btn btn-sm btn-danger edit" data-toggle="modal" data-target="#editModal1"
                                                                data-course_name="<?php echo $value['course_name']; ?>"
                                                                data-course_video="<?php echo implode(',', $value['videos']); ?>">
                                                                <i class="fa fa-trash" style="color:white;"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                ?>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="editcourselist.php" method="GET">
                            <div class="form-group">
                                <label for="course_name">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="course_video">Select Video</label>
                                <select class="form-control" id="course_video" name="course_video">

                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Delete Course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="action.php" method="GET">
                            <div class="form-group">
                                <label for="course_name">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="course_video">Select Video</label>
                                <select class="form-control" id="course_video" name="course_video">

                                </select>
                            </div>
                            <button type="submit" name="deletecourceses" class="btn btn-primary">Delete</button>
                        </form>
                    </div>
                </div>
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
    <script>
        $(document).ready(function() {
            $('.toggleSwitch').change(function() {
                var id = $(this).data('id');
                alert(id);
                var status = $(this).is(':checked') ? 2 : 1;

                $.ajax({
                    url: 'update_status.php',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    success: function(response) {
                        var message = (status === 2) ? 'Your account is Active' : 'Your account is Deactive';
                        alert(message);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating status:', error);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#editModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var course_name = button.data('course_name'); // Extract course name
                var course_video = button.data('course_video'); // Extract full video names

                var modal = $(this);
                modal.find('.modal-body #course_name').val(course_name); // Set course name in the input field

                // Populate the video dropdown with full video names
                var videoOptions = course_video.split(','); // Split video names by comma
                var videoDropdown = modal.find('.modal-body #course_video');
                videoDropdown.empty(); // Clear previous options
                videoOptions.forEach(function(video) {
                    videoDropdown.append('<option value="' + video + '">' + video + '</option>'); // Add full video names
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#editModal1').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var course_name = button.data('course_name');
                var course_video = button.data('course_video');

                var modal = $(this);
                modal.find('.modal-body #course_name').val(course_name);

                var videoOptions = course_video.split(',');
                var videoDropdown = modal.find('.modal-body #course_video');
                videoDropdown.empty();
                videoOptions.forEach(function(video) {
                    videoDropdown.append('<option value="' + video + '">' + video + '</option>');
                });
            });
        });
    </script>


</body>

</html>