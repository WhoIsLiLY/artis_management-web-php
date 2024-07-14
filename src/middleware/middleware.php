<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '\\..\\PHPMailer\\src\\Exception.php';
require __DIR__ . '\\..\\PHPMailer\\src\\PHPMailer.php';
require __DIR__ .'\\..\\PHPMailer\\src\\SMTP.php';
require __DIR__ . '\\..\\utils\\sodium.php';
require_once __DIR__ . '\\..\\bootstrap.php';
class Middleware {
    private $controller;
    public function __construct($pdo) {
        $this->controller = new AuthController($pdo);
    }
    public function handle() {
        // Logika middleware
        echo "Middleware sedang dijalankan...\n";
    }
    public function check_login(){
        if(isset($_SESSION['user_id'])){
            //echo "success";
            $id = $_SESSION['user_id'];
        }
        //if failed, redirect to login
        else {
            header("Location: error.php");
            die;
        }
    }
    
    public function two_authentication($email){
        //generate code
        $verification_code = rand(100000, 999999);

        //kirim code ke email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; //default gmail
            $mail->SMTPAuth = true;
            $mail->Username = "willyhimaw@gmail.com"; // SMTP username (email)
            $mail->Password = "srafxlpzxkcptokf"; // SMTP password (password)
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            
            //pengirim
            $mail->setFrom('willyhimaw@gmail.com', 'Willy Himawan');

            //penerima
            $mail->addAddress($email); 

            //isi email
            $mail->isHTML(true); // set format email ke html
            $mail->Subject = 'Welcome to CelebSync!';
            $mail->Body = '<h1>Your verification code is:</h1> ' . "<h1>$verification_code</h1>";

            $mail->send();
            //echo 'Kode verifikasi berhasil dikirim! Silakan cek email Anda.';
        } catch (Exception $e) {
            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return safeEncrypt($verification_code, $this->controller->getOtpKey());
    }
    public function generateToken($id, $role, $expiry) {
        $data = "$id:$role:$expiry";
        $token = safeEncrypt($data, $this->controller->getTokenKey());
        unset($data); // Hilangkan jejak
        
        return $token;
    }
    public function checkArtistTokenValidity($token){
        $data = safeDecrypt($token, $this->controller->getTokenKey());
        $data = explode(":", $data);
        $time_elapsed = time() - $data[2];
        if ($time_elapsed <= 24 * 3600){
            if($data[1] == 'artis'){
                unset($data); // Hilangkan jejak
                return true;
            }else{
                unset($data); // Hilangkan jejak
                header("Location: /src/views/401.php");
            }
        }else{
            // mungkin bisa dilakukan refresh token
            unset($data); // Hilangkan jejak
            return "Token has expired, please login again";
        }
    }
    public function checkManagerTokenValidity($token){
        $data = safeDecrypt($token, $this->controller->getTokenKey());
        $data = explode(":", $data);
        $time_elapsed = time() - $data[2];
        if ($time_elapsed <= 24 * 3600){
            if($data[1] == 'manager'){
                unset($data); // Hilangkan jejak
                return true;
            }else{
                unset($data); // Hilangkan jejak
                header("Location: /src/views/401.php");
            }
        }else{
            // mungkin bisa dilakukan refresh token
            unset($data); // Hilangkan jejak
            return "Token has expired, please login again";
        }
    }
    public function checkAdminTokenValidity($token){
        $data = safeDecrypt($token, $this->controller->getTokenKey());
        $data = explode(":", $data);
        $time_elapsed = time() - $data[2];
        if ($time_elapsed <= 24 * 3600){
            if($data[1] == 'admin'){
                unset($data); // Hilangkan jejak
                return true;
            }else{
                unset($data); // Hilangkan jejak
                header("Location: /src/views/401.php");
            }
        }else{
            // mungkin bisa dilakukan refresh token
            unset($data); // Hilangkan jejak
            return "Token has expired, please login again";
        }
    }
    public function getIdFromToken($token){
        $data = safeDecrypt($token, $this->controller->getTokenKey());
        $data = explode(":", $data);
        $time_elapsed = time() - $data[2];
        if ($time_elapsed <= 24 * 3600)
        {
            return $data[0];
        }else {
            unset($data); // Hilangkan jejak
            return "Token has expired, please login again";
        }
    }
    public function getRoleFromToken($token){
        $data = safeDecrypt($token, $this->controller->getTokenKey());
        $data = explode(":", $data);
        $time_elapsed = time() - $data[2];
        if ($time_elapsed <= 24 * 3600)
        {
            return $data[1];
        }else {
            unset($data); // Hilangkan jejak
            return "Token has expired, please login again";
        }
    }
}