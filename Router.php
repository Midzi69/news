<?php

class Router {
    private $routes;

    public function __construct() {
        $this->routes = array();
    }

    public function addRoute($route, $handler) {
        $this->routes[$route] = $handler;
    }

    public function handleRequest($request) {
        $path = parse_url($request, PHP_URL_PATH);
        $path = rtrim($path, '/');

        foreach ($this->routes as $route => $handler) {
            if ($path === $route) {
                if (is_callable($handler)) {
                    call_user_func($handler);
                } else {
                    echo "Invalid handler for route: $route";
                }
                return;
            }
        }

        echo "No route found for: $path";
    }
}

// Create an instance of the Router
$router = new Router();

// Define your routes and handlers
$router->addRoute('/', function() {
    include('include/index_header.php');
    include('index.php');
    include('include/index_footer.php');
});

$router->addRoute('/search', function() {
    include('include/index_header.php');
    include('search.php');
    include('include/index_footer.php');
});

$router->addRoute('/category', function() {
    include('include/index_header.php');
    include('category_page.php');
    include('include/index_footer.php');
});

$router->addRoute('/admin', function() {
    include('admin_login.php');
});

// Get the current request URI
$requestUri = str_replace([$baseUrl, 'index.php'], '', $requestUri);

// Handle the request
$router->handleRequest($requestUri);

?>
