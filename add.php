<?php 
define('title','add');
require_once 'header.php';
require __DIR__.'/config/dbconnect.php';
require __DIR__.'/config/function.php';

 $name = sanatise(isset($_POST['name'])?$_POST['name']:'');
 $address = sanatise(isset($_POST['address'])?$_POST['address']:'');
 $class = sanatise(isset($_POST['class'])?$_POST['class']:'');
 $mobile = sanatise(isset($_POST['mobile'])?$_POST['mobile']:'');

 $name = mysqli_real_escape_string($conn,$name);
 $address = mysqli_real_escape_string($conn,$address);
 $class = mysqli_real_escape_string($conn,$class);
 $mobile = mysqli_real_escape_string($conn,$mobile);

     if(isset($_POST['save'])){
        if($name=="" or $address=="" or $class=="" or $mobile==""){
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
        }else{
    $sql = "INSERT INTO student(s_name,s_address,s_class,s_phone) VALUES ('{$name}','{$address}','{$class}','{$mobile}')";

     if(mysqli_query($conn,$sql)){
    header("Location: http://localhost:8000/php-class1/procedural_crud/index.php");
     }else{
      echo "Query Failed :".mysqli_error($conn);
     }
        }
     }

  mysqli_close($conn);

 ?>


<div class="mb-3 text-center" style="font-size: 50px; margin-top:70px;">
    <span >Add Post</span>
    
  </div>
  
  <div class="container-fluid mb-5">
    <div class="row justify-content-center custom-margin">
      <div class="col-sm-6 col-md-4">
        <form action="<?php $_SERVER['PHP_SELF'];?>" class="shadow-lg p-4" method="POST">
          <div class="form-group">
            <label for="email" class="pl-2 font-weight-bold">Name</label><input type="text"
              class="form-control" placeholder="Name" name="name">
        
          </div>
          <div class="form-group">
<label for="pass" class="pl-2 font-weight-bold">Address</label>
<input type="text" class="form-control" placeholder="Address" name="address">
          </div>
          
         <div class="form-group">
            <label for="pass" class="pl-2 font-weight-bold">Class</label>
            <select name="class">
                <option disabled selected>--Select--</option>
    <?php
   require __DIR__.'/config/dbconnect.php';
     $sql1 = "SELECT *FROM studentclass";
     $result1=mysqli_query($conn,$sql1) or die("query unsuccessfull");

       while($row1 = mysqli_fetch_assoc($result1)){
        ?>

                <option value="<?php echo $row1['c_id'];?>"><?php echo $row1['c_name'];?></option>
            <?php }?>
            </select>
          </div>

          <div class="form-group">
            <label for="pass" class="pl-2 font-weight-bold">Mobile</label><input type="text"
              class="form-control" placeholder="Mobile" name="mobile">
          </div>
          <button type="submit" class="btn btn-outline-success mt-3 btn-block shadow-sm font-weight-bold" name="save">Save</button>
          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        
      </div>
    </div>
  </div>

    
</body>
</html>
