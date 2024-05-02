<?php


class Cartservice{
    public static $idshow;
    public $db;
    public $idservice;
    private static $numbercart;
    public function getservice($db,$idservice){
        $req=$db->prepare("SELECT * FROM service WHERE id_service=?");
        $req->execute([$idservice]);
        return $res=$req->fetch();
    }
    public function insertservice($db,$nameservice,$description,$specificite,$priceperha,$image){
        $req=$db->prepare("INSERT INTO service VALUES('',?,?,?,?,?)");
        $req->execute([$nameservice,$description,$specificite,$priceperha,$image]);
    }
    public function deleteservicedb($db,$id_service){
        $req=$db->prepare("DELETE FROM service WHERE id_service=?");
        $req->execute([$id_service]);
    }


    public function addtocart($db,$getid_service){

        $req2=$db->prepare("SELECT * FROM service WHERE id_service=?");
        $req2->execute([$getid_service]);
        $res2=$req2->fetch();
        return $res2;
    }


    public function stockid(){
        if(!isset($_SESSION['ids'])){
            $_SESSION['ids']=array();
            
        }
    
        if(isset($_GET['idservtocart'])){
            
            $number=count($_SESSION['ids']);
            if(array_search($_GET['idservtocart'],$_SESSION['ids'])!==false){
?>
<script>
     <?php $_SESSION['message'][1]='Vous avez deja commandé cet service'?>
      
</script>
                   
        <?php
            }else{


                $_SESSION['ids'][]=$_GET['idservtocart'];
            };
            
        }
        
        return $idshow=$_SESSION['ids'];
       
    }


    public function showservice($db){
        $req=$db->prepare("SELECT * FROM service");
        $req->execute();
        return $req;
    }

    

}












?>