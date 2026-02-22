<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';
include "connection.php";
include 'helper.php';
function Imageupload($dir, $inputname, $allext, $pass_width, $pass_height, $pass_size, $newname)
{
    if (file_exists($_FILES["$inputname"]["tmp_name"])) {
        $file_extension = strtolower(pathinfo($_FILES["$inputname"]["name"], PATHINFO_EXTENSION));
        $error = "";
        if (in_array($file_extension, $allext)) {
            list($width, $height, $type, $attr) = getimagesize($_FILES["$inputname"]["tmp_name"]);
            $image_weight = $_FILES["$inputname"]["size"];

            if ($width <= "$pass_width" && $height <= "$pass_height" && $image_weight <= "$pass_size") {

                $tmp = $_FILES["$inputname"]["tmp_name"];
                if ($file_extension == 'pdf' || $file_extension == 'PDF') {
                    $extension[1] = "pdf";
                } else {
                    $extension[1] = "jpg";
                }
                $name = $newname . "." . $extension[1];

                if (move_uploaded_file($tmp, "$dir" . $name)) {
                    return true;
                }
            } else {
                $error .= "Please upload photo size of $pass_width X $pass_height !!!";
            }
        } else {
            $error .= "Please upload an image !!!";
        }
    }
    return $error;
}
if (isset($_POST['adminlogin'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM `username` WHERE `email`='$email' and `password`='$pass'";
    $run = mysqli_query($conn, $query);
    $num = mysqli_num_rows($run);
    if ($num) {
        $data = mysqli_fetch_assoc($run);
        $_SESSION['id'] = $data['id'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];
        $_SESSION['myname'] = 'ASHOK MAHTO';
        header('location:dashboard.php');
    } else {
        $_SESSION['msg'] = 'Invalid details !!!';
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['adminlogins'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `username`(`email`,`password`) VALUES ('$email','$password')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['msg'] = "admin  create successfully";
        header('location:user.php');
    } else {
        echo "Error record: " . $conn->error;
    }
}
//admin update
if (isset($_POST['update_user'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $editid = $_POST['editid'];

    $sql = "UPDATE `username` SET `email`='$email',`password`='$password' WHERE `id`='$editid'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['msg'] = "admin  update successfully";
        header('location:user.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

////////////////////////////////////////////////////////// MJ TREDING ACADEMY /////////////////////////////////////////////////////

if (isset($_POST['Addcourse'])) {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $price = $_POST['price'];
    $update_at = date('Y-m-d h:i A');

    $photo = $_FILES['image']['name'];
    $photo = explode('.', $photo);
    $image = time() . $photo[0];
    $imagename = $_FILES['image']['tmp_name'];
    $dir = "uploads/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
    $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

    if ($check !== true) {
        $_SESSION['web_err_msg'] = $check;
        header("location:$_SERVER[HTTP_REFERER]");
        exit;
    }
    $image = $image . ".jpg";

    $videoNewName = null;
    if (!empty($_FILES['video']['name'])) {
        $videoName = $_FILES['video']['name'];
        $videoTmpName = $_FILES['video']['tmp_name'];
        $videoExtension = strtolower(pathinfo($videoName, PATHINFO_EXTENSION));
        $allowedVideoExts = ['mp4', 'mkv', 'avi', 'mov'];

        if (in_array($videoExtension, $allowedVideoExts)) {
            $videoNewName = time() . "_" . $videoName;
            $videoDir = "uploads/videos/";
            if (!is_dir($videoDir)) {
                mkdir($videoDir, 0777, true);
            }
            move_uploaded_file($videoTmpName, $videoDir . $videoNewName);
        } else {
            $_SESSION['web_err_msg'] = "Invalid video format.";
            header("location:$_SERVER[HTTP_REFERER]");
            exit;
        }
    }

    $pdfNewName = null;
    if (!empty($_FILES['pdf']['name'])) {
        $pdfName = $_FILES['pdf']['name'];
        $pdfTmpName = $_FILES['pdf']['tmp_name'];
        $pdfExtension = strtolower(pathinfo($pdfName, PATHINFO_EXTENSION));

        if ($pdfExtension === 'pdf') {
            $pdfNewName = time() . "_" . $pdfName;
            $pdfDir = "uploads/pdf/";
            if (!is_dir($pdfDir)) {
                mkdir($pdfDir, 0777, true);
            }
            move_uploaded_file($pdfTmpName, $pdfDir . $pdfNewName);
        } else {
            $_SESSION['web_err_msg'] = "Only PDF files are allowed.";
            header("location:$_SERVER[HTTP_REFERER]");
            exit;
        }
    }

    $pptNewName = null;
    if (!empty($_FILES['ppt']['name'])) {
        $pptName = $_FILES['ppt']['name'];
        $pptTmpName = $_FILES['ppt']['tmp_name'];
        $pptExtension = strtolower(pathinfo($pptName, PATHINFO_EXTENSION));
        $allowedPptExts = ['ppt', 'pptx'];

        if (in_array($pptExtension, $allowedPptExts)) {
            $pptNewName = time() . "_" . $pptName;
            $pptDir = "uploads/ppt/";
            if (!is_dir($pptDir)) {
                mkdir($pptDir, 0777, true);
            }
            move_uploaded_file($pptTmpName, $pptDir . $pptNewName);
        } else {
            $_SESSION['web_err_msg'] = "Invalid file type. Only PPT and PPTX files are allowed.";
            header("location:$_SERVER[HTTP_REFERER]");
            exit;
        }
    }

    $query = "INSERT INTO `tbl_course`(`course_name`, `course_description`, `price`, `update_at`, `image`, `video`, `pdf`, `ppt`) 
              VALUES ('$course_name', '$course_description', '$price', '$update_at', '$image', '$videoNewName', '$pdfNewName', '$pptNewName')";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        $_SESSION['web_msg'] = "Course Added successfully";
        header("location:$_SERVER[HTTP_REFERER]");
    } else {
        $_SESSION['web_err_msg'] = "Course Not Added !!!";
        header("location:$_SERVER[HTTP_REFERER]");
    }
}

// if (isset($_POST['Addcourse'])) {
//     $course_name = $_POST['course_name'];
//     $course_description = $_POST['course_description'];
//     $price = $_POST['price'];
//     $update_at = date('Y-m-d h:i A');

//     // Image upload code (unchanged)
//     $photo = $_FILES['image']['name'];
//     $photo = explode('.', $photo);
//     $image = time() . $photo[0];
//     $imagename = $_FILES['image']['tmp_name'];
//     $dir = "uploads/";
//     $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
//     $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

//     if ($check !== true) {
//         $_SESSION['web_err_msg'] = $check;
//         header("location:$_SERVER[HTTP_REFERER]");
//         exit;
//     }
//     $image = $image . ".jpg";
//     $pptNewName = null;
//        if (!empty($_FILES['ppt']['name'])) {
//            $pptName = $_FILES['ppt']['name'];
//            $pptTmpName = $_FILES['ppt']['tmp_name'];
//            $pptExtension = strtolower(pathinfo($pptName, PATHINFO_EXTENSION));
//            $allowedPptExts = ['ppt', 'pptx'];

//            if (in_array($pptExtension, $allowedPptExts)) {
//                $pptNewName = time() . "_" . $pptName;
//                $pptDir = "uploads/ppt/";
//                if (!is_dir($pptDir)) {
//                    mkdir($pptDir, 0777, true);
//                }
//                move_uploaded_file($pptTmpName, $pptDir . $pptNewName);
//            } else {
//                $_SESSION['web_err_msg'] = "Invalid file type. Only PPT and PPTX files are allowed.";
//                header("location:$_SERVER[HTTP_REFERER]");
//                exit;
//            }
//        }

//     $videos = [];
//     if (!empty($_FILES['video']['name'][0])) {
//         $videoDir = "uploads/videos/";
//         if (!is_dir($videoDir)) mkdir($videoDir, 0777, true);
//         foreach ($_FILES['video']['name'] as $key => $videoName) {
//             $videoTmpName = $_FILES['video']['tmp_name'][$key];
//             $videoExtension = strtolower(pathinfo($videoName, PATHINFO_EXTENSION));
//             if (in_array($videoExtension, ['mp4', 'mkv', 'avi', 'mov'])) {
//                 $videoNewName = time() . "_" . $videoName;
//                 move_uploaded_file($videoTmpName, $videoDir . $videoNewName);
//                 $videos[] = $videoNewName;
//             }
//         }
//     }

//     foreach ($videos as $video) {
//         $query = "INSERT INTO `tbl_course` (`course_name`, `course_description`, `price`, `update_at`, `image`, `video`, `pdf`,`ppt`) 
//                   VALUES ('$course_name', '$course_description', '$price', '$update_at', '$image', '$video', NULL,'$pptNewName')";
//         $sql = mysqli_query($conn, $query);

//         if (!$sql) {
//             $_SESSION['web_err_msg'] = "Failed to insert data for video: $video";
//             header("location:$_SERVER[HTTP_REFERER]");
//             exit;
//         }
//     }

//     // PDFs upload and insert
//     $pdfs = [];
//     if (!empty($_FILES['pdf']['name'][0])) {
//         $pdfDir = "uploads/pdf/";
//         if (!is_dir($pdfDir)) mkdir($pdfDir, 0777, true);
//         foreach ($_FILES['pdf']['name'] as $key => $pdfName) {
//             $pdfTmpName = $_FILES['pdf']['tmp_name'][$key];
//             $pdfExtension = strtolower(pathinfo($pdfName, PATHINFO_EXTENSION));
//             if ($pdfExtension === 'pdf') {
//                 $pdfNewName = time() . "_" . $pdfName;
//                 move_uploaded_file($pdfTmpName, $pdfDir . $pdfNewName);
//                 $pdfs[] = $pdfNewName;
//             }
//         }
//     }

//     foreach ($pdfs as $pdf) {
//         $query = "INSERT INTO `tbl_course` (`course_name`, `course_description`, `price`, `update_at`, `image`, `video`, `pdf`,`ppt`) 
//                   VALUES ('$course_name', '$course_description', '$price', '$update_at', '$image', NULL, '$pdf','$pptNewName')";
//         $sql = mysqli_query($conn, $query);

//         if (!$sql) {
//             $_SESSION['web_err_msg'] = "Failed to insert data for pdf: $pdf";
//             header("location:$_SERVER[HTTP_REFERER]");
//             exit;
//         }
//     }

//     // Success message
//     $_SESSION['web_msg'] = "Course, videos, and PDFs added successfully";
//     header("location:$_SERVER[HTTP_REFERER]");
// }
// EDIT COURSE
// if (isset($_POST['editcourse'])) {

//     $course_name = $_POST['course_name'];
//     $course_description = $_POST['course_description'];
//     $price = $_POST['price'];
//     $update_at = date('Y-m-d h:i A');
//     $editid = $_POST['editid'];


//     $query1 = "UPDATE `tbl_course` 
//                SET `course_name` = '$course_name', 
//                    `course_description` = '$course_description',
//                    `price` = '$price',
//                    `update_at` = '$update_at' 
//                WHERE `id` = '$editid'";
//     $sql = mysqli_query($conn, $query1);

//     // Handle Videos
//     if (!empty($_FILES['video']['name'][0])) {
//         $videoDir = "uploads/videos/";
//         if (!is_dir($videoDir)) mkdir($videoDir, 0777, true);

//         foreach ($_FILES['video']['name'] as $key => $videoName) {
//             $videoTmpName = $_FILES['video']['tmp_name'][$key];
//             $videoExtension = strtolower(pathinfo($videoName, PATHINFO_EXTENSION));

//             if (in_array($videoExtension, ['mp4', 'mkv', 'avi', 'mov'])) {
//                 $videoNewName = uniqid() . "_" . $videoName;
//                 move_uploaded_file($videoTmpName, $videoDir . $videoNewName);

//                 if (!empty($_POST['videosid'][$key])) {
//                     // Update existing video
//                     $videoId = $_POST['videosid'][$key];
//                     $queryVideo = "UPDATE `tbl_course` 
//                                    SET `video` = '$videoNewName' 
//                                    WHERE `id` = '$videoId'";
//                 } else {
//                     // Insert new video
//                     $queryVideo = "INSERT INTO `tbl_course` (`course_name`, `video`) 
//                                    VALUES ('$editid', '$videoNewName')";
//                 }
//                 mysqli_query($conn, $queryVideo);
//             }
//         }
//     }

//     // Handle PDFs
//     if (!empty($_FILES['pdf']['name'][0])) {
//         $pdfDir = "uploads/pdf/";
//         if (!is_dir($pdfDir)) mkdir($pdfDir, 0777, true);

//         foreach ($_FILES['pdf']['name'] as $key => $pdfName) {
//             $pdfTmpName = $_FILES['pdf']['tmp_name'][$key];
//             $pdfExtension = strtolower(pathinfo($pdfName, PATHINFO_EXTENSION));

//             if ($pdfExtension === 'pdf') {
//                 $pdfNewName = uniqid() . "_" . $pdfName;
//                 move_uploaded_file($pdfTmpName, $pdfDir . $pdfNewName);

//                 if (!empty($_POST['pdfsid'][$key])) {
//                     // Update existing PDF
//                     $pdfId = $_POST['pdfsid'][$key];
//                     $queryPDF = "UPDATE `tbl_course` 
//                                  SET `pdf` = '$pdfNewName' 
//                                  WHERE `id` = '$pdfId'";
//                 } else {
//                     // Insert new PDF
//                     $queryPDF = "INSERT INTO `tbl_course` (`course_name`, `pdf`) 
//                                  VALUES ('$editid', '$pdfNewName')";
//                 }
//                 mysqli_query($conn, $queryPDF);
//             }
//         }
//     }


//     if ($sql) {
//         $_SESSION['web_msg'] = "Course updated successfully!";
//         header('location:courselist.php');
//     } else {
//         echo "Error updating the course: " . mysqli_error($conn);
//     }
// }

if (isset($_POST['editcourse'])) {
    // echo '<pre>';
    // print_r($_POST); die;

    $course_name = $_POST['course_name'];
    $video_name = $_POST['video_name'];
    $course_description = $_POST['course_description'];
    $price = $_POST['price'];
    $editid = $_POST['editid'];


    $videoNewName = null;
    if (!empty($_FILES['video']['name'])) {
        // echo '<pre>';
        // print_r($_FILES['video']['name']); die;
        $videoName = $_FILES['video']['name'];
        $videoTmpName = $_FILES['video']['tmp_name'];
        $videoExtension = strtolower(pathinfo($videoName, PATHINFO_EXTENSION));
        $allowedVideoExts = ['mp4', 'mkv', 'avi', 'mov'];

        if (in_array($videoExtension, $allowedVideoExts)) {
            $videoNewName = time() . "_" . $videoName;
            $videoDir = "uploads/videos/";
            if (!is_dir($videoDir)) {
                mkdir($videoDir, 0777, true);
            }
            move_uploaded_file($videoTmpName, $videoDir . $videoNewName);
        } else {
            $_SESSION['web_err_msg'] = "Invalid video format.";
            header("location:$_SERVER[HTTP_REFERER]");
            exit;
        }
    }

    $pdfNewName = null;
    if (!empty($_FILES['pdf']['name'])) {
        $pdfName = $_FILES['pdf']['name'];
        $pdfTmpName = $_FILES['pdf']['tmp_name'];
        $pdfExtension = strtolower(pathinfo($pdfName, PATHINFO_EXTENSION));

        if ($pdfExtension === 'pdf') {
            $pdfNewName = time() . "_" . $pdfName;
            $pdfDir = "uploads/pdf/";
            if (!is_dir($pdfDir)) {
                mkdir($pdfDir, 0777, true);
            }
            move_uploaded_file($pdfTmpName, $pdfDir . $pdfNewName);
        } else {
            $_SESSION['web_err_msg'] = "Only PDF files are allowed.";
            header("location:$_SERVER[HTTP_REFERER]");
            exit;
        }
    }

    $pptNewName = null;
    if (!empty($_FILES['ppt']['name'])) {
        $pptName = $_FILES['ppt']['name'];
        $pptTmpName = $_FILES['ppt']['tmp_name'];
        $pptExtension = strtolower(pathinfo($pptName, PATHINFO_EXTENSION));
        $allowedPptExts = ['ppt', 'pptx'];

        if (in_array($pptExtension, $allowedPptExts)) {
            $pptNewName = time() . "_" . $pptName;
            $pptDir = "uploads/ppt/";
            if (!is_dir($pptDir)) {
                mkdir($pptDir, 0777, true);
            }
            move_uploaded_file($pptTmpName, $pptDir . $pptNewName);
        } else {
            $_SESSION['web_err_msg'] = "Invalid file type. Only PPT and PPTX files are allowed.";
            header("location:$_SERVER[HTTP_REFERER]");
            exit;
        }
    }

    $query = "UPDATE `tbl_course`  
    SET `course_name` = '$course_name',  
        `course_description` = '$course_description', 
        `price` = '$price', `video` = '$videoNewName', `pdf` = '$pdfNewName'  
    WHERE `course_name` = '$editid' 
    AND `video` = '$video_name'";

    $sql = mysqli_query($conn, $query); // This executes the query

    if ($sql) { // Check the success of the query execution
        $_SESSION['web_msg'] = "Course Update Successfully!!!";
        header("location:courselist.php");
        exit;
    } else {
        $_SESSION['web_err_msg'] = "Course Not Updated!!! Error: " . mysqli_error($conn);
        header("location:$_SERVER[HTTP_REFERER]");
        exit;
    }
}

if (isset($_POST['useraddnew'])) {
    $name = $_POST["name"];
    $mobile_number = $_POST["mobile_number"];
    $email = $_POST["email"];
    $user_id = $_POST["user_id"];
    $pass = $_POST["pass"];
    $update_at = date('Y-m-d h:i A');

    $check_sql = "SELECT * FROM `tbl_user` WHERE `email` = '$email' OR `mobile_number` = '$mobile_number'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        $_SESSION['web_err_msg'] = "User with this Email or User ID already exists !!!";
        header("location:$_SERVER[HTTP_REFERER]");
    } else {
        $sql = "INSERT INTO `tbl_user`(`name`,`mobile_number`,`email`,`pass`,`update_at`) VALUES ('$name','$mobile_number','$email','$pass','$update_at')";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['web_msg'] = "User Registration Successfully !!!";
            header("location:../login.php");
        } else {
            $_SESSION['web_err_msg'] = "User Not Added !!!";
            header("location:$_SERVER[HTTP_REFERER]");
        }
    }
}

if (isset($_POST['userlogin'])) {

    $number = $_POST['number'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM `tbl_user` WHERE `mobile_number` = '$number' AND `pass` = '$pass' AND `status` = '1'";


    $run = mysqli_query($conn, $query);
    $num = mysqli_num_rows($run);

    if ($num) {
        $data = mysqli_fetch_assoc($run);
        $_SESSION['cust_id'] = $data['id'];
        $_SESSION['cust_name'] = $data['name'];
        $_SESSION['cust_number'] = $data['mobile_number'];
        $_SESSION['cust_email'] = $data['email'];
        $_SESSION['web_msg'] = 'User Login Successfully !!!';
        header('location:../index.php');
    } else {
        $_SESSION['web_err_msg'] = 'Invalid details !!!';
        header('location:../login.php');
    }
}

// if (isset($_POST['userlogin'])) {
//     $user_id = $_POST['user_id'];
//     $pass = $_POST['pass'];
//     $query = "SELECT * FROM `tbl_user` WHERE `user_id`='$user_id' and `pass`='$pass'";
//     $run = mysqli_query($conn, $query);
//     $num = mysqli_num_rows($run);

//     if ($num) {
//         $data = mysqli_fetch_assoc($run);
//         $_SESSION['id'] = $data['id'];
//         $_SESSION['name'] = $data['name'];
//         $_SESSION['user_id'] = $data['user_id'];
//         $_SESSION['pass'] = $data['pass'];
//         $_SESSION['msg'] = 'User Login Successfully !!!';
//         $id = $_SESSION['id'];

//         $sql = "SELECT `expire` FROM `tbl_user` WHERE `id`='$id'";
//         $result = $conn->query($sql);
//         if ($result->num_rows > 0) {
//             $row = $result->fetch_assoc();
//             $existing_expire = $row['expire'];
//         }
//         $query = "SELECT * FROM `tbl_subscription` WHERE `status`='1'";
//         $run = mysqli_query($conn, $query);
//          while ($row = mysqli_fetch_assoc($run)) {
//         $tbl_subscription[] = $row;
//          }

//          $expire =  $tbl_subscription[0]['expire'];

//         if ($existing_expire == $expire) {
//             header('location:../notificatuionbox.php');
//         }else{
//             header('location:../subscription.php');
//         }
//     } else {
//         $_SESSION['msg'] = 'Invalid details !!!';
//         header('location:../login.php');
//     }
// }
if (isset($_POST['userforgetpass'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $number = $_POST['number'];
    $query = "SELECT * FROM `tbl_user` WHERE `mobile_number`='$number'";
    $run = mysqli_query($conn, $query);
    $num = mysqli_num_rows($run);
    if ($num) {
        $data = mysqli_fetch_assoc($run);
        $_SESSION['cust_id'] = $data['id'];
        $_SESSION['cust_name'] = $data['name'];
        $_SESSION['cust_number'] = $data['mobile_number'];
        $_SESSION['cust_email'] = $data['email'];
        $_SESSION['web_msg'] = 'Correct Mobile Number !!!';
        header('location: ../createpass.php');
    } else {
        $_SESSION['web_err_msg'] = "Please Enter Corect Mobile Number !!!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_POST['newpasswordcrt'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $pass = $_POST['pass'];
    $cust_id = $_POST['cust_id'];
    $sql = " UPDATE `tbl_user` SET `pass`='$pass' WHERE `id`='$cust_id'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['web_msg'] = "Password Update Sucessfully !!!";
        header('location:../login.php');
    } else {
        $_SESSION['web_err_msg'] = "Password Not Update !!!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}

if (isset($_POST['addpayment'])) {
    echo '<pre>';
    print_r($_POST);
    die;
    if (empty($_SESSION['cust_id'])) {
        $_SESSION['web_err_msg'] = "Please Login!";
        header('location:../login.php');
        exit();
    }
    $upi_name = $_POST['upi_name'];
    $bankname = $_POST['bankname'];
    $transection_id = $_POST['transection_id'];
    $upi_number = $_POST['upi_number'];
    $course_id = $_POST['course_id'];
    $cust_id = $_SESSION['cust_id'];
    $cust_name = $_SESSION['cust_name'];
    $cust_number = $_SESSION['cust_number'];
    $cust_email = $_SESSION['cust_email'];
    $update_at =  date('Y-m-d h:i A');
    $sql = "INSERT INTO `tbl_payment`(`upi_name`,`bankname`,`transection_id`,`upi_number`,`update_at`,`course_id`,`cust_id`,`cust_name`,`cust_number`,`cust_email`) VALUES ('$upi_name','$bankname','$transection_id','$upi_number','$update_at','$course_id','$cust_id','$cust_name','$cust_number','$cust_email')";
    //  echo '<pre>';
    //  print_r($sql); die;
    if ($conn->query($sql) === TRUE) {
        $_SESSION['web_msg'] = "Payment Added Sucessfully !!!";
        header('location:../coursedetails.php');
    } else {
        $_SESSION['web_err_msg'] = "Payment not added !!!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_POST['approvepayment'])) {

    // echo '<pre>';
    // print_r($_POST); die;


    $id = $_POST['id'];
    $cust_id = $_POST['cust_id'];

    $sql1 = "UPDATE `tbl_payment` SET `status`= 2 WHERE `id`='$id'";
    $sql2 = "UPDATE `tbl_user` SET `checkstatus`= 2 WHERE `id`='$cust_id'";

    if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        $_SESSION['web_msg'] = "Payment Approved Successfully !!!";
    } else {
        $_SESSION['web_err_msg'] = "Payment not Approved !!!";
    }

    header("location:$_SERVER[HTTP_REFERER]");
}

if (isset($_POST['mycourseslogin'])) {

    $number = $_POST['number'];
    $pass = $_POST['pass'];
    $query = "SELECT * FROM `tbl_user` WHERE `mobile_number` = '$number' AND `pass` = '$pass' AND `checkstatus` = '2'";


    $run = mysqli_query($conn, $query);
    $num = mysqli_num_rows($run);

    if ($num) {
        $data = mysqli_fetch_assoc($run);
        $_SESSION['cust_id'] = $data['id'];
        $_SESSION['cust_name'] = $data['name'];
        $_SESSION['cust_number'] = $data['mobile_number'];
        $_SESSION['cust_email'] = $data['email'];
        $_SESSION['web_msg'] = 'My Courses Login Successfully !!!';
        header('Location: ../coursedetails.php');
    } else {
        $_SESSION['web_err_msg'] = 'Invalid details !!!';
        header('location:../mycourseslogin.php');
    }
}
if (isset($_POST['update_userlistnew'])) {
    $name = $_POST['name'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $update_at = date('Y-m-d h:i A');
    $editid = $_POST['editid'];
    $sql = " UPDATE `tbl_user` SET `name`='$name',`mobile_number`='$mobile_number',`email`='$email',`pass`='$pass',`update_at`='$update_at' WHERE `id`='$editid'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['web_msg'] = "User Update Sucessfully !!!";
        header('location:userlistlist.php');
    } else {
        $_SESSION['web_err_msg'] = "User Not Update !!!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_GET['deletepaymenthistory'])) {
    $editid = $_GET['id'];
    $sql = " UPDATE `tbl_payment` SET `status`= 0 WHERE `id`='$editid'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['web_msg'] = "Payment History Delete Sucessfully !!!";
        header('location:paymentlist.php');
    } else {
        $_SESSION['web_err_msg'] = "Payment History Not Delete !!!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_GET['deletecourceses'])) {

    $course_name = $_GET['course_name'];
    $course_video = $_GET['course_video'];
    $query = "SELECT * FROM `tbl_course` WHERE `course_name`='$course_name' AND `video` = '$course_video'";
    $run = mysqli_query($conn, $query);
    while ($data = mysqli_fetch_assoc($run)) {
        $tbl_user = $data;
    }
    $id = $tbl_user['id'];
    $sql = "DELETE FROM `tbl_course` WHERE `id`='$id'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['web_msg'] = "Course Delete Sucessfully !!!";
        header('location:courselist.php');
    } else {
        $_SESSION['web_err_msg'] = "Course Not Delete !!!";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
if (isset($_POST['addnewuser'])) {
    // echo '<pre>';
    // print_r($_POST); die;

    $name = $_POST["name"];
    $mobile_number = $_POST["mobile_number"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $update_at = date('Y-m-d h:i A');


    $sql = "INSERT INTO tbl_user (name, mobile_number, email, pass, update_at)
VALUES ('$name', '$mobile_number', '$email', '$pass', '$update_at')";


    if ($conn->query($sql) == true) {
        header("Location: userlistlist.php");
    } else {
        header("Location: add_user.php");
    }
}
if (isset($_POST['addnewstudent'])) {
    // echo '<pre>';
    // print_r($_POST); die;

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST["gender"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST['address'];

    $check_sql = "SELECT * FROM tbl_student where phone_number = '$phone_number'";

    $result = $conn->query($check_sql);
    // echo '<pre>';
    // print_r($result); die;
    // $sql = "INSERT INTO tbl_student (first_name, last_name, dob, gender, phone_number, address)
    // VALUES ('$first_name', '$last_name', '$dob', '$gender', '$phone_number', '$address')";


    //     if ($conn->query($sql) == true) {
    //         $_SESSION['web_msg'] = "Student Added Sucessfully !!!";
    //         header("Location: student_list.php");
    //     } else {
    //         $_SESSION['web_err_msg'] = "Student Not Added !!!";
    //         header("Location: add_student.php");
    //     }
    // }

    if ($result->num_rows > 0) {
        $_SESSION['web_err_msg'] = "Student with this Phone Number already exists !!!";
        header("Location: add_student.php");
    } else {
        $sql = "INSERT INTO tbl_student (first_name, last_name, dob, gender, phone_number, address) VALUES ('$first_name', '$last_name', '$dob', '$gender', '$phone_number', '$address')";
        if ($conn->query($sql) == TRUE) {
            $_SESSION['web_msg'] = "Student Added Successfully !!!";
            header("Location: student_list.php");
        } else {
            $_SESSION['web_err_msg'] = "Student Not Added Successfully !!!";
            header("Location: add_student.php");
        }
    }
}
if (isset($_POST['update_student_list'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $dob = $_POST['dob'];
    $gender = $_POST["gender"];
    $phone_number = $_POST["phone_number"];
    $address = $_POST['address'];
    $id = $_POST['s_id'];

    $sql = " UPDATE `tbl_student` SET `first_name`='$first_name',`last_name`='$last_name',`dob`='$dob',`phone_number`='$phone_number',`address`='$address' WHERE `s_id`='$id'";

    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "Student Editted Sucessfully !!!";
        header("Location: student_list.php");
    } else {
        $_SESSION['web_err_msg'] = "Student Not Editted !!!";
        header("Location: add_student.php");
    }
}

if (isset($_POST['addstudents'])) {
    $name = $_POST["name"];
    $num = $_POST["number"];
    $email = $_POST["email"];
    $id = $_POST["class_id"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $fname = $_POST["f_name"];
    $mname = $_POST["m_name"];
    // echo '<pre>';
    // print_r($_POST); die;
    $check_sql = "SELECT * FROM tbl_students where number = '$num'";
    $result = $conn->query($check_sql);




    if ($result->num_rows > 0) {
        $_SESSION['web_err_msg'] = "Student with this Phone Number already exists !!!";
        header("Location: add_students.php");
    } else {
        $sql = "INSERT INTO tbl_students (name, number, email, class_id, address, dob, f_name, m_name)
            VALUES ('$name', '$num', '$email', '$id', '$address', '$dob', '$fname', '$mname')";
        if ($conn->query($sql) == TRUE) {
            $_SESSION['web_msg'] = "Student Added Successfully !!!";
            header("Location: add_students.php");
        } else {
            $_SESSION['web_err_msg'] = "Student Not Added Successfully !!!";
            header("Location: add_students.php");
        }
    }
}

if (isset($_POST['addstudent'])) {

    $name = $_POST["name"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $sql = "INSERT INTO student (name, number, email)VALUES ('$name', '$number', '$email')";

    if ($conn->query($sql) == TRUE) {
        $_SESSION['web_msg'] = "Student Added Successfully !!!";
        header("Location:   student.php");
    } else {
        $_SESSION['web_err_msg'] = "Student Not Added Successfully !!!";
        header("Location: student.php");
    }
}

if (isset($_POST['updatestudent'])) {
    // echo '<pre>';
    // print_r($_POST); die;

    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $UpdateId = $_POST['id'];

    $sql = "UPDATE student SET name='$name',number='$number',email='$email' WHERE id=$UpdateId";

    if ($conn->query($sql) == true) {

        $SESSION['web_msg'] = "updatestudent Added successfully !!!";
        header("location: student.php");
    } else {
        $SESSION['web_msg'] = "updatestudent not Added successfully !!!";
        header("location: student.php");
    }
}

if (isset($_POST['addaboutus'])) {

    $content   = $_POST["content"];
    //  echo'<pre>';
    //  print_r($content); die;
    $sql = "INSERT INTO aboutus (content) VALUES ('$content')";
    // print_r(  $sql);die;

    if ($conn->query($sql) == TRUE) {
        // print('fgedgs'); die;
        $_SESSION['web_msg'] = "aboutus Added Successfully !!!";
        header("Location: aboutus.php");
    } else {
        $_SESSION['web_err_msg'] = "aboutus Not Added Successfully !!!";
        header("Location: aboutus.php");
    }
    // print_r($conn);die;
}

if (isset($_POST['updateaboutas'])) {
    // echo'<pre>';
    // print_r($_POST);die;
    $content = $_POST['content'];
    $UpdateId = $_POST['id'];
    $sql = " UPDATE aboutus set content='$content' Where id='$UpdateId'";
    if ($conn->query($sql) == TRUE) {
        $_SESSION['web_msg'] = "updateaboutas Added Successfully !!!";
        header("Location: aboutus.php");
    } else {
        $_SESSION['web_err_msg'] = "updateStudent Not Added Successfully !!!";
        header("Location: aboutus.php");
    }
}

if (isset($_POST['addmission'])) {
    $content = $_POST["content"];
    $sql =  "INSERT INTO mission (content) VALUE ('$content')";
    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "mission Added Successfully !!!";
        header("Location: mission.php");
    } else {
        $_SESSION['web_err_msg'] = "mission Not Added Successfully !!!";
        header("Location: mission.php");
    }
}

if (isset($_POST['updatemission'])) {
    // echo'<pre>';
    // print_r($_POST);die;
    $content = $_POST['content'];
    $UpdateId = $_POST['id'];
    $sql = "UPDATE mission SET content='$content' WHERE id=$UpdateId";
    if ($conn->query($sql) == TRUE) {
        $_SESSION['web_msg'] = "updatemission Added Successfully !!!";
        header("Location: mission.php");
    } else {
        $_SESSION['web_err_msg'] = "updatemission Not Added Successfully !!!";
        header("Location: missiobn.php");
    }
}

if (isset($_POST['addvision'])) {
    $content = $_POST["content"];
    $sql =  "INSERT INTO vision (content) VALUE ('$content')";
    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "vision Added Successfully !!!";
        header("Location: vision.php");
    } else {
        $_SESSION['web_err_msg'] = "vision Not Added Successfully !!!";
        header("Location: vision.php");
    }
}

if (isset($_POST['updatevision'])) {
    $content = $_POST['content'];
    $UpdateId = $_POST['id'];
    $sql = "UPDATE vision SET content='$content' WHERE id=$UpdateId";
    if ($conn->query($sql) == TRUE) {
        $_SESSION['web_msg'] = "updatevision Added Successfully !!!";
        header("Location: vision.php");
    } else {
        $_SESSION['web_err_msg'] = "updatevision Not Added Successfully !!!";
        header("Location: vision.php");
    }
}

if (isset($_POST['addlunch'])) {
    $content = $_POST["content"];
    $sql =  "INSERT INTO lunch (content) VALUE ('$content')";
    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "lunch Added Successfully !!!";
        header("Location: lunch.php");
    } else {
        $_SESSION['web_err_msg'] = "lunch Not Added Successfully !!!";
        header("Location: lunch.php");
    }
}

if (isset($_POST['updatemission'])) {
    $content = $_POST['content'];
    $UpdateId = $_POST['id'];

    $sql = "UPDATE lunch SET content='$content' WHERE id=$UpdateId";
    if ($conn->query($sql) == TRUE) {
        $_SESSION['web_msg'] = "updatelunch Added Successfully !!!";
        header("Location: lunch.php");
    } else {
        $_SESSION['web_err_msg'] = "updatelunch Not Added Successfully !!!";
        header("Location: lunch.php");
    }
}


if (isset($_POST['addschool'])) {
    $content = $_POST["content"];
    $sql =  "INSERT INTO school_fee (content) VALUE ('$content')";
    // printf(  $sql);die;
    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "school fee Added Successfully !!!";
        header("Location: school fee.php");
    } else {
        $_SESSION['web_err_msg'] = "school fee Not Added Successfully !!!";
        header("Location: school fee.php");
    }
}

if (isset($_POST['updateschool'])) {
    $content = $_POST['content'];
    $UpdateId = $_POST['id'];
    $sql = "UPDATE school_fee SET content='$content' WHERE id=$UpdateId";
    if ($conn->query($sql) == TRUE) {
        $_SESSION['web_msg'] = "updateschool Added Successfully !!!";
        header("Location: school fee.php");
    } else {
        $_SESSION['web_err_msg'] = "updateschool Not Added Successfully !!!";
        header("Location: school fee.php");
    }
}

if (isset($_POST['addgallery'])) {
    $photo = $_FILES['image']['name'];
    $photo = explode('.', $photo);
    $image = time() . $photo[0];
    $imagename = $_FILES['image']['tmp_name'];
    // echo '<pre>';
    // print_r($imagename); die;
    $dir = "./gallery/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
    $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

    if ($check !== true) {
        $_SESSION['web_err_msg'] = $check;
        header("location:$_SERVER[HTTP_REFERER]");
        exit;
    }
    $image = $image . ".jpg";

    $sql = "INSERT INTO gallery (image)value (' $image')";
    // print_r( $sql);die;
    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "image Added Successfully !!!";
        header("Location: gallery.php");
    } else {
        $_SESSION['web_err_msg'] = "image  Not Added Successfully !!!";
        header("Location: gallery.php");
    }
}

if (isset($_POST['update_students'])) {
    //    echo '<pre>';
    //     print_r($_POST); die;
    $name = $_POST["name"];
    $num = $_POST["number"];
    $email = $_POST["email"];
    $id = $_POST["class_id"];
    $address = $_POST["address"];
    $dob = $_POST["dob"];
    $fname = $_POST["f_name"];
    $mname = $_POST["m_name"];
    $id_a = $_POST["id"];


    $check_sql = "SELECT * FROM tbl_students WHERE number = '$num' AND id != $id_a";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        $_SESSION['web_err_msg'] = "Student with this Phone Number already exists !!!";
        header("Location: edit_students.php?id=" . $id_a);
    } else {
        $sql = "UPDATE `tbl_students` SET  name = '$name',number = '$num',email = '$email',class_id = '$id',address = '$address',dob = '$dob',f_name = '$fname',m_name = '$mname' WHERE id = '$id_a'";
        if ($conn->query($sql) == TRUE) {
            $_SESSION['web_msg'] = "Student Editted Successfully !!!";
            header("Location: edit_students.php?id=" . $id_a);
        } else {
            $_SESSION['web_err_msg'] = "Student Not Editted Successfully !!!";
            header("Location: edit_students.php");
        }
    }




    // echo '<pre>';
    // print_r($_POST); die;
    // $check_sql = "SELECT * FROM tbl_students where number = '$num'";
    // $result = $conn->query($check_sql);
    // if ($result->num_rows > 0) {
    //     $_SESSION['web_err_msg'] = "Student with this Phone Number already exists !!!";
    //     header("Location: edit_students.php?id=".$id_a);
    //     } else {

    // }
}
if (isset($_POST['addclass'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $class_name = $_POST["class_name"];
    // echo '<pre>';
    // print_r($class_name); die;
    $check_sql = "SELECT * FROM tbl_class where class_name = '$class_name'";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        $_SESSION['web_err_msg'] = "Class already exists !!!";
        header("Location: add_class.php");
    } else {
        $sql = "INSERT INTO `tbl_class` (`class_name`) VALUES ('$class_name')";
        if ($conn->query($sql) == TRUE) {
            $_SESSION['web_msg'] = "Class Added Successfully !!!";
            header("Location: add_class.php");
        } else {
            $_SESSION['web_err_msg'] = "Class Not Added  !!!";
            header("Location: add_class.php");
        }
    }
}

if (isset($_POST['edit_class'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $name = $_POST["class_name"];
    $id = $_POST["id"];
    // echo '<pre>';
    // print_r($_POST); die;
    $check_sql = "SELECT * FROM tbl_class where class_name = '$name'";
    $result = $conn->query($check_sql);
    if ($result->num_rows > 0) {
        $_SESSION['web_err_msg'] = "Class already exists !!!";
        header("Location: add_class.php");
    } else {
        $sql = "UPDATE `tbl_class` SET class_name = '$name' WHERE id = '$id'";
        if ($conn->query($sql) == TRUE) {
            $_SESSION['web_msg'] = "Class Editted Successfully !!!";
            header("Location: add_class.php");
        } else {
            $_SESSION['web_err_msg'] = "Student Not Added Successfully !!!";
            header("Location: add_class.php");
        }
    }
}



if (isset($_POST['addenquery'])) {
    echo '<pre>';
    print_r($_POST);

    $name = $_POST['name'];
    $class = $_POST['class'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO tbl_enquiry (name ,class, number, email, address) VALUES (' $name','$class','$phone','$email','$address')";
    if ($conn->query($sql) == TRUE) {
        $SESSION['web_msg'] = "Enquiry Added Successfully ...";
        header("Location: enquiry.php");
    } else {
        $SESSION['web_err-msg'] = "Enquiry Not Added ...";
        header("Location: contact.php");
    }
}
if (isset($_POST['addimage'])) {
    $photo = $_FILES['image']['name'];

    $photo = explode('.', $photo);
    $image = time() . $photo[0];
    $imagename = $_FILES['image']['tmp_name'];
    $dir = "uploads/abc/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
    $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

    if ($check !== true) {
        $_SESSION['web_err_msg'] = $check;
        header("location:$_SERVER[HTTP_REFERER]");
        exit;
    }
    $image = $image . ".jpg";
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    $sql = "INSERT INTO tbl_gallery (image ,heading, content) VALUES (' $image','$heading','$content')";

    if ($conn->query($sql) == TRUE) {
        $_SESSION['web_msg'] = "image Added Successfully ...";
        header("Location: addimage.php");
    } else {
        $_SESSION['web_err-msg'] = "image Not Added ...";
        header("Location: addimage.php");
    }
}

if (isset($_POST['addabout'])) {
    $photo = $_FILES['image']['name'];

    $photo = explode('.', $photo);
    $image = time() . $photo[0];
    $imagename = $_FILES['image']['tmp_name'];
    $dir = "uploads/abc/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
    $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

    if ($check !== true) {
        $_SESSION['web_err_msg'] = $check;
        header("location:$_SERVER[HTTP_REFERER]");
        exit;
    }
    $image = $image . ".jpg";
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    $sql = "INSERT INTO tbl_about (image ,heading, content) VALUES (' $image','$heading','$content')";

    if ($conn->query($sql) == TRUE) {
        $SESSION['web_msg'] = "Content Added Successfully ...";
        header("Location: aboutlist.php");
    } else {
        $SESSION['web_err-msg'] = "Content Not Added ...";
        header("Location: addaboutimage.php");
    }
}
if (isset($_POST['addicon'])) {
    // echo '<pre>';
    // print_r($_POST); die;

    $icon = $_POST['icon'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];

    $sql = "INSERT INTO tbl_icon (icon ,heading,content) VALUES (' $icon','$heading','$content')";
    if ($conn->query($sql) == TRUE) {
        $SESSION['web_msg'] = "icon Added Successfully ...";
        header("Location: iconlist.php");
    } else {
        $SESSION['web_err-msg'] = "icon Not Added ...";
        header("Location: addicon.php");
    }
}
if (isset($_POST['addsetting'])) {
    // echo '<pre>';
    // print_r($_POST);die;

    $footer_text = $_POST['footer_text'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $youtube = $_POST['youtube'];
    $linkedin = $_POST['linkedin'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $map_iframe = $_POST['map_iframe'];


    $sql = "INSERT INTO tbl_setting (footer_text ,facebook,instagram,youtube,linkedin,address,email,phone,map_iframe) VALUES ('$footer_text','$facebook','$instagram',
    '$youtube','$linkedin','$address','$email','$phone','$map_iframe')";
    if ($conn->query($sql) == TRUE) {
        $SESSION['web_msg'] = "data Added Successfully ...";
        header("Location: settinglist.php");
    } else {
        $SESSION['web_err-msg'] = "data Not Added ...";
        header("Location: addsetting.php");
    }
}

if (isset($_POST['addadmission'])) {
    // echo '<pre>';
    // print_r($_POST);die;

    $student_name = $_POST['student_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $class_applying = $_POST['class_applying'];
    $last_class = $_POST['last_class'];
    $student_email = $_POST['student_email'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $parent_contact = $_POST['parent_contact'];
    $parent_email = $_POST['parent_email'];
    $address = $_POST['address'];

    $sql = "INSERT INTO tbl_admission (student_name ,dob, gender, class_applying, last_class,student_email,father_name,mother_name,parent_contact,parent_email,address) 
    VALUES (' $student_name','$dob','$gender','$class_applying','$last_class','$student_email','$father_name','$mother_name','$parent_contact','$parent_email','$address')";
    if ($conn->query($sql) == TRUE) {
        $SESSION['web_msg'] = "Enquiry Added Successfully ...";
        header("Location: admissionform.php");
    } else {
        $SESSION['web_err-msg'] = "Enquiry Not Added ...";
        header("Location: admission.php");
    }
}


if (isset($_POST['update_admission'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $class_applying = $_POST['class_applying'];
    $last_class = $_POST['last_class'];
    $student_email = $_POST['student_email'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $parent_contact = $_POST['parent_contact'];
    $parent_email = $_POST['parent_email'];
    $address = $_POST['address'];

    $sql = " UPDATE tbl_admission SET student_name ='$student_name', dob ='$dob', gender ='$gender', class_applying ='$class_applying', last_class ='$last_class',
    student_email ='$student_email', father_name ='$father_name', mother_name ='$mother_name', parent_contact ='$parent_contact', parent_email ='$parent_email', address ='$address' WHERE id ='$id'";

    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "admission Editted Sucessfully !!!";
        header("Location: admissionform.php?id=$id");
    } else {
        $_SESSION['web_err_msg'] = "admission Not Editted !!!";
        header("Location: admission.php");
    }
}


if (isset($_POST['update_enquiry'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $id = $_POST['id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = " UPDATE tbl_enquiry SET  name ='$name', class = '$class', number ='$number', email ='$email', address ='$address' WHERE `id`='$id'";

    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "Editted Sucessfully !!!";
        header("Location: enquiry.php?id=$id");
    } else {
        $_SESSION['web_err_msg'] = "Not Editted !!!";
        header("Location: contact.php");
    }
}


if (isset($_POST['update_gallery'])) {
    $photo = $_FILES['image']['name'];

    $photo = explode('.', $photo);
    $image = time() . $photo[0];
    $imagename = $_FILES['image']['tmp_name'];
    $dir = "uploads/abc/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
    $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

    if ($check !== true) {
        $_SESSION['web_err_msg'] = $check;
        header("location:$_SERVER[HTTP_REFERER]");
        exit;
    }
    $id = $_POST['id'];
    $image = $image . ".jpg";
    $heading = $_POST['heading'];
    $content = $_POST['content'];


    $sql = " UPDATE tbl_gallery SET  image = '$image', heading = '$heading ', content ='$content' WHERE `id`='$id'";

    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "Editted Sucessfully !!!";
        header("Location: gallerylist.php?id=$id");
    } else {
        $_SESSION['web_err_msg'] = "Not Editted !!!";
        header("Location: gallery.php");
    }
}

if (isset($_POST['update_about'])) {
    $photo = $_FILES['image']['name'];

    $photo = explode('.', $photo);
    $image = time() . $photo[0];
    $imagename = $_FILES['image']['tmp_name'];
    $dir = "uploads/abc/";
    $allext = array("png", "PNG", "jpg", "JPG", "jpeg", "JPEG", "GIF", "gif");
    $check = Imageupload($dir, 'image', $allext, '700000000', '10000000', '18000000', $image);

    if ($check !== true) {
        $_SESSION['web_err_msg'] = $check;
        header("location:$_SERVER[HTTP_REFERER]");
        exit;
    }
    $id = $_POST['id'];
    $image = $image . ".jpg";
    $heading = $_POST['heading'];
    $content = $_POST['content'];


    $sql = " UPDATE tbl_about SET  image = '$image', heading = '$heading ', content ='$content' WHERE `id`='$id'";

    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "Editted Sucessfully !!!";
        header("Location: aboutlist.php?id=$id");
    } else {
        $_SESSION['web_err_msg'] = "Not Editted !!!";
        header("Location: about.php");
    }
}

if (isset($_POST['update_icon'])) {
    // echo '<pre>';
    // print_r($_POST); die;
    $id = $_POST['id'];
    $icon = $_POST['icon'];
    $heading = $_POST['heading'];
    $content = $_POST['content'];



    $sql = " UPDATE tbl_icon SET  icon ='$icon', heading = '$heading', content ='$content' WHERE `id`='$id'";

    if ($conn->query($sql) == true) {
        $_SESSION['web_msg'] = "Editted Sucessfully !!!";
        header("Location: iconlist.php?id=$id");
    } else {
        $_SESSION['web_err_msg'] = "Not Editted !!!";
        header("Location: addicon.php");
    }
}
