<?php
include 'connection.php';


if (isset($_POST['addclassroom'])) {
    $teacher_id = $_POST['teacher_id'];
    $section = $_POST['section'];
    $sql ="INSERT INTO classroom (teacher_id, section) VALUES('$teacher_id',' $section')";
    $run = $conn->query( $sql );
    if($run==1){
        echo'insert';
    }   
}


if(isset($_POST['addexam'])){
 $name = $_POST['name'];
 $date =$_POST['date'];
 $type =$_POST['type'];
 $sql ="INSERT INTO exam  (name,date,type)VALUES('$name','$date','$type')";
 $run=$conn->query($sql);
 if($run==1){
    echo'insert';
 }
}


if(isset($_POST['addstudent'])){
$name =$_POST['name'];
$fathername =$_POST['fathername'];
$subject =$_POST['subject'];
$email =$_POST ['email'];
$password =$_POST['password'];
$dob =$_POST['dob'];
// $sex =$_POST['sex'];
$adress=$_POST['adress'];
 $sql ="INSERT INTO student(name,fathername,subject,email,password,dob,adress)VALUE('$name','$fathername','$subject','$email','$password','$dob','$adress')";
 $run=$conn->query($sql);
 if($run==1){
    echo'insert';
 }
}

if (isset($_POST['addsubject'])){
$name =$_POST['name'];
$subject_id =$_POST['subject_id'];
$description =$_POST['description'];
$sql="INSERT INTO subject  (name,subject_id,description) VALUE('$name','$subject_id','$description')";
 $run=$conn->query($sql);
 if($run==1){
    echo'insert';
 }
}

if(isset($_POST['addresult'])){ 
$student =$_POST['student'];
$subject =$_POST['subject'];
$marks =$_POST['marks'];
$sql ="INSERT INTO result(student,subject,marks)VALUES('$student','$subject','$marks')";
 $run=$conn->query($sql);
 if($run==1){
    echo'insert';
 }
}

if(isset($_POST['addteachar'])){
     $name = $_POST['name'];
 $email =$_POST['email'];
 $password =$_POST['password'];
 $dob =$_POST['dob'];
 $sex =$_POST['sex'];
 $phone =$_POST['phone'];
 $sql ="INSERT INTO  teacher  (name,email,password,dob,sex,phone)VALUES('$name','$email','$password','$dob',' $sex',' $phone')";
 $run=$conn->query($sql);
 if($run==1){
    echo'insert';
}
}

if(isset($_POST['addattendance'])){
     $user_id = $_POST['user_id'];
 $date =$_POST['date'];
  $sql ="INSERT INTO attendance(user_id,date)VALUES(' $user_id',' $date')";
 $run=$conn->query($sql);
  if($run==1){
    echo'insert';
}
}   


if(isset($_POST['addclassroom_student'])){
     $subject_id = $_POST['subject_id'];
 $classroom_id =$_POST['classroom_id'];
  $create_at =$_POST['create_at'];
  $sql ="INSERT INTO classroom_student(subject_id,classroom_id,create_at)VALUES(' $subject_id',' $classroom_id','$create_at')";
 $run=$conn->query($sql);
  if($run==1){
    echo'insert';
  }
}


if(isset($_POST['addissues'])){
     $issue_id = $_POST['issue_id'];
 $detail =$_POST['detail'];
  $create_at =$_POST['create_at'];
  $sql ="INSERT INTO issues(issue_id,detail,create_at)VALUES(' $issue_id',' $detail','$create_at')";
 $run=$conn->query($sql);
  if($run==1){
    echo'insert';die;
  }
}







    


















?>