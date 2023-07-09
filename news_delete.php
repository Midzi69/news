<?php

    include ('db/connection.php');
    $id = $_GET['del'];
    $query = mysqli_query($conn, "delete from news where id='$id'");
    if($query) {
        echo "<script>alert(`News deleted successfully!`);</script>";
        echo "<script >window.location = 'news.php';</script>";
    } else {
        echo "<script>alert(`Try again!`);</script>";
    }


?>