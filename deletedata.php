<?php
session_start();
include 'connection.php';
include 'sweetalert.php';
$webMsg = '';
if (isset($_SESSION['web_msg'])) {
  $webMsg = $_SESSION['web_msg'];
  unset($_SESSION['web_msg']);
}
$webErrMsg = '';
if (isset($_SESSION['web_err_msg'])) {
  $webErrMsg = $_SESSION['web_err_msg'];
  unset($_SESSION['web_err_msg']);
}
if (isset($_GET['delete']) && $_GET['delete'] == 'tbl_user') {
  $id = $_GET['id'];
  $sql = "DELETE FROM `tbl_user` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);

  if ($run) {
    $_SESSION['web_msg'] = "Record deleted successfully!";
  } else {
    $_SESSION['web_err_msg'] = "Failed to delete record.";
  }

  header("location:userlistlist.php");
  exit();
}

if (isset($_GET['delete']) && $_GET['delete'] == 'tbl_course') {
  $id = $_GET['id'];


  $sql = "SELECT image, video, pdf, ppt FROM tbl_course WHERE id='$id'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    if ($row['image'] && file_exists('uploads/' . $row['image'])) {
      unlink('uploads/' . $row['image']);
    }

    if ($row['video'] && file_exists('uploads/videos/' . $row['video'])) {
      unlink('uploads/videos/' . $row['video']);
    }

    if ($row['pdf'] && file_exists('uploads/pdf/' . $row['pdf'])) {
      unlink('uploads/pdf/' . $row['pdf']);
    }

    if ($row['ppt'] && file_exists('uploads/ppt/' . $row['ppt'])) {
      unlink('uploads/ppt/' . $row['ppt']);
    }
  }
  $sql = "DELETE FROM `tbl_course` WHERE `course_name`='$id'";
  $run = mysqli_query($conn, $sql);

  if ($run) {
    $_SESSION['web_msg'] = "Record deleted successfully!";
  } else {
    $_SESSION['web_err_msg'] = "Failed to delete record.";
  }

  header("location:courselist.php");
  exit();
}

if (isset($_GET['delete_enquiry'])) {
  $id = $_GET['delete_enquiry'];
  $sql = "DELETE FROM `tbl_enquiry` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:enquiry.php");
}


if (isset($_GET['delete_admission'])) {
  $id = $_GET['delete_admission'];
  $sql = "DELETE FROM `tbl_admission` WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:admissionform.php");
}

if(isset($_GET['delete_icon'])) {
  $id = $_GET['delete_icon'];
  $sql = "DELETE FROM tbl_icon WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:iconlist.php");
}


if (isset($_GET['delete_gallery'])) {
  $id = $_GET['delete_gallery'];
  $sql = "DELETE FROM tbl_gallery WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:gallerylist.php");
}


if (isset($_GET['delete_setting'])) {
  $id = $_GET['delete_setting'];
  $sql = "DELETE FROM tbl_setting WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:settinglist.php");
}

if (isset($_GET['delete_about'])) {
  $id = $_GET['delete_about'];
  $sql = "DELETE FROM tbl_about WHERE `id`='$id'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) {
  } else {
  }
  header("location:aboutlist.php");
}


if (!empty($_GET['studentId'])) {

  $studentId = $_GET['studentId'];

  $sql = "DELETE FROM student WHERE `id`='$studentId'";
  $run = mysqli_query($conn, $sql);
  if ($run == true) { 
  } else {
  }
  header("location:student.php");
}


if (!empty($_GET['aboutId'])) {

  $aboutId = $_GET['aboutId'];

  $sql = "DELETE FROM aboutus WHERE `id`='$aboutId'";
  $run = $conn->query($sql);
  if ($run == 1) { 
    header("Location:aboutus.php");
  } else {
    echo 'Not Deleted';
  }
}

if(!empty($_GET['galleryId'])){
  $galleryId =$_GET['galleryId'];
  $sql ="DELETE FROM gallery WHERE `id`='$galleryId'";
  $run = $conn->query($sql);
  // print_r( $run);die;
    if($run == 1){ 
    header("Location: gallery.php");
  } else {
    echo 'Not Deleted';
}
}

if(!empty($_GET['missionId'])){

  $missionId =$_GET['missionId'];
  // print_r($_GET);die;

    $sql = "DELETE FROM mission WHERE `id`='$missionId'";
    // print_r($sql);die;
  $run = $conn->query($sql);
  if ($run == 1) { 
    header("Location:mission.php");
  } else {
    echo 'Not Deleted';
  }
}

if (!empty($_GET['visionId'])) {

  $visionId = $_GET['visionId'];

  $sql = "DELETE FROM vision WHERE `id`='$visionId'";
  $run = $conn->query($sql);
  if ($run == 1) { 
    header("Location:vision.php");
  } else {
    echo 'Not Deleted';
  }
}

if (!empty($_GET['lunchId'])) {

  $lunchId = $_GET['lunchId'];

  $sql = "DELETE FROM lunch WHERE `id`='$lunchId'";
  $run = $conn->query($sql);
  if ($run == 1) { 
    header("Location:lunch.php");
  } else {
    echo 'Not Deleted';
  }
}

if (!empty($_GET['schoolId'])) {

  $schoolId = $_GET['schoolId'];

  $sql = "DELETE FROM school_fee WHERE `id`='$schoolId'";
  $run = $conn->query($sql);
  if ($run == 1) { 
    header("Location:school fee.php");
  } else {
    echo 'Not Deleted';
  }
}