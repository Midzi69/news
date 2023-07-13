<?php
include('db/connection.php');

$country_id = $_POST['country_id'];
$query= "select * from state where country_id='".$country_id."' ";
$result= mysqli_query($conn,$query);

while ($row= mysqli_fetch_array($result)) {
    ?>
    <option value='<?php echo $row['id'] ?>'><?php echo $row['state']; ?></option>;
<?php } ?>