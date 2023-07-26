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


const validate = new Validate();
validate.validate();

</script>

<?php 

    include('include/footer.php');

?>

<?php



    require_once 'Class/Category.php';
    $newsForm = new Category($conn);
    $newsForm->add($conn);



?>
