<?php

class Router
{
    private $routes = [];

    // Add a route to the router
    public function addRoute($url, $handler)
    {
        $this->routes[$url] = $handler;
    }

    // Handle the incoming request
    public function handleRequest()
    {
        $url = $_SERVER['REQUEST_URI'];

        // Remove query string from URL (if any)
        $url = strtok($url, '?');

        // Check if the requested route exists
        if (array_key_exists($url, $this->routes)) {
            // Call the associated handler function or method
            $handler = $this->routes[$url];

            if (is_callable($handler)) {
                // If the handler is a function, call it
                $handler();
            } elseif (strpos($handler, '@') !== false) {
                // If the handler is in the format "Controller@method"
                list($controller, $method) = explode('@', $handler);
                $this->callControllerMethod($controller, $method);
            } else {
                // Assume the handler is a class with an __invoke method
                $this->callControllerMethod($handler, '__invoke');
            }
        } else {
            // Handle 404 Not Found
            header('HTTP/1.0 404 Not Found');
            echo '404 Not Found';
        }
    }

    // Call a controller method
    private function callControllerMethod($controller, $method)
    {
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    }
}

// Example usage:

// Create a new router instance
$router = new Router();

// Define routes
$router->addRoute('/', function () {
    include "./frontend/index.html";
});

$router->addRoute('/about', 'AboutController');
$router->addRoute('/users', function() {
    include "./backend/data.php";
});

$router->addRoute('/admin', function() {
    include "./backend/admin.php";
});

$router->addRoute('/cart', function() {
    include "./frontend/cart.html";
});

$router->addRoute('/addCart', function() {
    include "./backend/addCart.php";
});

$router->addRoute('/delete', function() {
    include "./backend/delete.php";
});

$router->addRoute('/carts', function() {
    include "./backend/cartsdata.php";
});

// Example controller class
class AboutController
{
    public function __invoke()
    {
        echo 'About Page';
    }
}

// Handle the incoming request
$router->handleRequest();
