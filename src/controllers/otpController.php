<?php
session_start();
require_once __DIR__ . "\\..\\bootstrap.php";
require_once __DIR__ . "\\..\\utils\\sodium.php";

// When verifying the OTP:
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_SESSION['otp'])) {
        $time_elapsed = time() - $_SESSION['otp_created_at'];
    
        if ($time_elapsed > 5 * 60) { // 5 menit
            header('Content-Type: application/json');
            http_response_code(400);
            echo json_encode(["message" => "OTP has expired"]);
            die;
        } else {
            // The OTP is still valid, continue with verification
            $input_string = json_decode(file_get_contents('php://input'), true);
            //print_r($input_string);
            if ($input_string !== null){
                //echo $input_string["otp"];     
                //echo $controller-> getOtpKey();
                //echo "session: " . $_SESSION["otp"];
                //echo safeDecrypt($_SESSION["otp"], $controller->getOtpKey());

                if($input_string["otp"] == safeDecrypt($_SESSION["otp"], $authController->getOtpKey())){
                    $id = $userController->getIdByEmail($_SESSION["email"], $_SESSION["role"]);
                    $response = array(
                        "success" => true,
                        "token" => $middleware->generateToken($id, $_SESSION["role"], time())
                    );
                    unset($_SESSION['otp']);
                    unset($_SESSION['otp_created_at']);
                    unset($_SESSION['email']);
                    unset($_SESSION['role']);

                    //print_r($_SESSION);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                    die;
                }
                else{
                    header('Content-Type: application/json');
                    http_response_code(400);
                    echo json_encode(["message" => "Invalid OTP"]);
                    die;
                }
            }
        }
    }
}
