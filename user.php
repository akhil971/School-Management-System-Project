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
  <title>ADMIN</title>
  <?php include'includes/header-links.php'; ?>
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
    <?php include'includes/top-header.php'; ?>
    <?php include'includes/sidebar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php include'includes/page-header.php'; ?>

    <!-- Main content -->
   
    <section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <legend STYLE="color:brown"><B>ADD ADMIN</B></legend>
                                <div class="mb-3">
                                    <label>Username <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" id="inputGroupFile04">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" name="password" class="form-control" id="inputGroupFile04">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" name="adminlogins" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:#2b4685;" value="Submit" />
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <center>
                        <h4 class="mt-4" style="color:brown;"><b>ADMIN</b> </h4>
                    </center>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered ">
                                <thead  style="background-color:#cb559f;">
                                    <tr>
                                        <th style="color:white; font-family: var(--sm-font); font-weight:500;">Sr.No</th>
                                        <th style="color:white; font-family: var(--sm-font); font-weight:500;">Username</th>
                                        <th style="color:white; font-family: var(--sm-font); font-weight:500;">Password</th>
                                       
                                        <th style="color:white; font-family: var(--sm-font); font-weight:500;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "select * from username where status = '1'";
                                    $res = mysqli_query($conn, $sql);
                                    $sn = 0;
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $sn++;
                                        // echo "<pre>";
                                        // print_r($row);
                                    ?>
                                        <tr>
                                            <td><?php echo $sn; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['password']; ?></td>
                                            

                                         <td><button type="button" class="btn btn-sm btn-success edit" ><a href="update_user.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to Edit');"><i class="fa fa-edit" style="color:white;"></i></a></button>
                                                          <a href="deletedata.php?delete=username&id=<?php echo $row['id']; ?>" onclick="return confirm('Sure! you want to delete');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot></tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
 <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include'includes/copyright.php'; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

 <?php include'includes/footer-links.php'; ?>
 <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
  </script>
  <script>
  $(document).ready(function(){
    $("body").on("click",".del",function(){
      var id=$(this).attr('data-id');
      if (confirm('You want to delete !!!')) {
        $.ajax({
          url:"action.php",
          type:"POST",
          data:{id:id,del_testimonial:'del_testimonial'},
          success: function(data){
            location.reload();
          }
        });
      }
      else{
        alert('Record Deletion Cancel!');
      }
    });
  });
</script>
</body>
</html>
