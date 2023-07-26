<?php
#require_once 'vendor/autoload.php';
require_once 'db/conn.php';

$country_id = mysqli_real_escape_string($conn, $_POST['country_id']); 
$query= "select * from states where country_id='".$country_id."' ";
$result= mysqli_query($conn,$query);

while ($row= mysqli_fetch_array($result)) {
    ?>
    <option value='<?php echo $row['id'] ?>'><?php echo $row['name']; ?></option>;
<?php } ?>
