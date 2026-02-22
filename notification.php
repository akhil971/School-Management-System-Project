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
    <title>Notification List</title>
    <?php include 'includes/header-links.php'; ?>
</head>
<style>
        .red {
            color: red;
        }
        .input-red-text {
            color: red;
        }
    </style>
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
                            <div class="card">
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Notification</label>
                                                        <select class="form-control" name="notification" id="notificationSelect" onchange="changeColor()">
                                                            <option value="" disabled selected>--Select Notification--</option>
                                                            <option value="HD" style="color:red;">HD</option>
                                                            <option value="HU" style="color:green;">HU</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label style="color:#1748b8;">ASQ 1</label>
                                                    <div class="input-group">
                                                        <input type="number" name="increment" class="form-control" id="inputGroupFile04">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label style="color:#1748b8;">ASQ 2</label>
                                                    <div class="input-group">
                                                        <input type="number" name="decrement" class="form-control" id="inputGroupFile04">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label style="color:red;">LP</label>
                                                    <div class="input-group">
                                                        <input type="number" name="lp" class="form-control" id="sgddsgfdfgdf">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label>Date</label>
                                                    <div class="input-group">
                                                        <input type="date" name="date" class="form-control" id="inputGroupFile04">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 mb-3">
                                                <input type="submit" name="addnotification" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:#2b4685;" value="Submit" />
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Notification List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Notification</th>
                                                    <th>ASQ 1</th>
                                                    <th>ASQ 2</th>
                                                    <th>LP</th>
                                                    <th>date</th>
                                                    <th>Action<span style="color:white;">sdfd</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "select * from  tbl_notification where status = '1'";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;
                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $row['notification']; ?></td>
                                                        <td><?= $row['increment']; ?></td>
                                                        <td><?= $row['decrement']; ?></td>
                                                        <td><?= $row['lp']; ?></td>
                                                        <td><?= $row['date']; ?></td>
                                                        <td>

                                                            <a href="deletedata.php?delete=tbl_notification&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
    <script>
        function changeColor() {
            var select = document.getElementById("notificationSelect");
            var selectedOption = select.options[select.selectedIndex];
            select.style.color = selectedOption.style.color;
        }
    </script>
     <script>
        document.getElementById('sgddsgfdfgdf').addEventListener('input', function() {
            if (this.value) {
                this.classList.add('input-red-text');
            } else {
                this.classList.remove('input-red-text');
            }
        });
    </script>
</body>

</html>