<?php
use Core\Router;
use Core\Response;

function base_path($path){
  return BASE_PATH . $path;
}

function Redirect($path){
  header("Location: {$path}");
  exit();
}
function dd($value){
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}
function authorize($condition){
  if(!$condition){
    Router::abort(Response::forbidden);
  }
}
function view($path , $attribute = []){
  extract($attribute);

   require_once base_path("src/resources/views/" .$path);
}