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
                    <a href="/singlepage?single=<?php echo $row['id'];?>" class="icon-link gap-1 icon-link-hover stretched-link">
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
