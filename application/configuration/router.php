<?php
basename($_SERVER["PHP_SELF"]) == "router.php" ? die("No direct script access allowed") : '';


$router = new Router();

$router->setBasePath( $config->get_conf('base_url') );

$router->map('GET','/', 'DefaultController@index', 'homepage');
$router->map('GET','/news', 'NewsController@index', 'news');
$router->map('GET','/news/test', 'NewsController@test', 'test');
$router->map('GET','/news/[i:id]', 'NewsController@article', 'article');

$match = $router->match();