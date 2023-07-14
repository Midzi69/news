<?php

    include('include/index_header.php');

?>

<div class="container">
    <header class="border-bottom lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <form class="d-flex" role="search" action="search.php" method="post">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="index.php">News</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="link-secondary" href="#" aria-label="Search">

                </a>
                <a class="btn btn-sm btn-outline-secondary" href="admin_login.php">Sign up</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-3 border-bottom">

        <nav class="nav nav-underline justify-content-between">
            <?php


            $query1 = mysqli_query($conn, "select * from category");
            while($row=mysqli_fetch_array($query1)){



                ?>
                <a class="nav-item nav-link link-body-emphasis" href="category_page.php?single=<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></a>
            <?php } ?>
        </nav>

    </div>
</div>

<main class="container">
    <div class="card" style="width: 100%; height: 10%; margin-bottom: 10px">
        <img class="card-img-top" src="img/News.jpg" alt="Card image">
        <div class="card-img-overlay">

        </div>
    </div>

    <div class="row mb-2">
        <?php


        $query1 = mysqli_query($conn, "select * from news limit 1,2");
        while($row = mysqli_fetch_array($query1)) {
            $category = $row['category'];
            $date = $row['date'];
            $title = $row['title'];
            $thumbnail = $row['thumbnail'];


            ?>
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">

                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                        <h3 class="mb-0"><?php echo $row['category'];?></h3>
                        <div class="mb-1 text-body-secondary"><?php echo $row['date'];?></div>
                        <p class="card-text mb-auto"><?php echo $row['title'];?></p>
                        <a href="single-page.php?single=<?php echo $row['id'];?>" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="" src="img/<?php echo $thumbnail;?>" width="200" height="250"  preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="#55595c"/></img>
                    </div>

                </div>
            </div>
        <?php   } ?>



        <div class="row g-5">
            <div class="col-md-8">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Single Record
                </h3>

                <?php



                if(isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $query = mysqli_query($conn, "select * from news where title like '%$search%'");
                    while ($row = mysqli_fetch_array($query)){

                    $title = $row['title'];
                    $date = $row['date'];
                    $thumbnail = $row['thumbnail'];
                    $description = $row['description'];


                ?>


                <article class="blog-post">
                    <h2 class="display-5 link-body-emphasis mb-1"><?php echo $title;?></h2>
                    <p class="blog-post-meta"><?php echo $date;?></p>

                    <p><img class="img img-thumbnail" src="img/<?php echo $thumbnail;?>"></p>
                    <hr>

                    <blockquote class="blockquote">
                        <?php echo $description;?>

                    </blockquote>
                    <hr>

                </article>



                    <?php }}?>

            </div>


            <div class="col-md-4">
                <div class="position-sticky" style="top: 2rem;">
                    <div class="p-4 mb-3 bg-body-tertiary rounded">
                        <h4 class="fst-italic">About</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi, aperiam beatae consequuntur eos eveniet explicabo iure molestias necessitatibus non pariatur porro quasi quod reiciendis, repudiandae sapiente soluta ut vitae?</p>
                    </div>

                    <div>
                        <h4 class="fst-italic">N1</h4>
                        <ul class="list-unstyled">
                            <li>
                                <a  class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://sportklub.n1info.rs/tenis/wimbledon/dan-7-novak-ponovo-poslednji-na-centralnom-terenu/">
                                    <img class="bd-placeholder-img" width="100%" height="96" src="img/djokovic.jpg" aria-hidden="true"  focusable="false"></img>
                                    <div class="col-lg-8">
                                        <h6 class="mb-0">Dan 7: Novak ponovo poslednji na Centralnom terenu</h6>
                                        <small class="text-body-secondary">8. jul 2023</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://n1info.rs/magazin/zdravlje/popodnevni-odmor-utice-na-zdravlje-mozga/">
                                    <img class="bd-placeholder-img" width="100%" height="96" src="img/shutterstock_1708358758-750x500.jpg" aria-hidden="true"  focusable="false"></img>
                                    <div class="col-lg-8">
                                        <h6 class="mb-0">Popodnevni odmor utiče na zdravlje mozga</h6>
                                        <small class="text-body-secondary">8. jul 2023</small>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="https://n1info.rs/vesti/ministar-nalozio-procenu-vesic-trazi-od-organizatora-blokada-da-plate-stetu/">
                                    <img class="bd-placeholder-img" width="100%" height="96" src="img/1688461486-Tan2023-07-0410392095_6-copy-750x501.jpg" aria-hidden="true"  focusable="false"></img>
                                    <div class="col-lg-8">
                                        <h6 class="mb-0">Ministar naložio procenu: Vesić traži od organizatora blokada da plate štetu
                                        </h6>
                                        <small class="text-body-secondary">8. jul 2023</small>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4">
                        <h4 class="fst-italic">Categories</h4>
                        <ol class="list-unstyled mb-0">
                            <?php


                            $query1 = mysqli_query($conn, "select * from category");
                            while($row=mysqli_fetch_array($query1)){



                                ?>
                                <li><a href="#"><?php echo $row['category_name'];?></a></li>
                            <?php } ?>
                        </ol>
                    </div>

                    <?php

                    include('include/index_footer.php');

                    ?>
