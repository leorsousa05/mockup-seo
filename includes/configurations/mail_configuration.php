<?php
require 'modules/PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer(true);
$host = "mail.poderesoterico.com.br";
$host_username = "envio@poderesoterico.com.br";
$host_password = "KUQTYb#oa4=N";

$mail_form = $_GET["email"];
$name_form = $_GET["name"];
$phone_number = $_GET["phone-number"];
$message = $_GET["message"];
$subject = "Contato Via Site - Poder Esotérico";
$date = date("d/m/Y H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$receiver = "leorsousa05@gmail.com";

// EMAIL SENDER CONFIGURATIONS
$mail->isSMTP();
$mail->Host       = $host;                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = $host_username;                     //SMTP username
$mail->Password   = $host_password;                               //SMTP password
$mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

$mail->From       = $host_username;
$mail->FromName   = $name_form;
$mail->Sender     = $host_username;

// EMAIL CONTENT CONFIGURATIONS
$mail->isHTML(true);                                  //Set email format to HTML
$mail->AddAddress($receiver);
$mail->AddReplyTo("teste@gmail.com", $name_form);
$mail->Subject = utf8_decode($subject);
$mail->Body .=  utf8_decode("<strong>Nome: </strong>") . utf8_decode($name_form).
                    "<br />" . utf8_decode("<strong>Celular: </strong>") . utf8_decode($phone_number).
                    "<br />" . utf8_decode("<strong>Mensagem: </strong>") . utf8_decode($message) .
                    "<font color='#666666' size='1'><br /><br />Email enviado em: $date - IP: $ip <br /> (Enviado via SMTP)</font><br />";

$mail->MsgHTML($mail->Body);

$mail->send();
echo "<meta http-equiv='refresh' content='0; URL=/thank-you-page'>";
