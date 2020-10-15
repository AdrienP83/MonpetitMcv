<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestionClientModel
 *
 * @author adrien.poignard
 */
namespace APP\Model;
use PDO;
use APP\Entity\Client;
use Tools\connexion;
class GestionClientModel {
    public function find($id){
        $unObjetPdo = connexion::getConnexion();
        $sql = "select * from CLIENT where id=:id";
        $ligne->bindValue(':id',$id,PDO::PARAM_INT);
        $ligne->execute();
        return $ligne->fetchObject(Client::class);
    }
}
