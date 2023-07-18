<?php 
error_reporting(0);
require 'Class/Vest.php';
$newsPage = new NewsPage($conn, $_GET['page']);
$newsPage->render();

?>
