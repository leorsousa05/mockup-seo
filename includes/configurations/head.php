<?php
require 'website_data.php';
require 'seo_data_functions.php';

$seo_data = get_seo_data();

$seo_data_by_route = get_seo_data_by_route($page);


var_dump($seo_data_by_route);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$website_description?>">
    <meta name="keywords" content="<?=$website_keywords?>">
    <meta name="author" content="<?=$website_author?>">
    <title><?=$website_title?></title>
    <title>a</title>
</head>

