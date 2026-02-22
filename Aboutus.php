<?php include 'headerlink.php' ?>
<?php include 'header.php' ?>
<?php include 'headerbennar.php' ?>

<?php include 'navbar.php' ?>

<?php

include '../cms/admin/connection.php';

$sql = "SELECT * FROM aboutus";
$run = $conn->query($sql);
$results = mysqli_fetch_assoc($run);
// echo '<pre>';
// print_r($results);
// die;
?>
<section>
  <img src="image/aa1.jpg" alt="" class="img-fluid">
</section>

<section class=about>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>About Our School</h1>
        <div class="border" 10px; width:20%></div>
        <p><?php echo $results['content'] ?></p>
        <p>
          We offer a play-based emergent curriculum complete with low teacher to child ratios. Come see our environment and how it is designed to promote exploration, adventure and imaginative play. We believe that children are active participants in their own learning. That's why we encourage them to ask questions and explore the world around <br><br>

          The aim of schools in Ramgarh district is to provide Quality Education and also to promote the creative side of children. Our focus is to provide the engaging enviornment to students where they can learn together to enhance their talent. Our curriculum is such where the students school not only focuses on the academic growth but on the personal growth also.</p>

        <button>Admmition now</button>
      </div>
    </div>
  </div>
</section>

<?php

include '../cms/admin/connection.php';

$sql = "SELECT * FROM mission";
$run = $conn->query($sql);
$results = mysqli_fetch_assoc($run);
// echo'<pre>';
// print_r($results);die;

?>

<section class=our>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Our Mission</h2>
        <p><?php echo $results['content'] ?></p>
        <!-- <p>Our mission is to become an important part of the society by providing the quality education to every child. We are making efforts to prepare our students to be prepared for every situation and competition. <br>The school has a capacity to create a suitable enviornment for learning. Manipal School always believes in a pressure free learning enviornment to get the maximum output from their student</p> -->
      </div>
      <?php

      include '../cms/admin/connection.php';

      $sql = "SELECT * FROM vision";
      $run = $conn->query($sql);
      $results = mysqli_fetch_assoc($run);
      // echo'<pre>';
      // print_r($results);die;

      ?>
      <div class="col-md-6">
        <h2>Our Vision</h2>
        <p><?php echo $results['content'] ?></p>
        <!-- <p>Our Vision is to be the leader in the education world by covering all the aspects of a student's growth. We aims to focus on the result oriented education to develop the future talents which can add the value to the community</p> -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>Our Core Values</h2>
        <p>We at manipal schools follow core values like love, joy, peace, patience, self-control & Quality Education. Our core values help us to make the best use of it helping kids to grow in positive environment. Certified Teachers, Interactive atmosphere and good infrastructure are some of the features that make our school the best in the ramgarh district.</p>
      </div>
    </div>

       <?php

      include '../cms/admin/connection.php';

      $sql = "SELECT * FROM school_fee";
      $run = $conn->query($sql);
      $results = mysqli_fetch_assoc($run);
      // echo'<pre>';
      // print_r($results);die;

      ?>

  
    <div class="row">
      <div class="col-md-12">
        <h2>SCHOOL FEE</h2>
         <p><?php echo $results['content'] ?></p>
        <li>School Tuition fee 12 months compulsory.</li>
        <li>Curriculam activities charge (As Applicable) for each class compulsory every year (Sarswati puja not Include)</li>
        <li>Fees may paid Quarterly/half yearly or yearly. (not in monthly mode)</li>
        <li>Payment wil be made by cash/by ATM card/ by cheque.</li>
        <li>Late fine charged (As Applicable) every month.</li>
        <li>Without no dues unit test or terminal exam student can't be appear.</li>
        <li>After irregular of fee payment school can stop classes and exam.</li>
        <li>Any fee can't be refundable and adjustable.</li>
        <li>Tuition fee and van fare will be exceed yearly.</li>

      </div>
    </div>

      <?php

      include '../cms/admin/connection.php';

      $sql = "SELECT * FROM lunch";
      $run = $conn->query($sql);
      $results = mysqli_fetch_assoc($run);
      // echo'<pre>';
      // print_r($results);die;

      ?>
    <div class="row">
      <div class="col-md-12">
        <h2>Lunch - Non Veg And Fast Food Not Allowed In Lunch</h2>
         <p><?php echo $results['content'] ?></p>
        <!-- <p>ASSEMBLY AND MORAL EDUCATION.. To include moral values in in the students, the school starts each working day with the Morning assembly that includes devational song patriotic song and tho thought of the day. The news by the students are read out Daily. Stage presentation will be must represent by off crosses students according to ist.</p> -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h2>SESSION 1ST APRIL TO 31ST MARCH</h2>
        <p>PARENT TEACHER MEETING (PTM) PTM is planned for the entire session af regular intervals to keep the parents updated about their ward's performance in the school.</p>
        <p>Examination Examination will be taken in three terms 1 terminal 2 terminal and annual exam. (1st ferm. Exam- July 2nd term exam- December & annual Exam March).</p>
        <p>Unit Test There are 3 unit test will be taken and surprise test time to time.</p>
        <p>Admission Required Document for Admission</p>
        <li>Birth Certificate issued by Block/ Competent mauthority</li>
        <li>Transfer certificate of the previous school, last attended along with the report card.</li>
        <li>Two colour passport size photographs both students and parents- (mother and father)</li>
        <li>Aadhaar card of the student only</li>
      </div>
    </div>
  </div>
</section>










<?php include 'footer.php' ?>
<?php include 'capyright.php' ?>
<?php include 'footerlink.php' ?>