<?php
session_start();
$input_error = null;
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        if(!empty($user_name) && !empty($password) && !empty($email) && !is_numeric($user_name)){
            //save to database
            $user_id = random_num(6);
            $query_check = "select * from users where email = '$email' limit 1";
            if($result = mysqli_query($con, $query_check)){
                if($result && mysqli_num_rows($result) > 0){
                    $input_error = "This email-address has been registered before";
                }else{
                    $query_insert = "insert into users (user_id, user_name, password, email) values ('$user_id', '$user_name', '$password', '$email')";
                    mysqli_query($con, $query_insert);
                    header("Location: login.php");
                }
            }
            
        }else{
            $input_error = "Please input a valid information";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <?php 
        if($input_error != null){
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
            <h2 class="welcome_text" style="position: relative; color: rgb(255, 249, 128);">Welcome new corners!</h2>
            <div id="box">
                <form method="post">
                <div class="text">Email-Address</div>
                    <input id="textbox" type="email" name="email"><br><br>
                    <div class="text">Username</div>
                    <input id="textbox" type="text" name="user_name"><br><br>
                    <div class="text">Password</div>
                    <input id="textbox" type="password" name="password"><br><br>
                    <p class="error">
                        <?php echo $input_error?>
                    </p><br>
                    <div class="button" style="display: flex; justify-content: center; margin-bottom: 20px;">
                        <input id="button" type="submit" value="Submit"><br><br>
                    </div>
                    <a style="color: rgb(255, 249, 128);">Already have an account? </a>
                    <a href="login.php" style="color: rgb(255, 249, 128);">Login here!</a><br><br>
                </form>
            </div>    
        </div>
    </div>
</body>
</html>
