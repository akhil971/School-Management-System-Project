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
if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
 
    $sql = "UPDATE tbl_user SET status = $status WHERE id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status, $id);
    if ($stmt->execute()) {
        echo 'Status updated successfully';
    } else {
        echo 'Error updating status';
    }
    $stmt->close();
}

     




