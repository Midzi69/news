<?php

session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else
    header('location:admin_login.php');
$page='news';
include('include/header.php');

?>


    <div style=" width: 50%;  margin-left: 10%; margin-top: 10%;">

        <div class="text-right">
            <a  class="btn btn-primary" href="AddNews.php">Add News</a>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Category</th>
                <th>Thumbnail</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php

            include('db/connection.php');
                $page = $_GET['page'];
               # if ($page=="" || $page=="1"){
               #     $page1 = 0;
               # } else {
               #     $page1 = ($page * 3) -3;

              #  }

            $query = mysqli_query($conn, "select * from news");
            while($row = mysqli_fetch_array($query)){

            ?>
                   <tr>
                       <td><?php echo $row['id'];?></td>
                       <td><?php echo $row['title'];?></td>
                       <td><?php echo $row['description'];?></td>
                       <td><?php echo date("F jS ,y", strtotime($row['date'])); ?> </td>
                       <td><?php echo $row['category'];?></td>
                       <td><img class="img img-thumbnail" src="img/<?php echo $row['thumbnail'];?>" alt="" width="100" height="100"></td>
                       <td><a href="news_edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                       <td><a href="news_delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                   </tr>





            <?php } ?>
        </table>


        </table>
    </div>

<?php

include('include/footer.php');

?>