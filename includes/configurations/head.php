<?php
require 'website_data.php';
require 'seo_data_functions.php';

$uri = $_SERVER["REQUEST_URI"];

$is_dinamic_page = isset($page) && $uri !== "/" && $uri !== "/404" && $uri !== "/mapa-site";
$is_route_data_set = !isset($seo_data_by_route["first_text"]);
$is_error_page = $uri === "/404";

$seo_data = get_seo_data();
$seo_data_by_route = get_seo_data_by_route($page);

if($is_dinamic_page) {
    if($is_route_data_set) {
        echo '<script type="text/javascript">
            window.location = "/404"
               </script>';
    } 

}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if($is_dinamic_page) { ?>
        <meta name="description" content="<?=$seo_data_by_route["description"]?>">
        <meta property="og:description" content="<?=$seo_data_by_route["description"]?>">
        <meta property="og:title" content="<?=$seo_data_by_route["first_title"]?>" />
        <title><?=$seo_data_by_route["first_title"]?></title>
    <?php } else { ?>
        <meta name="description" content="<?=$website_description?>">
        <meta property="og:description" content="<?=$website_description?>">
        <meta property="og:title" content="<?=$website_title?>" />
        <title><?=$website_title?></title>
    <?php } ?>
    <meta name="description" content="<?=$website_description?>">
    <meta name="keywords" content="<?=$website_keywords?>">
    <meta name="author" content="<?=$website_author?>">
    <meta name="robots" content="index,follow">
    <meta property="publisher" content="<?=$website_author?>" />
    <meta property="og:url" content="<?=$website_url?><?=$uri?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="pt_BR" />
    <meta property="og:region" content="Brasil" />
    <meta property="og:author" content="<?=$website_author?>" />
    <meta property="og:site_name" content="<?=$website_name?>" />
    <link rel="canonical" href="<?=$website_url?><?=$uri?>" />
    <base href="/">
    <title><?=$website_title?></title>
    <?php foreach($website_stylesheets as $key=>$stylesheets) { ?>
    <link rel="stylesheet" href="<?=$stylesheets?>">
    <?php } ?>

</head>
