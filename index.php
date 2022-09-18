<?php
session_start();
require('app/app.php');
ensureauthentif();

$perpage = 3;

$sql = "SELECT * FROM crudalpha.users";
$smt = $dba->prepare($sql); 
$smt->execute(); 
$query = $smt->rowCount();

$numpages = ceil($query / $perpage) + 1;

if(!isset($_GET['page'])){
    $page = 1;
}else {
    $page = $_GET['page'];
}

$startingrow = ($page - 1) * $perpage;

 



view('index');