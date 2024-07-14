<?php

$url = $_SERVER['REQUEST_URI']; // Mendapatkan URI yang diminta oleh pengguna
//echo $url; // /public/index.php || /public
if(isset($_GET["type"])){
    if($_GET["type"] == "artis"){
        require __DIR__ . "\\..\\src\\views\\artis\\login.php";
    }else if($_GET["type"] == "manager"){
        require __DIR__ . "\\..\\src\\views\\manager\\login.php";
    }else if($_GET["type"] == "admin"){
        require __DIR__ . "\\..\\src\\views\\admin\\login.php";
    }
}
//include('./login.php');
//header("location: ./login.php");

//include('../src/models/user.php');
//header("location: ../src/models/user.php");

// Mengimpor middleware
//require __DIR__.'/../src/Middleware/middleware1.php';

// Contoh pemanggilan middleware
//$middleware = new Middleware();
//$middleware->handle();