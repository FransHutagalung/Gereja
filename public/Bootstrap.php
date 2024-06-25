<?php

use Core\Container;
use Core\Database;
use Core\App;
use Dotenv\Dotenv;

$container = new Container();
$container->bind("Core\Database" , function(){
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();
    $config =  [
        $_ENV['host'] ,
        $_ENV['port'] ,
        $_ENV['dbname'] ,
        $_ENV['charset']
    ];
    return new Database($config , $_ENV['username'] , $_ENV['pass'] );
});

App::setContainer($container);