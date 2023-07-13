
<?php
    #HEADER
    include('include/index_header.php');

?>

<div class="container">
    <header class="border-bottom lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
                <form class="d-flex" role="search" action="search.php" method="post">
                    <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                </form>
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">News</a>
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

            include('db/connection.php');
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



        <?php
            #WORLD NEWS
            include ('world_news.php');

        ?>


    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                From the Firehose
            </h3>


            <?php
            # VESTI SA YAHOO NEWS
            include('yahoo_vesti.php');

            ?>

            <?php
                # VESTI SA N1
                include('n1_vesti.php');

            ?>

            <?php

            #VESTI SA B92
            include ('b92_vesti.php');

            ?>



            <?php

                #VEST
                include ('vest.php');

            ?>



        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-body-tertiary rounded">
                    <h4 class="fst-italic">About</h4>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet animi, aperiam beatae consequuntur eos eveniet explicabo iure molestias necessitatibus non pariatur porro quasi quod reiciendis, repudiandae sapiente soluta ut vitae?</p>
                </div>

                    <?php
                    #N1 SIDEBAR
                    include ('n1_news_sidebar.php');

                    ?>

                <div class="p-4">
                    <h4 class="fst-italic">Categories</h4>
                    <ol class="list-unstyled mb-0">
                        <?php

                            include('db/connection.php');
                            $query1 = mysqli_query($conn, "select * from category");
                            while($row=mysqli_fetch_array($query1)){



                        ?>
                        <li><a href="category_page.php?single=<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></a></li>
                        <?php } ?>
                    </ol>
                </div>



                <?php
                #FOOTER
                include('include/index_footer.php');

                ?>
