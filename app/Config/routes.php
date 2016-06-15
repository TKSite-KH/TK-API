<?php
Router::mapResources(array('sportclubs'));
//Router::resourceMap(array(
//    array('action' => 'index', 'method' => 'GET', 'id' => false),
//    array('action' => 'view', 'method' => 'GET', 'id' => true),
//    array('action' => 'add', 'method' => 'POST', 'id' => false),
//    array('action' => 'edit', 'method' => 'PUT', 'id' => true),
//    array('action' => 'update', 'method' => 'POST', 'id' => true),
//    array('action' => 'delete', 'method' => 'DELETE', 'id' => true),
//
//    // sportclubs controller
//    array('controller'=>'sportclubs', 'action' => 'login', 'method' => 'POST', 'id' => false)
//));
/*
Router::resourceMap(array(
    array('action' => 'index', 'method' => 'GET', 'id' => false),
    array('action' => 'view', 'method' => 'GET', 'id' => true),
    array('action' => 'add', 'method' => 'POST', 'id' => false),
    array('action' => 'edit', 'method' => 'PUT', 'id' => true),
    array('action' => 'delete', 'method' => 'DELETE', 'id' => true),
    array('action' => 'update', 'method' => 'POST', 'id' => true)
));
*/
//Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

Router::parseExtensions();

require CAKE . 'Config' . DS . 'routes.php';



