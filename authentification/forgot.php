<?php
session_start();
require('../app/app.php');
if(is_post()){
    $email = chars($_POST['email']);
$erroremail = checkerror($email, "EMAIL", "email");
if(empty($erroremail)) {
    $errorexist = emailunexist($email);
    }
    if($erroremail == "" && $errorexist == "") {
            $sql = "SELECT * FROM crudalpha.registration WHERE email = ?";
            $smt = $dba->prepare($sql);
            $smt-> execute([$email]);
            $query = $smt->fetch();
            if($query) {
            $subject = "Recover password for ".$email;
            $body = "Thank you for your registration " .$name. "<br>" ." Here's your link of recover : http://localhost/crudalpha/authentification/recover.php?token=" .$query['token'];
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
                $_SESSION['message'] = "check your email for recover link";
                redirect("login");
            }
    }
}
}
view('forgot');