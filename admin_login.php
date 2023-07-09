<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->


</head>
<body>

    <div class="container mt-5 pt-5">
        <div class="row">
        <div class="col-12 col-sm8 col-md6 m-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle mx-auto my-3" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        <form action="admin_login.php" method="post">
                            <input type="email" name="email" class="form-control my-4 py-2" id="email" placeholder="Email: ">
                            <input type="password" name="password" class="form-control my-4 py-2" id="pwd" placeholder="Password: ">
                            <div class="text-center mt-3">
                                <input type="submit" name="submit" class="btn btn-primary" value="Login">
                                <br>
                                <a href="acc_register.php" class="">Create an Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php
include('db/connection.php');
    if(isset($_POST['submit'])) {
        $email=$_POST['email'];
       $password=$_POST['password'];

       $query=mysqli_query($conn, "select * from admin_login where email='$email' AND password='$password' ");

       if($query) {
        if(mysqli_num_rows($query) > 0) {
           $_SESSION['email']=$email;


            header('location:home.php');
        } else {
            echo "<script> alert(`Invalid email or password!`);</script>";
        }
       }
    }


?>