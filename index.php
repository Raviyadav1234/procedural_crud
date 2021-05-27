<?php
define('title','home');
require_once 'header.php';
?>
<head>
    <style type="text/css">
        /* Pagination  Styling */
.pagination {
    display: block;
    text-align: center;
    margin: 0;
}

.pagination li {
    display:inline-block;
    margin: 0 2px;
}

.pagination li a{
    border: none;
    background: #1e90ff;
    color: #fff;
}

.pagination li a:hover{
color: white;
background: black;
}

    </style>
</head>
<div id="main-content">
    <h2>All Records</h2>
    <?php
     //including database connection file
     require __DIR__.'/config/dbconnect.php';

                /* Calculate Offset Code */
                $page = basename($_SERVER['PHP_SELF']);
                  $limit = 3;
                  if(isset($_GET['page'])){
                    $page = $_GET['page'];
                  }else{
                    $page = 1;
                  }
                  $offset = ($page - 1) * $limit;
     
     $sql = "SELECT *FROM student JOIN studentclass WHERE student.s_class=studentclass.c_id ORDER BY student.s_id LIMIT {$offset},{$limit}";
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

     require __DIR__.'/config/dbconnect.php';
   $sql1 = "SELECT *FROM student JOIN studentclass WHERE student.s_class=studentclass.c_id";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed.");

                if(mysqli_num_rows($result1) > 0){

                  $count1 = mysqli_num_rows($result1);

                  $total_page = ceil($count1 / $limit);

                  echo '<ul class="pagination text-center ">';
                  if($page > 1){
                    echo '<li class="page-it"><a class="page-link" href="index.php?page='.($page - 1).'">Prev</a></li>';
                  }
                  for($i = 1; $i <= $total_page; $i++){
                    if($i == $page){
                      $active = "active";
                    }else{
                      $active = "";
                    }
                    echo '<li class="page-item'.$active.'"><a class="page-link" href="index.php?page='.$i.'">'.$i.'</a></li>';
                  }
                  if($total_page > $page){
                    echo '<li class="page-item"><a class="page-link" href="index.php?page='.($page + 1).'">Next</a></li>';
                  }

                  echo '</ul>';
                }


mysqli_close($conn);
 ?>
</div>
</div>
</body>
</html>
