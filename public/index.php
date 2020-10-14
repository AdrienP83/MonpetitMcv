<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define ('DS', DIRECTORY_SEPARATOR);
define ('RACINE', new DirectoryIterator(dirname(__FILE__)) . DS . ".." . DS);
include_once(RACINE . DS . 'config/conf.php');
require PATH_VENDOR . "autoload.php";
$BaseController = filter_input(INPUT_GET, 'c', FILTER_SANITIZE_STRING);
$action = filter_input(INPUT_GET, 'a', FILTER_SANITIZE_STRING);
try {
    if (empty($BaseController)) { //si $BaseController est vide 
        $BaseController = 'Identification'; // alors on appelle le constructeur 'Identification'
        $action = 'login'; // et appelle la méthode login du controleur and l'url
    }
    $controller = 'APP\Controller\\' . $BaseController . 'Controller';
    
    $c = new $controller(); //déclare un nouveau controleur
    $params = array(array_slice($_REQUEST, 2)); //_RESQUEST combine le get et le post, ici a et c ne nous interesse pas donc on commence à l'indice 2 
    call_user_func_array(array($c, $action), $params); 
} catch (Exception $ex) {
    echo $ex->getMessage();
    //$vue =
    //$params = array(...)
    //include PATH_VIEW . '$BaseController'errors/ . 'View' . DS . 'unClient.php';
}
