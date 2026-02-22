<?php
session_start();
include 'connection.php';

   $sql = "SELECT * FROM subbrand WHERE brandname LIKE '%".$_GET['brandname']."%'"; 
   $result = mysqli_query($conn,$sql);
   $json = [];
   while($row = mysqli_fetch_assoc($result)){
        $json[$row['subbrand']] = $row['subbrand'];
   }
   echo json_encode($json);
?>