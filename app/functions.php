<?php
function view($page) {
    GLOBAL $errorname, $errorlastname, $erroremail, $errorphone, $errorcountry, $errorpassword, $errorexist, $confirmpass, $errorcredentials, $erroractivate;
    require(APP_PATH ."view/$page.view.php");
}
function is_post(){
    return $_SERVER["REQUEST_METHOD"] == "POST";
}
function chars($var){
    return trim(htmlspecialchars($var));
}
function checkerror($value,$name,$type){
    $error = "";
    $error = empty($value) ? $name . " is required" : "";
    
    if(!empty($error)) {
        return $error;
    }
    switch ($type) {
        case "string":
            $error = !is_string($value) ? $name . " must be a string" : "";
            break;
        case "integer":
            $error = !is_numeric($value) ? $name . " must be of numeric type " : "";
            break;
        case "email" :
            $error = !filter_var($value, FILTER_VALIDATE_EMAIL) ? $name . " must be an email " : "";
            break;
        case "password" :
            $error = strlen($value) < 8 || !preg_match('@[0-9]@', $value) || 
            !preg_match('@[a-z]@', $value) || !preg_match('@[A-Z]@',$value) || !preg_match('@[^\w]@', $value) ?
            $name . " must be at least 8 characters, includes one uppercase,one lowercase, one number and one symbole " : "";  
            break;
        default:
            $error = "";
    }
    return $error;  
}
function checkemail ($email) {
    GLOBAL $dba;
    $sql = "SELECT * FROM crudalpha.registration where email = ?";
    $smt = $dba->prepare($sql);
    $smt -> execute([$email]);
    $query = $smt->fetch();
    if($query) {
        return true;
    } else {
        return false;
    }
}
function emailexist($email){
    $error = checkemail($email) ? ' email already exists' : "";
    return $error;
}
function emailunexist($email) {
    $error = !checkemail($email) ? ' email does not exist !' : "";
    return $error;
}
function confirmpass($password,$confirm) {
    $error = chars($password) !== chars($confirm) ? ' password does not match !' : "";
    return $error;
}
function Generate_Salt($length){
    $random = md5(uniqid(mt_rand(),true));
    $base64 = base64_encode($random);
    $salt = substr($base64,0,$length);
    return $salt;
}
function Encryption($password) {    
    $blowfishHashFormat="$2y$10$";
    $salt_Length = 22;
    $salt = Generate_Salt($salt_Length);
    $formating = $blowfishHashFormat . $salt;
    $hash = crypt($password,$formating);
    return $hash;
}
function redirect($page) {
    header("Location: $page.php");
    die();
}
function passwordcheck($password,$existingpassword){
    $hash = crypt($password, $existingpassword);
    if($hash === $existingpassword){
        return true;
    }else {
        return false;
    }
}
function checkcrendials($email,$password) {
    GLOBAL $dba;
    $sql = "SELECT * FROM crudalpha.registration WHERE email = ?";
    $smt = $dba -> prepare($sql);
    $smt -> execute([$email]);
    $query = $smt->rowCount();
    $qur = $smt->fetch();
    if($query == 1) {
        if($qur){
        if(passwordcheck($password,$qur['password'])){
            return $qur;
         } 
         }      
} else {
    return null;
}
}
function errorcrendials($email,$password) {
    $error = !checkcrendials($email,$password) ? ' check your crendials !' : "";
    return $error;
}
function checkactivate($email) {
    $sql = "SELECT * FROM crudalpha.registration WHERE email = ? AND active = 'ON'";
    GLOBAL $dba;
    $smt = $dba->prepare($sql);
    $smt-> execute([$email]);
    $query = $smt->fetch();
    if($query) {
        return true;
    } else {
        return false;
    }
}
function isactive($email) {
    $error = !checkactivate($email) ? " your account is not activated !" : "";
    return $error;
}
function message(){
    if(isset($_SESSION["message"])){
        $output = $_SESSION["message"];
        $_SESSION["message"] = null;
        return $output;
    }
}
function authentif() {
    return (isset($_SESSION['email']));
}
function ensureauthentif(){
    if(!authentif()) {
        redirect("authentification/login"); 
    }
}
function isauthent(){
    if(!authentif()){
        redirect('../authentification/login');
    }
}