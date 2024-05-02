<?php

include 'database.php';
class Mission{
    public function getaddressofmission($db){
        $req=$db->prepare("SELECT t1.id_date,t1.zone_concernee FROM mission AS t1");
        $req->execute();
        return $req;
    }
    

}

$m=new Mission();

$m->getaddressofmission($db);

$r=$m->getaddressofmission($db)->fetchAll();
var_dump($r);


?>