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
            echo '<h2 class="display-5 link-body-emphasis mb-1"><a href="single-page.php?single=' . $row['id'] . '">' . $row['title'] . '</h2>';
            echo '<p class="blog-post-meta">' . $row['date'] . '</a></p>';
            echo '<p><img class="img img-thumbnail" src="img/' . $row['thumbnail'] . '"></p>';
            echo '<hr>';
            echo '<blockquote class="blockquote">';
            echo substr($row['description'], 0, 300);
            echo '<a href="single-page.php?single=' . $row['id'] . '" class="btn btn-danger btn-sm">Read More...</a>';
            echo '</blockquote>';
            echo '<hr>';
            echo '</article>';
        }
    }
}

// Usage:


?>
