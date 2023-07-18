<?php 


class RegistrationForm {
    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function generateForm() {
        $output = '<div class="container mt-5 pt-5">';
        $output .= '<div class="row">';
        $output .= '<div class="col-12 col-sm8 col-md6 m-auto">';
        $output .= '<div class="card border-0 shadow">';
        $output .= '<div class="card-body">';
        $output .= '<h1>REGISTRATION</h1>';
        $output .= '<form action="acc_register.php" method="post">';
        $output .= '<input type="text" name="name" class="form-control my-4 py-2" id="name" placeholder="Name: ">';
        $output .= '<input type="email" name="email" class="form-control my-4 py-2" id="email" placeholder="Email: ">';
        $output .= '<input type="password" name="password" class="form-control my-4 py-2" id="pwd" placeholder="Password: ">';
        $output .= '<input type="date" name="date" class="form-control" id="email" placeholder="Birth Date">';
        $output .= '<select class="form-select" aria-label="Default select example" name="country" id="country" style="margin-top: 24px">';
        $output .= '<option value="">Select Country:</option>';

        $query = "SELECT * FROM countries";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $output .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
        }

        $output .= '</select>';
        $output .= '<select class="form-select" aria-label="Default select example" name="state" id="state" style="margin-top: 24px">';
        $output .= '<option value="">Select State:</option>';
        $output .= '</select>';
        $output .= '<select class="form-select" aria-label="Default select example" name="gender" id="gender" style="margin-top: 24px">';
        $output .= '<option value="">Select Gender:</option>';

        $query = mysqli_query($this->conn, "SELECT * FROM gender");
        while ($row = mysqli_fetch_array($query)) {
            $output .= '<option value="' . $row['gender'] . '">' . $row['gender'] . '</option>';
        }

        $output .= '</select>';
        $output .= '<div class="text-center mt-3">';
        $output .= '<input type="submit" name="submit" class="btn btn-primary" value="Register">';
        $output .= '</div>';
        $output .= '</form>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';

        return $output;
    }
}
?>



