<?php

session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else
    header('location:admin_login.php');
$page='product';
include('include/header.php');

?>

<?php

    include ('db/connection.php');
    $id = $_GET['edit'];
    $query = mysqli_query($conn, "select * from news where id = '$id'");
    while($row=mysqli_fetch_array($query)) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $date = $row['date'];
        $thumbnail = $row['thumbnail'];
        $category = $row['category'];
    }

?>


<div style=" width: 50%;  margin-left: 10%; margin-top: 10%;">

    <div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active"><a href="news.php">News</a></li>
            <li class="breadcrumb-item active">Add News</li>
        </ul>
    </div>

    <form action="news_edit.php" method="post" name="categoryform" enctype="multipart/form-data" onsubmit=" return validate() ">
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

                include ('db/connection.php');

                $query=mysqli_query($conn, "select * from category");
                while($row = mysqli_fetch_array($query)) {
                    ?>
                    <option value="<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?></option>
                <?php } ?>

            </select>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Update">
    </form>

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

    include ('db/connection.php');

    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $thumbnail = $_FILES['thumbnail']['name'];
        $tmp_thumbnail = $_FILES['thumbnail']['tmp_name'];
        $category = $_POST['category'];
        move_uploaded_file($tmp_thumbnail, "img/$thumbnail");

        $sql = mysqli_query($conn, "update news set title='$title',description='$description',date='$date', thumbnail='$thumbnail', category='$category' where id='$id'");

        if($sql) {
            echo "<script>alert(`News updated successfully!`);</script>";
            echo "<script >window.location = 'news.php';</script>";
        } else {
            echo "<script>alert(`Try again!`);</script>";
        }

    }

?>
