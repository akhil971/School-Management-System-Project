<?php include 'session.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tutorial List</title>
    <?php include 'includes/header-links.php'; ?>
     <?php include 'sweetalert.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Kaisei+Tokumin:wght@400;500;700&family=Poppins:wght@300;400;500&display=swap');

    :root {
        --lg-font: 'Kaisei Tokumin', serif;
        --sm-font: 'Poppins', sans-serif;
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
                         <form action="action.php"method="POST">
                         <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Add student</h3>
                            </div>
                            <div class="card-body">
                                <label for="">name</label>
                                <input type="text"name="name"class="form-control"required>

                                <label for="">number</label>
                                <input type="text"name="number"class="form-control"required>

                                <label for="">email</label>
                                <input type="text"name="email"class="form-control"required>
                                <br><button type="submit"name="addstudent"class="btn btn-success">
                                 save
                                </button>
                            </div>
                         </div>
                         </form>
                
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="border:2px solid #428bca; border-radius:10px;">
                                <div class="card-header">
                                    <h3 class="card-title">student List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>S. No.</th>
                                                    <th>Name</th>
                                                    <th>Number</th>
                                                    <th>Email</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM student";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;

                                                    
                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><?= $row['name']; ?></td>
                                                        <td><?= $row['number']; ?></td>
                                                        <td><?= $row['email']; ?></td>
                                                        
                                                        <td>
                                                            <a href="editstudent.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success">Edit</a>
                                                            <a href="deletedata.php?studentId=<?php echo $row['id']; ?>"  class="btn btn-sm btn-danger">Delete</a>
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