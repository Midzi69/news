<?php 

    session_start();
    if($_SESSION['email']==true){

    }else
    header('location:admin_login.php');
    $page='category';
        include('include/header.php');

?>


<div style=" width: 50%;  margin-left: 10%; margin-top: 10%;">

<form action="addcategory.php" method="post" name="categoryform" onsubmit=" return validate() ">
<h1>Add Category</h1>  

<div class="mb-3">
    <label for="email" class="form-label">Category: </label>
    <input type="text" name="category" class="form-control" id="email" placeholder="Enter Category name: ">
  </div>
  <div class="mb-3">
    <label for="comment">Description: </label>
    <textarea class="form-control" name="des" rows="5" id="comment" placeholder="Enter Description: "></textarea>
  </div>
  <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
</form>

</div>

<script>

    function validate() {
        let x = document.forms['categoryform']['category'].value;
        if(x == ""){
            alert(`category Must be filled out`);
            return false;
        }
    }

</script>

<?php 

    include('include/footer.php');

?>

<?php  



if(isset($_POST['submit'])){
    $category_name=$_POST['category'];
    $des=$_POST['des'];

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



?>
