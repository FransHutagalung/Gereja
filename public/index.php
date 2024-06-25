   <?php

use Core\Session;
use Core\ValidationException;
use Core\Router;

session_start();

const BASE_PATH =  __DIR__. '/../';

require BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'src/core/Function/Function.php';
require_once "bootstrap.php";

$router = new Router;

$route = require_once BASE_PATH . 'routes.php';
// dd($route);
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// dd($uri);

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

try {
  $router->Route($uri, $method);
} catch (ValidationException $exception) {
  Session::flash('error', $exception->errors);
  Session::flash('old', [
    'email' => $exception->old['email']
  ]);

  return Redirect($_SERVER['HTTP_REFERER']);
}

Session::unflash();


