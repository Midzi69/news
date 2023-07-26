<?php

session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else
    header('location:admin_login.php');
$page='product';
include('include/header.php');

?>

<?php


    $id = $_GET['edit'];
    $query = mysqli_query($conn, "select * from news where id = '$id'");
    while($row=mysqli_fetch_array($query)) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['date'];
        $thumbnail = $row['thumbnail'];
        $category = $row['category'];

    }

?>


<div style=" width: 50%;  margin-left: 10%; margin-top: 10%;">



    <?php

    # EDIT VESTI
    require_once 'Class/Vest.php';
    $newsForm = new NewsPage($conn, $_GET['page']);
    $newsForm->edit($title, $description, $date, $thumbnail, $category, $id, $conn);

    ?>

    <script>

        function validate() {
            let x = document.forms['categoryform']['title'].value;
            let y = document.forms['categoryform']['description'].value;
            let z = document.forms['categoryform']['date'].value;
            let w = document.forms['categoryform']['category'].value;

            if(x==""){
                alert(`Title must be filled out!`);
                return false;
            }
            if(y==""){
                alert(`Description must be filled out!`);
                return false;
            }
            if(y.length<10){
                alert(`Description must contain at least 10 characters!`);
                return false;
            }
        }

    </script>

</div>



<?php

include('include/footer.php');

?>

<?php



    if(isset($_POST['submit'])) {
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $thumbnail = $_FILES['thumbnail']['name'];
        $tmp_thumbnail = $_FILES['thumbnail']['tmp_name'];
        $category = mysqli_real_escape_string($conn, $_POST['category']);

        $sql = mysqli_query($conn, "update news set title='$title',description='$description',date='$date', thumbnail='$thumbnail', category='$category' where id='$id'");

        if($sql) {
            echo "<script>alert(`News updated successfully!`);</script>";
            echo "<script >window.location = 'news.php';</script>";
        } else {
            echo "<script>alert(`Try again!`);</script>";
        }

    }

?>
