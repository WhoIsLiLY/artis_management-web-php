<?php
session_start();
require_once __DIR__ . "\\..\\bootstrap.php";
$type = $middleware->getRoleFromToken($_COOKIE["token"]);
if(isset($_COOKIE['token'])){
    setcookie("token", "", time()-1, '/');
    unset($_COOKIE['cookie_name']);
}
header("Location: \\..\\..\\public\\index.php?type=$type");