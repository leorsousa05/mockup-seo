<?php
$css_folder = "";

// Informações do Head
$website_title          = "";
$website_name           = "";
$website_description    = "";
$website_keywords       = "";
$website_author         = "";
$website_url            = "";

// Configurações de Email

$host           = "";                       // Host SMTP
$host_username  = "";                       // Email do Host
$host_password  = "";                       // Senha do Host

$mail_form      = $_GET["email"];
$name_form      = $_GET["name"];
$phone_number   = $_GET["phone-number"];
$message        = $_GET["message"];
$subject        = "";                       // Assunto do Email
$date           = date("d/m/Y H:i:s");      // Data de Envio
$ip             = $_SERVER['REMOTE_ADDR'];  // IP do Usuário
$receiver       = "";                       // Pessoa que Recebe o Email

// CSS usados no website
// Obs.: se quiser usar CSS especifico em alguma página
// Pode fazer aqui mesmo a função PHP
$website_stylesheets = [
    $css_folder."/main.css",
    $css_folder."/components.css",
];

?>
