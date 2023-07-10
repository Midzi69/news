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
                        <h1>REGISTRATION</h1>
                        <form action="acc_register.php" method="post">
                            <input type="text" name="name" class="form-control my-4 py-2" id="name" placeholder="Name: ">
                            <input type="email" name="email" class="form-control my-4 py-2" id="email" placeholder="Email: ">
                            <input type="password" name="password" class="form-control my-4 py-2" id="pwd" placeholder="Password: ">
                            <input type="date" name="date" class="form-control" id="email" placeholder="Birth Date">
                            <select class="form-select" aria-label="Default select example" name="country" id="country" style="margin-top: 24px">
                                <option value="">Select Country:</option>
                                <?php

                                    include('db/connection.php');
                                    $query = mysqli_query($conn, "select * from country");
                                    while($row=mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?php echo $row['country'];?>"><?php echo $row['country'];?></option>
                                        <?php
                                    }

                                ?>
                            </select>
                            <select class="form-select" aria-label="Default select example" name="gender" id="gender" style="margin-top: 24px">
                                <option value="">Select Gender:</option>
                                <?php

                                include('db/connection.php');
                                $query = mysqli_query($conn, "select * from gender");
                                while($row=mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
                                    <?php
                                }

                                ?>
                            </select>
                            <div class="text-center mt-3">
                                <input type="submit" name="submit" class="btn btn-primary" value="Register">
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date = $_POST['date'];
    $country = $_POST['country'];
    $gender = $_POST['gender'];
    $query1 = mysqli_query($conn, "insert into admin_login(name,email, password,date,country,gender)values('$name','$email', '$password','$date','$country','$gender')");

    if($query1) {
        echo "<script>alert(`Account Created!`);</script>";
        echo "<script >window.location = 'news.php';</script>";
    } else {
        echo "<script>alert(`Try again!`);</script>";
    }
}


?>
