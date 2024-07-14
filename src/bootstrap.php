<?php
require_once __DIR__ . "\\config\\config_database.php";
$pdo = require_once __DIR__ . '\\config\\connection.php';
require __DIR__ . '\\controllers\\userController.php';
require __DIR__ . '\\controllers\\authController.php';
require_once __DIR__ . '\\middleware\\middleware.php';

// MIDDLEWARE & CONTROLLER
$middleware = new Middleware($pdo);
$userController = new UserController($pdo);
$authController = new AuthController($pdo);