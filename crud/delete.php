<?php
session_start();
require("../app/app.php");
isauthent();
$id = $_GET["id"];
if(isset($id)){
    $sql = "DELETE FROM crudalpha.users WHERE id = ?";
    $smt = $dba->prepare($sql);
    $smt->execute([$id]);
        $_SESSION['message'] = " user has been deleted ";
        redirect("../index");
}