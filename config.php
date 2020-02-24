<?php

use Controller\UserController;
use Controller\DefaultController;
use Controller\ChatBoardController;

// DATABASE
define('DB_DSN', 'mysql:host=localhost;dbname=messenger');
define('DB_USER', 'root');
define('DB_PASSWD', '');

define('BASE_URI', '/messenger');

// ROUTES
define('ROUTES', [
    '/login/process' => [
        'controller' => UserController::class,
        'action' => 'processLogin',
        'methods' => ['POST']
    ],
    '/login' => [
        'controller' => UserController::class,
        'action' => 'showLogin',
        'methods' => ['GET']
    ],
    '/logout' => [
        'controller' => UserController::class,
        'action' => 'logout',
        'methods' => ['GET']
    ],
    '/register/process' => [
        'controller' => UserController::class,
        'action' => 'processRegister',
        'methods' => ['POST']
    ],
    '/register' => [
        'controller' => UserController::class,
        'action' => 'showRegister',
        'methods' => ['GET']
    ],
    '/chat_board/post_message' => [
        'controller' => ChatBoardController::class,
        'action' => 'postMessage',
        'methods' => ['POST']
    ],
    '/chat_board' => [
        'controller' => ChatBoardController::class,
        'action' => 'showBoard',
        'methods' => ['GET']
    ],
    '/notfound' => [
        'controller' => DefaultController::class,
        'action' => 'notFoundPage',
        'methods' => ['GET']
    ],
    '/' => [
        'controller' => UserController::class,
        'action' => 'showLogin',
        'methods' => ['GET']
    ],
]);
