<?php
session_start();
require("../app/app.php");
error_reporting(0);
if(is_post()){
$email = chars($_POST["email"]); 
$password = chars($_POST["password"]); 
$remember = $_POST["remember"];


$erroremail = checkerror($email, "EMAIL", "email");
$errorpassword = checkerror($password, "PASSWORD", "password");
$erroractivate = isactive($email);
if(empty($erroremail && $errorpassword)) {
    $errorexist = emailunexist($email);
    $errorcredentials = errorcrendials($email,$password);
    }

    if(isset($remember)){
        $expiretime = time() + 60*60*24*365*10;
        setcookie("M&CODE",$email, $expiretime);
    }

if($erroremail == "" && $errorpassword == "" && $errorexist == "" && $errorcredentials == "" && $erroractivate == "") {
    $_SESSION['email'] = $email;
    redirect('../index');
}

}
view("login");