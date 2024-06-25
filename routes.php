<?php

$router->get("/" , "main.php");
$router->get("/gereja/public/" , "main.php");
$router->get("/ayat" , "bibleverse/bibleNote.php");
$router->get('/welcome' , 'churchWelcome/churchWelcome.php');