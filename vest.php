<?php

include ('db/connection.php');
error_reporting(0);
$page = $_GET['page'];

$query = mysqli_query($conn, "select * from news");
while($row = mysqli_fetch_array($query)){
    ?>




    <article class="blog-post">
        <h2 class="display-5 link-body-emphasis mb-1"><a href="single-page.php?single=
                <?php echo $row['id'];?>"><?php echo $row['title'];?></h2>
        <p class="blog-post-meta"><?php echo $row['date'];?></a></p>

        <p><img class="img img-thumbnail" src="img/<?php echo $row['thumbnail'];?>"></p>
        <hr>

        <blockquote class="blockquote">
            <?php echo substr($row['description'],0,300);?>
            <a href="single-page.php?single=<?php echo $row['id'];?>" class="btn btn-danger btn-sm">Read More...</a>
        </blockquote>
        <hr>

    </article>

    <?php
}

?>