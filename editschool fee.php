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
     <?php
        if (!empty($_GET['id'])) {
            $schoolId = $_GET['id'];
            $sql = "SELECT * FROM school_fee WHERE id = '$schoolId'";
            $run = $conn->query($sql);
            $res = mysqli_fetch_assoc($run);

        }
        ?>
     <div class="wrapper">
         <?php include 'includes/top-header.php'; ?>
         <?php include 'includes/sidebar.php'; ?>
         <div class="content-wrapper">
             <?php include 'includes/page-header.php'; ?>
             <section class="content">
                 <div class="container-fluid">
                     <div class="row">
                         <div class="col-md-12">
                             <form action="action.php" method="POST">
                                 <div class="card">
                                     <div class="card-header">
                                         <h3 class="card-title">Add school fee</h3>
                                     </div>
                                     <div class="card-body">
                                         <div class="row">
                                             <div class="col-md-4">
                                                 <label for="">content</label>
                                                 <input type="text" name="content" value="<?php echo $res['content']?>" class="form-control" required>
                                                 <input type="hidden" name="id" value="<?php echo $res ['id']?>">
                                             </div> 
                                             
                                         </div>





                                         <br><button type="submit" name="updateschool" class="btn btn-success">
                                             save
                                         </button>
                                     </div>
                                 </div>
                             </form>

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

 </body>

 </html>