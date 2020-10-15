<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace APP\Controller;
use APP\Model\GestionClientModel;
use ReflectionClass; // récupère les information sur une classe (getconstruct(), getName()...)
use Exception;

/**
 * Description of GestionClientController
 *
 * @author adrien.poignard
 */
class GestionClientController {
    public function chercheUN($param){
        //appel de la méthode find($id) de la classe Model adequate
        $model = new GestionClientModel();
        $id = filter_var(intval($param["id"]),FILTER_VALIDATE_INT);
        $unClient = $model->find($id); //appel la fonction find($id)
        if($unClient){
            $r = new \ReflectionClass($this); //classe qui permet d'accéder au info de la classe courante
            include_once PATH_VIEW . str_replace('Controller','View',$r->getShortName()). "/unClient.php"; //str_replace = remplace View par Controller
            // puis remple shortname par le nom de la classe puis accède à unClient (methode find(id)
        }
        else{
            throw new Exception("Client ". $id. "inconnu");
        }
    }
}
