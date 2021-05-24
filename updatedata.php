<?php

require __DIR__.'/config/dbconnect.php';

 $id = isset($_POST['sid'])?$_POST['sid']:'';
 $name = isset($_POST['name'])?$_POST['name']:'';
 $address = isset($_POST['address'])?$_POST['address']:'';
 $class = isset($_POST['class'])?$_POST['class']:'';
 $mobile = isset($_POST['mobile'])?$_POST['mobile']:'';

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