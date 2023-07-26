<?php

class Comment
{
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function add($conn) {
        ?>
        <form action="single-page.php" method="post">

            <input type="text" name="name" class="form-control my-4 py-2" id="name" placeholder="Name: ">
            <textarea class="form-control" name="comment"  rows="5" id="comment" placeholder="Enter Comment: "></textarea>

            <div class="mt-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Post Comment">
            </div>

        </form>

        <hr>

        <h1>Comments</h1>

        <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Comment</th>
            </tr>
            <?php



            $query = mysqli_query($conn, "select * from comment");
            while($row = mysqli_fetch_array($query)){

                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['comment'];?></td>
                </tr>





            <?php } ?>
        </table>
<?php
    }
}

?>