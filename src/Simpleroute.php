<?php
namespace Qufo\Simpleroute;

class Route
{
    protected $routes = [
        'GET'   => [],
        'POST'  => [],
        'PUT'   => [],
        'DELETE'=> [],
    ];

    private function response($action,$route,$handler){
        $this->routes[$action][$route]  = $handler;
        return $this;
    }

    public function get($route,$handler){
        return $this->response('GET',$route,$handler);
    }

    public function post($route,$handler){
        return $this->response('POST',$route,$handler);
    }

    public function put($route,$handler){
        return $this->response('PUT',$route,$handler);
    }

    public function delete($route,$handler){
        return $this->response('DELETE',$route,$handler);
    }

    public function run(){
        return $this->dispatch();
    }

    public function dispatch(){
        $action = $_SERVER['REQUEST_METHOD'];
        $uri    = explode('?',$_SERVER['REQUEST_URI'])[0];
        if (isset($this->routes[$action][$uri])) {
            $handler = $this->routes[$action][$uri];
            list($controller,$method) = explode('@',$handler);
            return (new $controller())->$method();
        } else {
            header('HTTP/1.0 404 Not Found');
            exit(0);
        }
    }


}