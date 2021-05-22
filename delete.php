<?php include 'header.php'; 

if(isset($_POST['deletebtn'])){
	 //including database connection file
     require_once __DIR__.'/config/dbconnect.php';
     $stu_id = $_POST['sid'];

     $sql = "DELETE FROM student  WHERE s_id= {$stu_id}";
     $result=mysqli_query($conn,$sql) or die("query unsuccessfull");
      
     header("Location: http://localhost:8000/php-class1/procedural_crud/index.php");
    
    mysqli_close($conn);
}

?>
<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>
</html>
