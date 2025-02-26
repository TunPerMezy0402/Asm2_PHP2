<?php
use Bramus\Router\Router;
use App\Controllers\UserController;
use App\Controllers\ProductController;
use App\Controllers\CategoryController;
use App\Controllers\LoginController;


const ROOT_PATH = __DIR__;
$router = new Router();

$router->get('/', LoginController::class . '@index');
$router->get('/login', LoginController::class . '@login');
$router->post('/login', LoginController::class . '@loginPost');
$router->get('/logout', LoginController::class . '@logout');
$router->get('/dashboard', UserController::class . '@dashboard');

// Define route
$router->mount('/user', function() use ($router) {
    $router->get('/', UserController::class . '@index');
    $router->get('/show/{id}', UserController::class . '@show');
    $router->get('/add', UserController::class . '@add');
    $router->post('/add', UserController::class . '@addPost');
    $router->get('/update/{id}', UserController::class . '@update');
    $router->post('/update/{id}', UserController::class . '@updatePost');
    $router->get('/delete/{id}', UserController::class . '@delete');

});

$router->mount('/product', function() use ($router) {
    $router->get('/', ProductController::class . '@index');
    $router->get('/show/{id}', ProductController::class . '@show');
    $router->get('/add', ProductController::class . '@add');
    $router->post('/add', ProductController::class . '@addPost');
    $router->get('/update/{id}', ProductController::class . '@update');
    $router->post('/update/{id}', ProductController::class . '@updatePost');
    $router->get('/delete/{id}', ProductController::class . '@delete');

});


$router->mount('/category', function() use ($router) {
    $router->get('/', CategoryController::class . '@index');
    $router->get('/show/{id}', CategoryController::class . '@show');
    $router->get('/add', CategoryController::class . '@add');
    $router->post('/add', CategoryController::class . '@addPost');
    $router->get('/update/{id}', CategoryController::class . '@update');
    $router->post('/update/{id}', CategoryController::class . '@updatePost');
    $router->get('/delete/{id}', CategoryController::class . '@delete');
});

$router->run();
