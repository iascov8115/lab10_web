<?php

require_once __DIR__.'/services/Template.php';
require_once __DIR__.'/services/CraftiDB.php';
require_once __DIR__ . '/services/Router.php';
require_once __DIR__ . '/controllers/HomeController.php';
require_once __DIR__ . '/controllers/EventsController.php';

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/record', 'EventsController@createEventRecord');
$router->post('/record/submit', 'EventsController@saveEventRecord');
$router->get('/events', 'EventsController@index');

$router->dispatch($_SERVER['REQUEST_URI']);