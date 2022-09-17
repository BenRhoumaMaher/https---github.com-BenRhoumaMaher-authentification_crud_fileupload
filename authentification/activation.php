<?php
session_start();
require("../app/app.php");
$token = $_GET["token"];
if(isset($token)) {
    $sql = "UPDATE crudalpha.registration SET active = 'ON' WHERE token = ?";
    $smt = $dba-> prepare($sql);
    $smt-> execute([$token]);

    $_SESSION['message'] = " Your account is activated ";
    redirect('login');
}