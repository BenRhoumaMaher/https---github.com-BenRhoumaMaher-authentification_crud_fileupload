<?php
session_start();
require("../app/app.php");
isauthent();
if(isset($_REQUEST["done"])){

    $name = chars($_POST["name"]); 
    $lastname = chars($_POST["lastname"]); 
    $country = chars($_POST["country"]); 
    $phone = chars($_POST["phone"]);


    $errorname = checkerror($name, "NAME","string");
    $errorlastname = checkerror($lastname, "LASTNAME", "string");
    $errorcountry = checkerror($country, "COUNTRY", "string");
    $errorphone = checkerror($phone, "PHONE", "integer");
    

    if($errorname == "" && $errorlastname == "" && $errorphone == "" && $errorcountry == "") {

        $id = $_GET['id'];
        $sql = "UPDATE crudalpha.users SET
         name = :name,
         lastname = :lastname,
         phone = :phone,
         country = :country
         WHERE id = :id
         ";
        
        $smt = $dba -> prepare($sql);
        
        $smt -> bindParam(':name', $name);
        $smt -> bindParam(':lastname', $lastname);
        $smt -> bindParam(':country', $country);
        $smt -> bindParam(':phone', $phone);
        $smt -> bindParam(':id', $id);
        
        $smt -> execute();
    
        if($smt) {
                redirect("../index");
             }
}
}









view('update');