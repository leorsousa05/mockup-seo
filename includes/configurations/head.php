<?php
require 'website_data.php';
require 'seo_data_functions.php';

$uri = $_SERVER["REQUEST_URI"];

$is_dinamic_page = isset($page) && $uri !== "/" && $uri !== "/404" && $uri !== "/mapa-site";
$is_route_data_set = !isset($seo_data_by_route["first_text"]);
$is_error_page = $uri === "/404";

$seo_data = get_seo_data();

if($is_dinamic_page) {
    $seo_data_by_route = get_seo_data_by_route($page);
    if($is_route_data_set) {
        echo '<script type="text/javascript">
            window.location = "/404"
               </script>';
    } 

} elseif($is_error_page) {
    echo '<script type="text/javascript">
        setTimeout(function() {window.location = "/"}, 3000)
            </script>';
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if($is_dinamic_page) { ?>
        <meta name="description" content="<?=$seo_data_by_route["description"]?>">
        <title><?=$seo_data_by_route["first_title"]?></title>
    <?php } else { ?>
        <meta name="description" content="<?=$website_description?>">
        <title><?=$website_title?></title>
    <?php } ?>
    <meta name="description" content="<?=$website_description?>">
    <meta name="keywords" content="<?=$website_keywords?>">
    <meta name="author" content="<?=$website_author?>">
    <title><?=$website_title?></title>
</head>

