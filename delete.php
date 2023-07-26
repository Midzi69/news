<?php
    require_once 'vendor/autoload.php';
    require_once 'Class/Category.php';
    $newsForm = new Category($conn);
    $newsForm->delete($conn);



?>
