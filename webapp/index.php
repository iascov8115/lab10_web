<?php
require_once 'autoload.php';
session_start();
use Services\Router;
use Controllers\HomeController;
use Controllers\AdminController;

$router = new Router();
$router->get('/', [HomeController::class, "index"]);
$router->get('/record', [HomeController::class, "createNewEventRecord"]);
$router->post('/record', [HomeController::class, "createNewEventRecord"]);
$router->get('/admin', [AdminController::class, "index"]);
$router->post('/admin', [AdminController::class, "index"]);
$router->get('/logout', [AdminController::class, "logout"]);

if (isset($_SESSION['manager'])) {
    $router->get('/admin/update', [AdminController::class, "update"]);
    $router->get('/admin/delete', [AdminController::class, "delete"]);
    $router->post('/admin/update', [AdminController::class, "update"]);
    $router->get('/admin/insert', [AdminController::class, "insert"]);
    $router->post('/admin/insert', [AdminController::class, "insert"]);
}

$router->dispatch($_SERVER['REQUEST_URI']);