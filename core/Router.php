<?php

namespace Core;

use Core\middleware\Middleware;
class Router{
  protected $routes = [];

  public function get($uri , $controller){
    return $this->Add('GET' , $uri , $controller);
  }

  public function delete($uri , $controller){
    return $this->Add('DELETE' , $uri , $controller);
  }

  public function post($uri , $controller){
       return $this->Add('POST' , $uri , $controller);
  }

  public function patch($uri , $controller){
       return $this->Add('PATCH' , $uri , $controller);
  }

  public function Only($key){
       $this->routes[array_key_last($this->routes)]['middleware'] = $key ;
       return $this;
  }

  public function put($uri , $controller){
      $this->Add('PUT' , $uri , $controller);
  }

  public function Add($method , $uri , $controller){
    $this->routes[] = [
        'method' => $method,
        'uri'=> $uri ,
        'controller' => $controller ,
        'middleware' => null
    ];

    return $this ;
  }
  public function Route($uri  , $method){
        foreach ($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === strtoupper($method)){

              // Middleware::resolve($route["middleware"]);
               return require base_path( "/src/core/controller/". $route['controller']);
            }
        }
       dd("tidak ada");
       $this->abort();

  }

  public static function abort($error = 404){
    http_response_code($error);
    require_once base_path("src/resources/views/partials/{$error}.php");
    die();
  }

}

