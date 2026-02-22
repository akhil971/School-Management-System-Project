<?php include 'session.php';




?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add setting</title>
    <?php include 'includes/header-links.php'; ?>
    <?php include 'session_msg.php' ?>
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
                                        <fieldset>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <labe>Footer Text</label>
                                                    <div class="input-group">
                                                        <input type="text" name="footer_text" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Facebook Link</label>
                                                    <div class="input-group">
                                                        <input type="text" name="facebook" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Instagram Link</label>
                                                    <div class="input-group">
                                                        <input type="text" name="instagram" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>YouTube Link</label>
                                                    <div class="input-group">
                                                        <input type="text" name="youtube" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>LinkedIn Link</label>
                                                    <div class="input-group">
                                                        <input type="text" name="linkedin" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Address</label>
                                                    <div class="input-group">
                                                        <input type="address" name="address" class="form-control" rows="2" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                    <div class="input-group">
                                                        <input type="email" name="email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Phone</label>
                                                    <div class="input-group">
                                                        <input type="phone" name="phone" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Map</label>
                                                    <div class="input-group">
                                                        <input type="" name="map_iframe" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-4"></div>
                                                <div class="col-md-3">
                                                    <input type="submit" name="addsetting" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:rgb(2, 135, 39);" value="Submit" />
                                                </div>

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