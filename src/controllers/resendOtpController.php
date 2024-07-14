<?php
session_start();
require_once __DIR__ . "\\..\\middleware\\middleware.php";
if($_SERVER["REQUEST_METHOD"] == "GET"){
    unset($_SESSION["otp"]);
    unset($_SESSION["otp_created_at"]);
    $_SESSION["otp"] = $middleware->two_authentication($_SESSION['email']);
    $_SESSION['otp_created_at'] = time();
    header('Content-Type: application/json');
    echo json_encode(["message" => "success"]);
}