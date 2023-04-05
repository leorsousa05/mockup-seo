<?php
require 'modules/AltoRouter.php';
require 'router_functions.php';

$router = new AltoRouter();

$assets_routes = [
    // Adicionar aqui Rotas da mesma forma como está abaixo
    // Colocar o path do arquivo apenas, não colocar o nome do arquivo.
    // exemplo: /assets/ e não /assets/main.js
    new RouteFunctions("/assets/fonts", "Content-Type: application/font-woff2"),
    new RouteFunctions("/assets/css/", "Content-Type: text/css"),
    new RouteFunctions("/assets/images/", "Content-Type: image/webp"),
    new RouteFunctions("/assets/js/", "Content-Type: text/javascript"),
    new RouteFunctions("/modules/", "Content-Type: text/javascript"),
];

$pages_routes = [
    // Colocar aqui rotas de páginas.
    // Primeiro o Path e depois passar o page_path
    // Caso seja rotas dinamicas como páginas de SEO
    // colocar no parametro da função is_dinamic: true
    // coloque sempre páginas dinamicas no final da array
    new RouteFunctions("/", page_archive_path: "pages/home.php"),
    new RouteFunctions("/email-send", page_archive_path: "includes/configurations/mail_configuration.php"),
    new RouteFunctions("/404", page_archive_path: "pages/404_page.php"),
    new RouteFunctions("thank-you-page", page_archive_path: "pages/thank_you_page.php"),
    new RouteFunctions("/mapa-site", page_archive_path: "pages/sitemap.php"),
    new RouteFunctions("/", page_archive_path: "pages/conversion_page.php", is_dinamic: true)
];

$archives_routes = [
    // Aqui você coloca rotas de arquivos que não
    // se encaixe nem no assets e nem no modules
    // normalmente arquivos em que a gente especifica o nome
    // e não faz a requisição pelo website
    new RouteFunctions("/google429e1c1077d88e4d.html", 'Content-Type: text/html'),
    new RouteFunctions("/sitemap.xml", 'Content-Type: application/xml'),
    new RouteFunctions('/robots.txt', 'Content-Type: text/plain')
];

foreach($assets_routes as $key=>$file) {
    $file->get_assets_request($router);
}

foreach($pages_routes as $key=>$file) {
    $file->get_page_request($router);
}

foreach($archives_routes as $key=>$file) {
    $file->get_archives_request($router);
}

$match = $router->match();

if($match) {
    call_user_func_array($match['target'], $match['params']);
}

?>
