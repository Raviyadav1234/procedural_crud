<?php
define('title','home');
require_once 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
     //including database connection file
     require_once __DIR__.'/config/dbconnect.php';
     
     $sql = "SELECT *FROM student JOIN studentclass WHERE student.s_class=studentclass.c_id";
     $result=mysqli_query($conn,$sql) or die("query unsuccessfull");

     $count=mysqli_num_rows($result);
     if($count>0){
    ?>
    <table class="table table-hover table-bordered text-center">
        <thead>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Class</th>
        <th scope="col">Phone</th>
        <th scope="col">Action</th>
        </thead>
        <tbody>
            <?php while($row=mysqli_fetch_assoc($result)){ ?>
            <tr>
                <td><?php echo $row['s_id'];?></td>
                <td><?php echo $row['s_name'];?></td>
                <td><?php echo $row['s_address'];?></td>
                <td><?php echo $row['c_name'];?></td>
                <td><?php echo $row['s_phone'];?></td>
                <td>
                <a href='edit-inline.php?id=<?php echo $row['s_id'];?>' value="Edit"><i class="fas fa-pen mr-5"></i></a>
                <a href='delete-inline.php?id=<?php echo $row['s_id'];?>' value="Delete"><i class="far fa-trash-alt ml-5"></i></a>
                </td>
            </tr>
           <?php } ?> 
        </tbody>
    </table>
<?php }else{
    echo "<h2>NO Record Found</h2>";
}
mysqli_close($conn);
 ?>
</div>
</div>
</body>
</html>
