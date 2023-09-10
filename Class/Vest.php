<?php

class NewsPage {
    public $conn;
    public $page;

    public function __construct($conn, $page) {
        $this->conn = $conn;
        $this->page = $page;

    }

    public function render() {
        $query = mysqli_query($this->conn, "SELECT * FROM news");
        while ($row = mysqli_fetch_array($query)) {
            echo '<article class="blog-post">';
            echo '<h2 class="display-5 link-body-emphasis mb-1"><a href="/singlepage?single=' . $row['id'] . '">' . $row['title'] . '</h2>';
            echo '<p class="blog-post-meta">' . $row['date'] . '</a></p>';
            echo '<p><img class="img img-thumbnail" src="img/' . $row['thumbnail'] . '"></p>';
            echo '<hr>';
            echo '<blockquote class="blockquote">';
            echo substr($row['description'], 0, 300);
            echo '<a href="/singlepage?single=' . $row['id'] . '" class="btn btn-danger btn-sm">Read More...</a>';
            echo '</blockquote>';
            echo '<hr>';
            echo '</article>';
        }
    }

    public function create() {
            ?>
        <form action="/addnews" method="post" name="categoryform" enctype="multipart/form-data" onsubmit="return validate()">
            <h1>Add News</h1>

            <div class="mb-3">
                <label for="title" class="form-label">Title: </label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title: ">
            </div>
            <div class="mb-3">
                <label for="description">Description: </label>
                <textarea class="form-control" name="description" rows="5" id="description" placeholder="Enter Description: "></textarea>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date: </label>
                <input type="date" name="date" class="form-control" id="date">
            </div>

            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail: </label>
                <input type="file" name="thumbnail" class="form-control img-thumbnail" id="thumbnail">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Choose Category: </label>

                <select class="form-control" name="category" id="category">
                    <?php
                    $query = mysqli_query($this->conn, "SELECT * FROM category");
                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Add News">
        </form>
            <?php
    }

    public function edit($title, $description, $date, $thumbnail, $category, $id, $conn) {

                ?>
        <form action="/edit" method="post" name="categoryform" enctype="multipart/form-data" onsubmit=" return validate() ">
            <h1>Update News</h1>

            <div class="mb-3">
                <label for="email" class="form-label">Title: </label>
                <input type="text" name="title" class="form-control" id="email" value="<?php echo $title;?>" placeholder="Enter Title: ">
            </div>
            <div class="mb-3">
                <label for="comment">Description: </label>
                <textarea class="form-control" name="description"  rows="5" id="comment" placeholder="Enter Description: "><?php echo $description;?></textarea>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Date: </label>
                <input type="date" name="date" value="<?php echo $date;?>" class="form-control" id="email" >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Thumbnail: </label>
                <input type="file" value="<?php echo $thumbnail;?>" name="thumbnail" class="form-control img-thumbnail" id="email" >
                <img class="img img-thumbnail" src="img/<?php echo $thumbnail;?>" alt="" width="100" height="100">
            </div>

            <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">

            <div class="mb-3">
                <label for="email" class="form-label">Choose Category: </label>



                <select class="form-control" name="category">
                    <?php



                    $query=mysqli_query($conn, "select * from category");
                    while($row = mysqli_fetch_array($query)) {


                        ?>
                        <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
                    <?php } ?>

                </select>
            </div>

            <input type="submit" name="submit" class="btn btn-primary" value="Update">
        </form>
        <?php

    }

    public function delete($conn) {
        $id = $_GET['del'];
        $query = mysqli_query($conn, "delete from news where id='$id'");
        if($query) {
            echo "<script>alert(`News deleted successfully!`);</script>";
            echo "<script >window.location = '/news';</script>";
        } else {
            echo "<script>alert(`Try again!`);</script>";
        }
    }

}




?>
