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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Payment List</title>
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Payment List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                <th>S. No.</th>
                                                    <th>Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Email</th>
                                                    <th>User ID</th>
                                                    <th>Password</th>
                                                    <th>Amount</th>
                                                    <th>Payment Status</th>
                                                    <th>Action<span style="color:white;">sdfd</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "select * from  tbl_user where status = '2'";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;
                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['mobile_number']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        <td><?= $row['user_id']; ?></td>
                                                        <td><?= $row['pass']; ?></td>
                                                        <td><?= $row['amount']; ?></td>
                                                        <td><p style="color:green;">Sucessfull</p></td>
                                                        <td>
                                                            <a href="deletedata.php?delete=tbl_user&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
            $("body").on("click", ".del", function() {
                var id = $(this).attr('data-id');
                if (confirm('You want to delete !!!')) {
                    $.ajax({
                        url: "action.php",
                        type: "POST",
                        data: {
                            id: id,
                            del_testimonial: 'del_testimonial'
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                } else {
                    alert('Record Deletion Cancel!');
                }
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