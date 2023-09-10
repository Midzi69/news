<?php

class Category
{
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function add($conn) {
            if(isset($_POST['submit'])){
                $category_name=mysqli_real_escape_string($conn,$_POST['category']);
                $des=mysqli_real_escape_string($conn,$_POST['des']);

                $check = mysqli_query($conn, "select * from category where category_name='$category_name'");

                if(mysqli_num_rows($check)>0) {
                    echo "<script> alert(`Category name already taken!`); </script>";

                    exit();
                }

                $query=mysqli_query($conn, "insert into category(category_name,des)values('$category_name','$des')");

                if($query){
                    echo "<script> alert(`Category Added`)  </script>";


                } else {
                    echo "<script> alert(`Please try again`)  </script>";
                }

            }
    }

    public function edit($category, $des) {
        ?>
        <form action="/categoryEdit" method="post" name="categoryform" onsubmit=" return validate() ">
            <h1>Update Category</h1>

            <div class="mb-3">
                <label for="email" class="form-label">Category: </label>
                <input type="text" name="category" class="form-control" id="email" value="<?php echo $category; ?>">
            </div>
            <div class="mb-3">
                <label for="comment">Comment: </label>
                <textarea class="form-control"  name="des" rows="5" id="comment"><?php echo $des;?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $_GET['edit']?>">
            <input type="submit" name="submit" class="btn btn-primary" value="Update Category">
        </form>
    <?php
    }

    public function delete($conn) {
        $id = $_GET['del'];
        $query = mysqli_query($conn, "delete from category where id='$id'");
        if ($query) {
            echo "<script> alert(`Category has been deleted`); </script>";
            header('location:/category');
        } else {
            echo "<script> alert(`Please try again`); </script>";
        }
    }

}

?>
