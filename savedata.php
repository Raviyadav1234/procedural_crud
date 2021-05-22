<?php
 $stu_name = $_POST['sname'];
 $stu_address = $_POST['saddress'];
 $stu_class = $_POST['class'];
 $stu_phone = $_POST['sphone'];

     //including database connection file
     require_once __DIR__.'/config/dbconnect.php';
     
     $sql = "INSERT INTO student(s_name,s_address,s_class,s_phone) VALUES ('{$stu_name}','{$stu_address}','{$stu_class}','{$stu_phone}')";
     //$result=mysqli_query($conn,$sql) or die("query unsuccessfull");

     if(mysqli_query($conn,$sql)){
    header("Location: http://localhost:8000/php-class1/procedural_crud/index.php");
     }else{
      echo "Query Failed :".mysqli_error($conn);
     }

  mysqli_close($conn);

?>