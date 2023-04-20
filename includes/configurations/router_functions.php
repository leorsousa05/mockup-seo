<?php
abstract class Router {
    abstract public function get_route(AltoRouter $router): AltoRouter;
}

class AssetsRequest extends Router {
    private $path, $content_type;

    public function __construct(string $path, string $content_type) {
        $this->path = $path;
        $this->content_type = $content_type;
    }

    public function get_route(AltoRouter $router): AltoRouter {
        $router->map('GET', $this->path."[*:file]", function($archive) {

            header($this->content_type);

            readfile($_SERVER["DOCUMENT_ROOT"] . $this->path . $archive);

            exit();
        });
        return $router;
    }

}

class PagesRequest extends Router {
    private $path, $page_archive_path, $is_dinamic;

    public function __construct(string $path, string $page_archive_path, bool $is_dynamic = false) {
        $this->path = $path;
        $this->page_archive_path = $page_archive_path;
        $this->is_dinamic = $is_dynamic;
    }

    public function get_route(AltoRouter $router): AltoRouter {
        switch($this->is_dinamic) {
        case true:
            $router->map('GET', $this->path."[*:file]", function($archive) {
                require($this->page_archive_path)($archive);
            });
            break;
        case false:
            $router->map('GET', $this->path, function() {
                require($this->page_archive_path);
            });
            break;
        }

        return $router;
    }
}

class SecondaryArchivesRequest extends Router {
    private $path, $content_type;

    public function __construct(string $path, string $content_type) {
        $this->path = $path;
        $this->content_type = $content_type;     
    }

    public function get_route(AltoRouter $router): AltoRouter {
        $router->map("GET", $this->path."[*:file]", function($archive) {
            header($this->content_type);

            readfile($_SERVER["DOCUMENT_ROOT"] . $this->path . $archive);

            exit();
        });
        return $router;
    }
}
?> 
