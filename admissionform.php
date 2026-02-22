<?php include 'session.php' ?>

<?php
// echo '<pre>';
// print_r($_SESSION); die;



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admission Form</title>
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
                                <div class="card-header">
                                    <h3 class="card-title">Admission List</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>student_name</th>
                                                    <th>dob</th>
                                                    <th>gender</th>
                                                    <th>class_applying</th>
                                                    <th>last_class</th>
                                                    <th>student_email</th>
                                                    <th>father_name</th>
                                                    <th>mother_name</th>
                                                    <th>parent_contact</th>
                                                    <th>parent_email</th>
                                                    <th>address</th>
                                                    <th>submit_at</th>
                                                    <th>Action<span style="color:white;"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM  tbl_admission";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;


                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $row['student_name']; ?></td>
                                                        <td><?= $row['dob']; ?></td>
                                                        <td><?= $row['gender']; ?></td>
                                                        <td><?= $row['class_applying']; ?></td>
                                                        <td><?= $row['last_class']; ?></td>
                                                        <td><?= $row['student_email']; ?></td>
                                                        <td><?= $row['father_name']; ?></td>
                                                        <td><?= $row['mother_name']; ?></td>
                                                        <td><?= $row['parent_contact']; ?></td>
                                                        <td><?= $row['parent_email']; ?></td>
                                                        <td><?= $row['address']; ?></td>
                                                        <td><?= $row['submit_at']; ?></td>

                                                        <td>
                                                            <a href="deletedata.php?delete_admission=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">DELETE</a>


                                                            <a href="editadmission.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                                        </td>


                                                    </tr>
                                                <?php  }  ?>
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