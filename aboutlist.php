<?php include 'session.php' ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About Us List</title>
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
                        <div class="col-md-12">
                            <br>
                            <div class="card" style=" border-radius:10px;">
                                <div class="card-header">
                                    <h3 class="card-title">About us List</h3>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table data-table stripe hover nowrap table-bordered table-striped" id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>Sl.no</th>
                                                    <th>Image</th>
                                                    <th>Heading</th>
                                                    <th>Content</th>
                                                    <th>Action<span style="color:white;"></span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "select * from  tbl_about";
                                                $res = mysqli_query($conn, $sql);
                                                $sn = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $sn++;

                                                    // echo '<pre>';
                                                    // print_r($row); die;
                                                ?>
                                                    <tr>
                                                        <td><?= $sn; ?></td>
                                                        <td><img src="<?php echo 'uploads/abc/' . trim($row['image']) ?>" alt="" style="width:100px; height:100px;"></td>
                                                        <td><?= $row['heading']; ?></td>
                                                        <td><?= $row['content']; ?></td>

                                                        <td>
                                                        
                                                            <a href="deletedata.php?delete_about=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger">DELETE</a>
                                                
                                                            <a href="edit_about.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">EDIT</a>
                                                            
                                                    
                                                          
                                                        </td>
                                                        
                                                            

                                                            <!-- <a href="edit_student.php?id=<?php echo $row['s_id']; ?>" class="btn btn-sm btn-success">Edit</a> -->
                                                            <!-- <a href="deletestudentdata.php?delete=tbl_student&s_id=<?php echo $row['s_id']; ?>"  class="btn btn-sm btn-danger">Delete</a> -->
                                                        
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