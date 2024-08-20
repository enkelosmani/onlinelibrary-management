<?php

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'HomeController', 'action' => 'index']);

$router->add('categories', ['controller' => 'CategoryController', 'action' => 'index']);
$router->add('categories-create', ['controller' => 'CategoryController', 'action' => 'create']);
$router->add('categories-store', ['controller' => 'CategoryController', 'action' => 'store']);
$router->add('categories-edit', ['controller' => 'CategoryController', 'action' => 'edit']);
$router->add('categories-update', ['controller' => 'CategoryController', 'action' => 'update']);
$router->add('categories-delete', ['controller' => 'CategoryController', 'action' => 'destroy']);


$router->add('students', ['controller' => 'StudentController', 'action' => 'index']);
$router->add('students-create', ['controller' => 'StudentController', 'action' => 'create']);
$router->add('students-store', ['controller' => 'StudentController', 'action' => 'store']);
$router->add('students-edit', ['controller' => 'StudentController', 'action' => 'edit']);
$router->add('students-update', ['controller' => 'StudentController', 'action' => 'update']);
$router->add('students-delete', ['controller' => 'StudentController', 'action' => 'destroy']);


$router->dispatch($_SERVER['QUERY_STRING']);


?>