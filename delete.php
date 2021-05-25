<?php 
define('title', 'delete');
require 'header.php'; 

if(isset($_POST['deletebtn'])){
	 //including database connection file
     require_once __DIR__.'/config/dbconnect.php';
     $id = $_POST['id'];

     $sql = "DELETE FROM student  WHERE s_id= {$id}";
     $result=mysqli_query($conn,$sql) or die("query unsuccessfull");
      
     header("Location: http://localhost:8000/php-class1/procedural_crud/index.php");
    
    mysqli_close($conn);
}

?>

    <div style="margin-top:80px; " class="container-fluid">
    <div class="row justify-content-center">
    <div class="col-sm-6 col-md-4">
    <form class="post-form" action="<?php $_SERVER['PHP_SELF'];?>" method="post">
        <div class="form-group">
            <label  for="id" class="pl-2 font-weight-bold">Enter Id</label>
            <input type="text" class="form-control" name="id" />
        </div>
        <input class="btn btn-outline-danger" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</div>
</body>
</html>
