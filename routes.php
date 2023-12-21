<?php
global $routes;
$routes = array();

// POSTS ROUTES
// open post
$routes['/{keyword}/{categories}/{aliasplus}'] = '/post/open/:keyword/:categories/:aliasplus';

// posts by categories
$routes['/{keyword}/{categories}'] = '/post/postsList/:keyword/:categories';

// categories by KeyWord
$routes['/{keyword}'] = '/post/categoriesList/:keyword';




