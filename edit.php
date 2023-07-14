<?php

session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else
    header('location:admin_login.php');
$page='category';
include('include/header.php');

?>

    <?php


        $id=$_GET['edit'];

        $query=mysqli_query($conn, "select * from category where id='$id'");

        while ($row=mysqli_fetch_array($query)){
            $category=$row['category_name'];
            $des=$row['des'];
        }

    ?>


    <div style=" width: 50%;  margin-left: 10%; margin-top: 10%;">

        <form action="edit.php" method="post" name="categoryform" onsubmit=" return validate() ">
            <h1>Update Category</h1>

            <div class="mb-3">
                <label for="email" class="form-label">Category: </label>
                <input type="text" name="category" class="form-control" id="email" value="<?php echo $category; ?>">
            </div>
            <div class="mb-3">
                <label for="comment">Comment: </label>
                <textarea class="form-control"  name="des" rows="5" id="comment"><?php echo $des;?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET['edit']?>">
            <input type="submit" name="submit" class="btn btn-primary" value="Update Category">
        </form>

        <script>

            function validate() {
                let x = document.forms['categoryform']['category'].value;
                if(x == ""){
                    alert(`category Must be filled out`);
                    return false;
                }
            }

        </script>
    </div>

<?php

if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $category = $_POST['category'];
    $des=$_POST['des'];

    $query1 = mysqli_query($conn, "update category set category_name='$category', des='$des' where id='$id' ");

    if ($query1) {
        header('location:category.php');
        echo "<script> alert(`Category has been Updated`); </script>";
        echo "<script >window.location = 'category.php';</script>";
    }else{
        echo "<script> alert(`Category not Updated`); </script>";
    }
}


?>


<?php

    include('include/footer.php');

?>

