<?php

namespace MVC; 

class Router {

    private $routesGET = [];
    private $routesPOST = [];

    public function get($url, $function) {
        $this->routesGET[$url] = $function;
    }
    
    public function post($url, $function) {
        $this->routesPOST[$url] = $function;
    }
    
    public function checkRoutes() {
        $currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD']; 

        if($method === 'GET') {
            $function = $this->routesGET[$currentUrl] ?? null;
        } else if ($method === 'POST') {
            $function = $this->routesPOST[$currentUrl] ?? null;
        }

        if($function) {
            call_user_func($function, $this);
        } else {
            echo "Pagina No Encontrada";
        }
    }

    public function view($view, $data = []) {
        foreach($data as $key => $value) {
            $$key = $value;
        }

        ob_start();

        include __DIR__."/views/$view.php";
        $content = ob_get_clean();
        include __DIR__."/views/layout.php";
    }
}