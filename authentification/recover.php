<?php
session_start();
require('../app/app.php');
$token = $_GET["token"];
if(is_post()){
    
    $password = chars($_POST["password"]); 
    $confirm = chars($_POST["confirm"]);
    
    
    $errorpassword = checkerror($password, "PASSWORD", "password");
    $confirmpass = confirmpass($password,$confirm);

    if($errorpassword == "" && $confirmpass == "") {
        
        $hash = Encryption($password);
        
        $sql = "UPDATE crudalpha.registration SET password = :password WHERE token = :token";
        $smt = $dba->prepare($sql);
        $smt->bindParam('password', $hash);
        $smt->bindParam('token', $token);
        $smt->execute();

        $_SESSION['message'] = "Your password has been updated";
        redirect('login');
    }
}









view("recover");