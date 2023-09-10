<?php

session_start();
if($_SESSION['email']==true){

}else
    header('location:admin_login.php');
$page='product';
include('include/header.php');

?>


    <div style=" width: 50%;  margin-left: 10%; margin-top: 10%;">



            <?php
            error_reporting(0);
            require_once 'Class/Vest.php';
            $newsForm = new NewsPage($conn, $_GET['page']);
            $newsForm->create();


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
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $thumbnail = $_FILES['thumbnail']['name'];
    $tmp_thumbnail = $_FILES['thumbnail']['tmp_name'];
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    move_uploaded_file($tmp_thumbnail, "img/$thumbnail");

    $query1 = mysqli_query($conn, "insert into news(title, description, date,category,thumbnail)values('$title', '$description', '$date', '$category', '$thumbnail')");

    if($query1) {
        echo "<script>alert(`News uploaded successfully!`);</script>";
    } else {
        echo "<script>alert(`Try again!`);</script>";
    }
}

?>
