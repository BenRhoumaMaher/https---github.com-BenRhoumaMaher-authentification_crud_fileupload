<?php
require("../app/app.php");
if(is_post()){
    
    $name = chars($_POST["name"]); 
    $lastname = chars($_POST["lastname"]); 
    $email = chars($_POST["email"]); 
    $country = chars($_POST["country"]); 
    $phone = chars($_POST["phone"]); 
    $password = chars($_POST["password"]); 
    $confirm = chars($_POST["confirm"]);

    $errorname = checkerror($name, "NAME","string");
    $errorlastname = checkerror($lastname, "LASTNAME", "string");
    $erroremail = checkerror($email, "EMAIL", "email");
    $errorexist = emailexist($email);
    $errorphone = checkerror($phone, "PHONE", "integer");
    $errorcountry = checkerror($country, "COUNTRY", "string");
    $errorpassword = checkerror($password, "PASSWORD", "password");
    $confirmpass = confirmpass($password,$confirm);
    $token = bin2hex(openssl_random_pseudo_bytes(30));
    
    if($errorname == "" && $errorlastname == "" && $erroremail == "" && $errorphone == "" 
    && $errorcountry == "" && $errorpassword == "" && $errorexist == "" && $confirmpass == "") {
        
        $hash = Encryption($password);
        $sql = "INSERT INTO crudalpha.registration(name,lastname,email,phone,country,password,token,active) VALUES(:name,:lastname,:email,:phone,:country,:password,:token,'OFF')";
        
        $smt = $dba -> prepare($sql);
        
        $smt -> bindParam(':name', $name);
        $smt -> bindParam(':lastname', $lastname);
        $smt -> bindParam(':email', $email);
        $smt -> bindParam(':phone', $phone);
        $smt -> bindParam(':country', $country);
        $smt -> bindParam(':password', $hash);
        $smt -> bindParam(':token', $token);
        
        $smt -> execute();
    
    if($smt) {
        $subject = "Registration for ".$email;
            $body = "Thank you for your registration " .$name. "<br>" ." Here's your link of activation : http://localhost/crudalpha/authentification/activation.php?token=" .$token;
            $email_to = $email;
            $email_from = "*******************";
            $sender_name = "M&CODE";
            require('../PHPMailer/PHPMailer/PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "*******************";
            $mail->Password = "*******************";
            $mail->Port = 25;
            $mail->IsHTML(true);
            $mail->From = $email_from;
            $mail->FromName = $sender_name;
            $mail->Sender = $email_from; // indicates ReturnPath header
            $mail->AddReplyTo($email_from, "No Reply"); // indicates ReplyTo headers
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($email_to);

            if($mail->Send()) {
                redirect("login");
            }
    }
}
}

















view("registration");