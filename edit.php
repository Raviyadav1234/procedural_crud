<?php include 'header.php'; ?>

<div id="main-content">
    <h2>Update Record</h2>
    
    <?php
    //including database connection file
     require_once __DIR__.'/config/dbconnect.php';

     $stu_id = $_GET['id'];
     $sql = "SELECT *FROM student  WHERE s_id= {$stu_id}";
     $result=mysqli_query($conn,$sql) or die("query unsuccessfull");
      $count=mysqli_num_rows($result);
     if($count>0){

      while($row=mysqli_fetch_assoc($result)){
    ?>
    <form class="post-form" action="updatedata.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="hidden" name="sid" value="<?php echo $row['s_id'];?>"/>
          <input type="text" name="sname" value="<?php echo $row['s_name'];?>"/>
      </div>
      <div class="form-group">
          <label>Address</label>
          <input type="text" name="saddress" value="<?php echo $row['s_address'];?>"/>
      </div>
      <div class="form-group">
          <label>Class</label>
          <?php
         $sql1 = "SELECT * FROM studentclass";
         $result1=mysqli_query($conn,$sql1) or die("query unsuccessfull");
         $count1=mysqli_num_rows($result1);
         if($count1>0){
          echo '<select name="sclass">';

         while($row1=mysqli_fetch_assoc($result1)){
            if ($row['s_class'] == $row1['c_id']) {
              $select = "selected";
            }else{
             $select = "";
            }
          
             echo "<option {$select} value='{$row1['c_id']}''>{$row1['c_name']}</option>";
           }

          echo "</select>";
        }
          ?>
      </div>
      <div class="form-group">
          <label>Phone</label>
          <input type="text" name="sphone" value="<?php echo $row['s_phone'];?>"/>
      </div>
      <input class="submit" type="submit" value="Update"/>
    </form>
  <?php } }?>
</div>
</div>
</body>
</html>