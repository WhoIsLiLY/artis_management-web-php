<?php
session_start();
require_once __DIR__ . '\\..\\bootstrap.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $input_string = json_decode(file_get_contents('php://input'), true);
    //gettype($input_string);
    //print_r($input_string);
    if ($input_string !== null){
        //parse_str($input_string, $input_data);
        $email = $input_string[0]['value'];
        $password = $input_string[1]['value'];
        $type = $input_string[2]['type'];
        //read database
        $user = $authController->loginUser($email, $password, $type);
        //$pdo = null;
        if($user !== false){
            //print_r($input_data);
            //echo $controller->getAuth($user);
            if($userController->getAuth($user, $_SESSION["role"]) == "1"){
                // 2 step auth code    
                try {
                    // Call the two_authentication method
                    $_SESSION["otp"] = $middleware->two_authentication($email);
                    // echo($_SESSION["otp"]);
                    $_SESSION["email"] = $email;
                } catch (Exception $e) {
                    // Log or handle the exception
                    error_log('Error in two_authentication method: ' . $e->getMessage());
                }
                // When generating the OTP:
                $_SESSION['otp_created_at'] = time();
                header('Content-Type: application/json');
                http_response_code(200);
                $response = array(
                    "two_step" => "1"
                );
                echo json_encode($response); //{"email" => "stenli@..."}
                die;
            }else{
                    $id = $user;
                    $response = array(
                        "two_step" => "0",
                        "token" => $middleware->generateToken($id, $_SESSION["role"], time())
                    );
                    unset($_SESSION['role']);
                    echo json_encode($response);
                    die;
            }
        }else{
            header('Content-Type: application/json');
            http_response_code(400);
            $response = array(
                "message" => "Email or Password is Invalid!"
            );
            echo json_encode($response);
            die;
        }
        //create_flash('email,username, or password is invalid','warning');
    }
}