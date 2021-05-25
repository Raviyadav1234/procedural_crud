<?php

require __DIR__.'/config/dbconnect.php';
require __DIR__.'/config/function.php';

 $id = sanatise(isset($_POST['sid'])?$_POST['sid']:'');
 $name = sanatise(isset($_POST['name'])?$_POST['name']:'');
 $address = sanatise(isset($_POST['address'])?$_POST['address']:'');
 $class = sanatise(isset($_POST['class'])?$_POST['class']:'');
 $mobile = sanatise(isset($_POST['mobile'])?$_POST['mobile']:'');

 $id = mysqli_real_escape_string($conn,$id);
 $name = mysqli_real_escape_string($conn,$name);
 $address = mysqli_real_escape_string($conn,$address);
 $class = mysqli_real_escape_string($conn,$class);
 $mobile = mysqli_real_escape_string($conn,$mobile);

     if(isset($_POST['edit'])){
        if($name=="" or $address=="" or $class=="" or $mobile==""){
        $err_msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        
        }else{
    $sql = "UPDATE  student SET s_name='{$name}', s_address='{$address}', s_class='{$class}', s_phone='{$mobile}' WHERE s_id='{$id}'";

     if(mysqli_query($conn,$sql)){
    header("Location: http://localhost:8000/php-class1/procedural_crud/index.php");
     }else{
      echo "Query Failed :".mysqli_error($conn);
     }
        }
     }

  mysqli_close($conn);

?>