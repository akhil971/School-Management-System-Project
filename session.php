<?php
session_start();
include 'connection.php';
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
?>