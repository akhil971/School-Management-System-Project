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
    <title>Add image</title>
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
                                        <fieldset>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label>Heading</label>
                                                    <div class="input-group">
                                                        <input type="text" name="heading" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Content </label>
                                                    <div class="input-group">
                                                        <input type="text" name="content" class="form-control" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class=" col-md-6"><br>
                                                    <label>Insert image</label> <br>
                                                    <input type="file" name="image" class="form-control" required>

                                                </div>

                                            </div>

                                            <div class="col-md-12">
                                                <input type="submit" name="addimage" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:rgb(2, 135, 39);" value="Submit" />
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