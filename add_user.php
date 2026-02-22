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
  <title>User</title>
  <?php include'includes/header-links.php'; ?>
</head>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="action.php" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">
                                <div class=" col-md-6">
                                    <label>User Name</label>
                                    <div class="input-group">
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile Number</label>
                                    <div class="input-group">
                                        <input type="number" name="mobile_number" class="form-control" id="mobile_number" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Email </label>
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" id="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Password </label>
                                    <div class="input-group">
                                        <input type="text" name="pass" class="form-control" id="password" required>
                                    </div>
                                </div>
                                
                               
                                </div>
                               
                                <div class="col-md-12">
                                    <input type="submit" name="addnewuser" class="btn btn-success btn-block" style="margin-top: 10px; padding:10px; background-color:#2b4685;" value="Submit" />
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
