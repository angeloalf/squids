<?php
global $routes;
$routes = array();

//create routes
$routes['/galeria/{alias}'] = '/galeria/abrir/:alias';

// posts
$routes['/{categories}/{title}'] = '/post/article/:categories/:title';
$routes['/{categories}'] = '/post/list/:categories';

