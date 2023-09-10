<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/login' => 'controllers/admin_login.php',
    '/search' => 'controllers/search.php',
    '/register' => 'controllers/acc_register.php',
    '/home' => 'controllers/home.php',
    '/news' => 'controllers/news.php',
    '/category' => 'controllers/category.php',
    '/addnews' => 'controllers/AddNews.php',
    '/edit' => 'controllers/news_edit.php',
    '/delete' => 'controllers/news_delete.php',
    '/addcategory' => 'controllers/addcategory.php',
    '/categoryEdit' => 'controllers/edit.php',
    '/categoryDelete' => 'controllers/delete.php',
    '/ajax' => 'controllers/ajax.php',
    '/singlepage' => 'controllers/single-page.php',
    '/categorypage' => 'controllers/category_page.php',



];

if(array_key_exists($uri, $routes)) {
    require $routes[$uri];
}
