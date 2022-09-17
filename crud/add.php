<?php
session_start();
require('../app/app.php');
isauthent();
    if(isset($_REQUEST["done"])){

    $name = chars($_POST["name"]); 
    $lastname = chars($_POST["lastname"]); 
    $country = chars($_POST["country"]); 
    $phone = chars($_POST["phone"]);
    $image = $_FILES['image']['name'];
    $temp = $_FILES['image']['tmp_name'];
    $folder = "../uploads/" .$image;
    $errorname = checkerror($name, "NAME","string");
    $errorlastname = checkerror($lastname, "LASTNAME", "string");
    $errorcountry = checkerror($country, "COUNTRY", "string");
    $errorphone = checkerror($phone, "PHONE", "integer");
    
    if($errorname == "" && $errorlastname == "" && $errorphone == "" && $errorcountry == "") {
        
        $sql = "INSERT INTO crudalpha.users(image,name,lastname,country,phone) VALUES(:image,:name,:lastname,:country,:phone)";
        
        $smt = $dba -> prepare($sql);
        
        $smt -> bindParam(':image', $image);
        $smt -> bindParam(':name', $name);
        $smt -> bindParam(':lastname', $lastname);
        $smt -> bindParam(':country', $country);
        $smt -> bindParam(':phone', $phone);
        
        $smt -> execute();
    
        if($smt) {
            move_uploaded_file($temp,$folder);
            redirect("../index");
             }
}
}







view('add');