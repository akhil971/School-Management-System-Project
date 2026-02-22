<?php include 'session.php' ?>
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
                                    <h3 class="card-title">User List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>User Name</th>
                                                    <th>Mobile Number</th>
                                                    <th>Email</th>
                                                    <th>Password</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM tbl_user WHERE status IN ('1', '2')";
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
                                                        <td><?= $row['pass']; ?></td>
                                                        <td><?= $row['update_at']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-success edit"><a href="edituserlist.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to Edit');"><i class="fa fa-edit" style="color:white;"></i></a></button>
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
</body>

</html>