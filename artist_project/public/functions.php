<?php

function check_login(){
    if(isset($_SESSION['user_id'])){
        //echo "success";
        $id = $_SESSION['user_id'];
        /*
        $query = "select * from users where user_id = '$id' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
        */
    }
    //if failed, redirect to login
    else {
        header("Location: error.php");
        die;
    }
}
function random_num($length){
    $text = "";
    $len = rand(4, $length); 
    for($i = 0; $i < $len; $i++){
        $text .= rand(0, 9);
    }
    return $text;
}
function errorMessageCss(){
    $text = ".error{
    display: flex; 
    justify-content: center; 
    align-items: center; 
    background-color: rgb(255, 72, 72);
    height: 32px;
    width: 100%;
    color: black;
    border-radius: 5px;
    border: solid thin red;}";
return $text;
}
?>