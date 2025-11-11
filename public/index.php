<?php

// Front controller

// 1. Load configuration and helper functions
require_once '../config/config.php';
require_once '../app/helpers/utils.php';

// 2. Routing
$controller = 'HomeController';
$method = 'index';
$params = [];

// Super simple router
if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);

    // Set controller
    if (isset($url[0])) {
        $controller = ucwords($url[0]) . 'Controller';
        unset($url[0]);
    }

    // Set method
    if (isset($url[1])) {
        $method = $url[1];
        unset($url[1]);
    }

    // Set params
    $params = $url ? array_values($url) : [];
}

// 3. Autoload controllers
spl_autoload_register(function($className) {
    require_once '../app/controllers/' . $className . '.php';
});

// 4. Instantiate controller and call method
if (file_exists('../app/controllers/' . $controller . '.php')) {
    $controllerInstance = new $controller;
    if (method_exists($controller, $method)) {
        call_user_func_array([$controllerInstance, $method], $params);
    } else {
        // Method does not exist
        echo "Method $method not found in controller $controller";
    }
} else {
    // Controller does not exist
    echo "Controller $controller not found";
}
