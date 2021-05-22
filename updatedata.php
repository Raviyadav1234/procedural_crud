<?php
 $stu_id = $_POST['sid'];
 $stu_name = $_POST['sname'];
 $stu_address = $_POST['saddress'];
 $stu_class = $_POST['sclass'];
 $stu_phone = $_POST['sphone'];

      //including database connection file
     require_once __DIR__.'/config/dbconnect.php';
     
     $sql = "UPDATE student SET s_name='{$stu_name}',s_address='{$stu_address}',s_class='{$stu_class}',s_phone='{$stu_phone}' WHERE s_id='{$stu_id}'";
     $result=mysqli_query($conn,$sql) or die("query unsuccessfull");

  header("Location: http://localhost:8000/php-class1/procedural_crud/index.php");
  mysqli_close($conn);

?>