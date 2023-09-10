<?php

    require_once 'vendor/autoload.php';
    require_once 'Class/Vest.php';
    $newsForm = new NewsPage($conn, $_GET['page']);
    $newsForm->delete($conn);


?>
