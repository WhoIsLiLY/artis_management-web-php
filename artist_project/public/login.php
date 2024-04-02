<?php
    session_start();
    require_once __DIR__ . "\bootstrap.php";
    function issetFlashMessage(){
        return isset($_SESSION['flash']);
    }
    function create_flash($message, $type){
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }
    function session_flash(){
        $flash = $_SESSION['flash'];

        // session unset dan merapihkan isi session
        unset($_SESSION['flash']);
        $_SESSION = array_values($_SESSION);

        return $flash;
    }
    function afterLogin($username, $password){
        $_SESSION['logged_in'] = [
            'username' => $username,
            'password' => $password
        ];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST["email"]) && isset($_POST["password"])){
            //read database
            $email = $_POST["email"];
            $password = $_POST["password"];
            $user_id = loginUser($pdo, $email, $password);
            //$pdo = null;
            if($user_id !== false){
                echo "$user_id";
                $_SESSION['user_id'] = $user_id;
                header('Location: home.php');
                die;
            }
            create_flash('email,username, or password is invalid','warning');
        }else{
            create_flash("Please input a valid information","warning");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <?php 
        if(issetFlashMessage()){
            ?><style>
                .error{
                display: flex; 
                justify-content: center; 
                align-items: center; 
                background-color: rgb(255, 72, 72);
                height: 32px;
                width: 100%;
                color: black;
                border-radius: 5px;
                border: solid thin red;}
            </style><?php
        }?>
</head>
<body>
    <div class="container">
        <div class="content">
            <h2 class="welcome_text" style="position: relative; color: rgb(255, 249, 128);"> Good to see you again</h2>
            <div id="box">
                <form method="post">
                    <div class="text">Email-Address</div>
                    <input id="textbox" type="email" name="email" placeholder="Email address"><br><br>
                    <div class="text">Password</div>
                    <input id="textbox" type="password" name="password" placeholder="Password"><br><br>
                    <?php if(issetFlashMessage()){ 
                    $flashMessage = session_flash();    
                    ?>
                    <div class="error alert-<?= $flashMessage['type'] ?>" role="alert">
                        <?= $flashMessage['message'] ?>
                    </div>
                    <?php } ?><br>
                    <div class="button" style="display: flex; justify-content: center; margin-bottom: 20px;">
                        <input id="button" type="submit" value="Login"><br><br>
                    </div>
                    <a style="color: rgb(255, 249, 128);">Don't have an account?</a>
                    <a href="signup.php" style="color: rgb(255, 249, 128);">Sign up here!</a><br><br>
                </form>
            </div>    
        </div>
    </div>
</body>
</html>