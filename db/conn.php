<?php
namespace app;
global $conn;
    
require_once 'Class/Connection.php';

use app\DatabaseConnection;

$database = new DatabaseConnection("localhost", "root", "", "news");
$conn = $database->getConnection();

?>
