<?php
session_start();
include_once('connection.php');
// echo $_SESSION['role'];die;
// if($_SESSION['role']!='1'){
//     header('location:index.php');
//   }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <?php include'includes/header-links.php'; ?>
  <?php include'includes/footer-links.php'; ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <?php include 'includes/top-header.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
  <div class="content-wrapper">
   <?php include 'includes/page-header.php'; ?>

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid" style="background-color:white; padding-top:20px; padding-bottom:20px; border-radius:5px;">
       
        <div class="row">
          <div class="col-lg-3 col-6">
       
            <div class="small-box bg-info">
              <div class="inner">
                <php $sql = "select * from tbl_customer where status = '1'";
                        $res = mysqli_query($conn,$sql);
                        ?>
                <h3><php echo mysqli_num_rows($res); ?></h3>

                <p>Customer List</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="customerlist.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
      
          
          
        </div>
      </div>
    </section>
  </div>
 
 <?php include'includes/copyright.php'; ?> 

  
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>



</body>
</html>
