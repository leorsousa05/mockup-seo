<?php

/**
 * $route_path: Path para rota do site,
 * $page_archive_path: Local onde está armazenado o PHP da página que irá carregar,
 * $archive_path: Onde está armazenado um arquivo secundário,
 * $content_type: Tipo de conteúdo para ser especificado no header (Opcional).
 * $is_dinamic: Booleano que caso for true, o router entende como rota dinâmica,
 * ou seja, você passa a receber o nome do arquivo ou nome da rota (Obs: Se colocado como /
 * a rota não ira mais gerenciar erro, então se a página não existir, vai carregar o layout mesmo assim).
 */

class RouteFunctions {
    public $route_path;
    public $page_archive_path;
    public $archive_path;
    public $content_type;
    public $is_dinamic;

    public function __construct(string $route_path, string $content_type = "", string $page_archive_path = "", bool $is_dinamic = false, string $archive_path = "") {
        $this->route_path = $route_path;
        $this->content_type = $content_type;
        $this->page_archive_path = $page_archive_path;
        $this->is_dinamic = $is_dinamic;
        $this->archive_path = $archive_path;
    }

    public function print() {
        echo $this->route_path;
    }

    public function get_assets_request($router) {
        $router->map('GET', $this->route_path."[*:file]", function($archive) {

            header($this->content_type);

            readfile($_SERVER['DOCUMENT_ROOT'] . $this->route_path . $archive);

            exit();
        });
    }

    public function get_page_request($router) {
        if($this->is_dinamic) {
            $router->map('GET', $this->route_path."[*:page]", function($page) {
                require($this->page_archive_path);
            });
        } else {
            $router->map('GET', $this->route_path, function() {
                require($this->page_archive_path);
            });
        }
    } 

    public function get_archives_request($router) {
        $router->map('GET', $this->archive_path, function() {
            header($this->content_type);

            readfile($_SERVER['DOCUMENT_ROOT'] . $this->archive_path);

            exit();
        });
    }
    }
?> 
