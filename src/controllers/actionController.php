<?php
session_start();
require_once __DIR__ . "\\..\\bootstrap.php";
require_once __DIR__ . "\\..\\utils\\sodium.php";
// When verifying the OTP:
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $input_string = json_decode(file_get_contents('php://input'), true);
    if (isset($input_string['method']) && isset($input_string['id']) || isset($input_string['idJadwal'])) {
        $method = $input_string['method'];
        $role = $input_string['role'];
        if($method == "delete" && $role == "manager"){
            $userController->deleteArtist($input_string['id']);
        }else if($method == "delete" && $role == "admin"){
            $userController->deleteManager($input_string['id']);
        }else if($method == "delete" && $role == "schedule"){
            $userController->deleteSchedule($input_string['id']);
        }else if($method == "add" && $role == "schedule"){
            $userController->addScheduleDetail($input_string['idJadwal'], $input_string['idArtist']);
        }
        $response = array(
            "method"=>$method,
            "status"=>true // success=true
        );
        header('Content-Type: application/json');
        echo json_encode($response);
        die;
    }else{
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode(["message" => "Invalid OTP"]);
        die;
    }
}