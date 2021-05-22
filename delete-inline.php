<?php
     $stu_id = $_GET['id'];

     //including database connection file
     require_once __DIR__.'/config/dbconnect.php';
     $sql = "DELETE FROM student  WHERE s_id= {$stu_id}";
     $result=mysqli_query($conn,$sql) or die("query unsuccessfull");
      
     header("Location: http://localhost:8000/php-class1/procedural_crud/index.php");	
    
    mysqli_close($conn);

?>