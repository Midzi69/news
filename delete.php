<?php
    include('db/connection.php');
    $id = $_GET['del'];
    $query = mysqli_query($conn, "delete from category where id='$id'");
        if ($query) {
            echo "<script> alert(`Category has been deleted`); </script>";
            header('location:category.php');
        } else {
            echo "<script> alert(`Please try again`); </script>";
        }



?>
