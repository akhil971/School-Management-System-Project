<?php

include 'connection.php';

if(!empty($_GET['subjectid'])){
$subjectId = $_GET['subjectid'];

$sql = "DELETE FROM subject WHERE id=$subjectId";
$run = $conn->query($sql);
if($run==1){
    header("Location:subjectlist.php");
   
}else{
    echo 'Not Deleted';
}
}



if(!empty($_GET['attendanceid'])){
$attendanceId = $_GET['attendanceid'];

$sql = "DELETE FROM attendance WHERE id=$attendanceId";
$run = $conn->query($sql);
if($run==1){
    header("Location:attendancelist.php");
   
}else{
    echo 'Not Deleted';
}

}

if(!empty($_GET['classroomid'])){
$classroomId = $_GET['classroomid'];

$sql = "DELETE FROM classroom WHERE id=$classroomId";
$run = $conn->query($sql);
if($run==1){
    header("Location:classroomlist.php");
   
}else{
    echo 'Not Deleted';
}
}


if(!empty($_GET['studentid'])){
$studentId = $_GET['studentid'];

$sql = "DELETE FROM student WHERE id=$studentId";
$run = $conn->query($sql);
if($run==1){
    header("Location:studentlist.php");
   
}else{
    echo 'Not Deleted';
}
}



if(!empty($_GET['resultid'])){
$resultId =$_GET['resultid'];
$sql ="DELETE FROM result WHERE id=$resultId";
$run =$conn->query($sql);
if($run==1){
     header("location:resultlist.php");
}else{
    echo  'Not DEleted';
}
}

  

if(!empty($_GET['examid'])){
$examId =$_GET['examid'];
$sql ="DELETE FROM exam WHERE id=$examId";
$run =$conn->query($sql);
if($run==1){
     header("location:examlist.php");
}else{
    echo  'Not DEleted';
}
}

if(!empty($_GET['teacharid'])){
$teacharid =$_GET['teacharid'];
$sql ="DELETE FROM teacher WHERE id=$teacharid";
$run =$conn->query($sql);
if($run==1){
    header("location:teacharlist.php");
}else{
    echo  'not DEleted';

}
}



if(!empty($_GET['classroom_studentid'])){
$classroom_studentid =$_GET['classroom_studentid'];
$sql ="DELETE FROM classroom_student WHERE id=$classroom_studentid";
$run =$conn->query($sql);
if($run==1){
    header("location:classroom_studentlist.php");
}else{
    echo  'not DEleted';

}
}


if(!empty($_GET['issuesid'])){
$issuesid =$_GET['issuesid'];
$sql ="DELETE FROM issues WHERE id=$issuesid";
$run =$conn->query($sql);
if($run==1){
    header("location:issueslist.php");
}else{
    echo  'not DEleted';

}
}
?>