<?php 

    session_start();
    if($_SESSION['email']==true){

    }else
    header('location:/login');
    $page='category';
        include('include/header.php');

?>


<div style=" width: 50%;  margin-left: 10%; margin-top: 10%;">

<div class="text-right">
    <a  class="btn btn-primary" href="/addcategory">Add Category</a>
</div>

<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php

       
        $query=mysqli_query($conn, "select * from category");
        while($row=mysqli_fetch_array($query)){



    ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['category_name']; ?></td>
        <td><?php echo substr($row['des'], 0,200); ?></td>
        <td><a href="/categoryEdit?edit=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="/categoryDelete?del=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php

        }

    ?>
</table>

</div>

<?php 

    include('include/footer.php');

?>
