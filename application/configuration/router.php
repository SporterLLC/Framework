<?php
basename($_SERVER["PHP_SELF"]) == "router.php" ? die("No direct script access allowed") : '';


$router = new Router();

$router->setBasePath( $config->get_conf('base_url') );

$router->map('GET','/', 'Home@index', 'homepage');
$router->map('GET','/news', 'News@index', 'news');
$router->map('GET','/news/test', 'News@test', 'test');
$router->map('GET','/news/[i:id]', 'News@article', 'article');

$match = $router->match();