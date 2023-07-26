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

        <?php

        require_once 'Class/Category.php';
        $newsForm = new Category($conn);
        $newsForm->edit($category, $des);

        ?>

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
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $des = mysqli_real_escape_string($conn, $_POST['des']);

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

