<?php
require 'mainclass.php';
$person=new Person();
@$idcldel=$_GET['idclient'];
@$idempdel=$_GET['id'];
@$idservdel=$_GET['idserv'];
// deleteclient
if(isset($idcldel)){
    $person->deleteperson($db,'client',$idcldel);
    header('location:dashboard.php');

}
elseif(isset($idempdel)){
    $person->deleteperson($db,'employe',$idempdel);
    header('location:dashboard.php');
}else{
    $cart->deleteservicedb($db,$idservdel);
    header('location:dashboard.php');

}


?>