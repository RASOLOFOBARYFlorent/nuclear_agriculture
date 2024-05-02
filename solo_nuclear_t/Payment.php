<?php

class Payment{
    public function getcommandandadd($db){
        $idclient=$_SESSION['client'][1];

        $idserv=$_GET['idservpaid'];
        $id_commande=$_GET['idservpaid'].$idclient.date('Ym');
        //if it is mid-days or evening
        if(date('H')>=12){

            $debut=date('y-m-d',strtotime('+5 days'));
            $req=$db->prepare("INSERT INTO date VALUES('',CURRENT_TIMESTAMP,?)");
            $req->execute([$debut]);
        }else{
            //if it is morning
            $debut=date('y-m-d h:i:s',strtotime('+4 days'));
            $req=$db->prepare("INSERT INTO date VALUES('',CURRENT_TIMESTAMP,?)");
            $req->execute([$debut]);
        };

      
    //select date and get the date'id
        $req=$db->prepare("SELECT * FROM date WHERE date_paiment=?");
        $req->execute([date('Y-m-d h:i:s')]);
        $res=$req->fetch();
        $id_date=$res['id_date'];
        $req0=$db->prepare("SELECT * FROM service WHERE id_service=?");
        $req0->execute([$idserv]);
        $inneed=$req0->fetch();
        $total=$inneed['prix_ha'];
        $nomcom=$inneed['nom_service'];
        
        $req05=$db->prepare("SELECT * FROM commande WHERE id_commande=?");
        $req05->execute([$id_commande]);
        $res5=$req05->fetch();



        $number5=$req05->rowCount();
        if($number5>0){
            ?>
            <script>
               alert("Il faut qu'un service repete une fois par mois au plus pour assurer sa efficacité");
            </script>
            
            <?php
            header('location:logedin.php');
        }else{
            $req3=$db->prepare("INSERT INTO commande VALUES(?,?,?,?)");
            $req3->execute([$id_commande,$nomcom,$idclient,$id_date]);
    
           $idp= $_SESSION['client'][1].'-'.date('y-m-d h:i:s');
            $req=$db->prepare("INSERT INTO paiment VALUES(?,?,?,?)");
            $req->execute([$idp,$total,$id_commande,$id_date]);
    // add mission once the client service was ordered and paid
            $req1=$db->prepare("INSERT INTO mission VALUES('',?,?)");
            $req1->execute([$_SESSION['address_client'][1],$id_date]);
    
    
        }

    }


    public function showpayment($db){

        $rc1=$db->prepare("SELECT t1.date_paiment,t2.id_client FROM paiment AS t3  LEFT JOIN date  AS t1
        ON t1.id_date=t3.id_date
         LEFT JOIN commande AS t2
        ON t2.id_commande=t3.id_commande");
        $rc1->execute();
        return $rc1;
    }

    public function notifyadmin($db){
        $today=date('Y-m-d');
        $req=$db->prepare("SELECT * FROM date WHERE date_paiment LIKE '%$today%'");
        $req->execute();
        $_SESSION['todaypayment'][1]=count($issutodaypayment=$req->fetchAll());
    }

}



?>