<?php 
define('title', 'update');
require_once 'header.php'; 
require __DIR__.'/config/dbconnect.php';
?>
    <div style="margin-top:80px; " class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-sm-6 col-md-4">
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label  for="id" class="pl-2 font-weight-bold">Enter Id</label>
            <input type="text" class="form-control" name="s_id" />
        </div>
        <input class="btn btn-outline-success" type="submit" name="showbtn" value="Show" />
    </form>
</div>
</div>
</div>

    <?php
    if(isset($_POST['showbtn'])){
     $id = $_POST['s_id'];
     $sql = "SELECT *FROM student  WHERE s_id= {$id}";
     $result=mysqli_query($conn,$sql) or die("query unsuccessfull");
      $count=mysqli_num_rows($result);
     if($count>0){

      while($row=mysqli_fetch_assoc($result)){
    ?>
    <div class="mb-3 text-center" style="font-size: 50px;">
    <span >Update Post</span>
    
  </div>
  
  <div class="container-fluid mb-5">
    <div class="row justify-content-center">
      <div class="col-sm-6 col-md-4">
        <form action="updatedata.php" class="shadow-lg p-4" method="POST">
          <div class="form-group">
          <input type="hidden" class="form-control" placeholder="Name" name="sid" value="<?php echo $row['s_id'];?>">
          <label for="email" class="pl-2 font-weight-bold">Name</label>
          <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $row['s_name'];?>">
        
          </div>
          <div class="form-group">
      <label for="pass" class="pl-2 font-weight-bold">Address</label>
      <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $row['s_address'];?>">
          </div>
          
         <div class="form-group">
            <label for="pass" class="pl-2 font-weight-bold">Class</label>
            
    <?php
     require __DIR__.'/config/dbconnect.php';
     $sql1 = "SELECT *FROM studentclass";
     $result1=mysqli_query($conn,$sql1) or die("query unsuccessfull");
     $count1 = mysqli_num_rows($result1);
     if($count1>0){

       echo '<select name="class">';
                
       while($row1 = mysqli_fetch_assoc($result1)){
        if($row['s_class']==$row1['c_id']){
          $select = "selected";
        }else{
          $select = "";
        }
        ?>

         <option <?php echo $select ;?> value="<?php echo $row1['c_id'];?>"><?php echo $row1['c_name'];?></option>

            <?php }}?>

            </select>
          </div>

          <div class="form-group">
            <label for="pass" class="pl-2 font-weight-bold">Mobile</label><input type="text"
              class="form-control" placeholder="Mobile" name="mobile" value="<?php echo $row['s_phone'];?>">
          </div>
          <button type="submit" class="btn btn-outline-success mt-3 btn-block shadow-sm font-weight-bold" name="edit">Update</button>
          <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        <?php }}} ?>
      </div>
    </div>
  </div>
</body>
</html>
