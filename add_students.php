<?php include 'session.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student</title>
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
                           <br> <div class="card">
                                <div class="card-body">
                                    <form action="action.php" method="POST" enctype="multipart/form-data">
                                        <fieldset>
                                            <div class="row">
                                                <div class=" col-md-6">
                                                    <label>Name</label>
                                                    <div class="input-group">
                                                        <input type="text" name="name" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Number</label>
                                                    <div class="input-group">
                                                        <input type="number" name="number" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email </label>
                                                    <div class="input-group">
                                                        <input type="email" name="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label>Class </label>
                                                    <div class="input-group">
                                                        <select name="class_id" class="form-control" required>
                                                            <option value="" disabled selected>Select Class</option>
                                                            <option value="Nur">Nur</option>
                                                            <option value="LKG">LKG</option>
                                                            <option value="UKG">UKG</option>
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                            <option value="III">III</option>
                                                            <option value="IV">IV</option>
                                                            <option value="V">V</option>
                                                            <option value="VI">VI</option>
                                                            <option value="VII">VII</option>
                                                            <option value="VIII">VIII</option>
                                                            <option value="IX">IX</option>
                                                            <option value="X">X</option>
                                                            <option value="XI">XI</option>
                                                            <option value="XII">XII</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Address </label>
                                                    <div class="input-group">
                                                        <input type="text" name="address" class="form-control"required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>DOB </label>
                                                    <div class="input-group">
                                                        <input type="date" name="dob" class="form-control"required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Father's Name </label>
                                                    <div class="input-group">
                                                        <input type="text" name="f_name" class="form-control"required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Mother's Name </label>
                                                    <div class="input-group">
                                                        <input type="text" name="m_name" class="form-control"required>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="col-md-12">
                                                <input type="submit" name="addstudents" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:#2b4685;" value="Submit" />
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
</body>

</html>