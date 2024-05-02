<?php

class Person{

    public static $show;
    public $data=array();
    public function addperson($db,$data,$insertto){
        $i=count($data);
        for($l=0;$l<$i;$l++){
            $q[$l]='?';
        }
        $qmark=implode(',',$q);
        $req=$db->prepare("INSERT INTO $insertto VALUES($qmark)");
        $req->execute($data);
    }

    public function modifyperson($db,$data,$datamodify,$insertto,$idpers){
        $champ=implode('=?,',$data).'=?';
        $req=$db->prepare("UPDATE $insertto SET $champ WHERE id_$insertto=$idpers");
        $req->execute($datamodify);
    }
    public function deleteperson($db,$deletefrom,$id){
        if($deletefrom=='client'){
            $r0=$db->prepare('SELECT * FROM commande WHERE id_client=?');
            $r0->execute([$id]);
            $issus=$r0->fetch();
            $isan=$r0->rowCount();
            if($isan>0){
                $req=$db->prepare("DELETE t4,t3,t2 FROM commande AS t1
                LEFT JOIN adresse_exact_client AS t2 ON t1.id_client=t2.id_client
                LEFT JOIN paiment AS t3 ON t1.id_commande=t3.id_commande
                LEFT JOIN commande_service AS t4 ON t1.id_commande=t4.id_commande
                WHERE t1.id_client=?");
            
                $req->execute([$id]);
                $req1=$db->prepare("DELETE t6,t5,t4,t7,t8 FROM  mission_service AS t8
                LEFT JOIN mission AS t7 ON t7.id_mission=t8.id_mission
                LEFT JOIN commande AS t5 ON t5.id_date=t7.id_date
                LEFT JOIN client AS t6 ON t6.id_client=t5.id_client
                LEFT JOIN date AS t4 ON t4.id_date=t5.id_date
                WHERE t5.id_client=?
                ");
                $req1->execute([$id]);
            }else{
                $req1=$db->prepare("DELETE t1,t2 FROM adresse_exact_client AS t1 LEFT JOIN
                client AS t2 ON t2.id_client=t1.id_client WHERE t1.id_client=?
                ");
                $req1->execute([$id]);
            }
                           
        }
        else{
            $sql="DELETE FROM fonction WHERE id_employe=$id;
            DELETE FROM adresse_exact_employe WHERE id_employe=$id;
            DELETE FROM employe WHERE id_employe=$id";
            $req=$db->prepare($sql);
            $req->execute();
        }

    }


    public function connect($db,$email,$password){
        $rc=$db->prepare("SELECT * FROM client WHERE email=? AND passwordclient=?");
        $rc->execute([$email,$password]);
        $numclexist=$rc->rowCount();
        if($numclexist>0){
            $res=$rc->fetch();
            $rc=$db->prepare("SELECT * FROM adresse_exact_client WHERE id_client=?");
            $rc->execute([$res['id_client']]);
            $result=$rc->fetch();
            $idfk=$result['id_fokotany'];
            $rc1=$db->prepare("SELECT * FROM fokotany WHERE id=?");
            $rc1->execute([$idfk]);
            $result1=$rc1->fetch();
            $_SESSION['contact']=$res['contact'];
            $_SESSION['nom']=$res['nom'].' '.$res['prenom'];
            $_SESSION['email'][1]=$email;
            $_SESSION['client'][1]=$res['id_client'];
            $_SESSION['datebirth'][1]=$res['date_birth'];
            $_SESSION['address_client'][1]=$result1['nom_fokotany'];
            header('location:logedin.php');
        }else{
            ?>
            <script>
            setTimeout( alert('Mauvais mot de passe ou email'),2000);
            <?php header('location:index.php');?>
            clientconnexion.style.display="block";
            main.style.opacity="40%";
            </script>
            <?php
 
        }


    }
    public function showperson($db,$name,$from){
        
        $rc=$db->prepare("SELECT * FROM $from WHERE nom=?");
        $rc->execute([$name]);
        $numclexist=$rc->rowCount();

        if($numclexist>0){
            return $res=$rc->fetch();
        }else{
            ?>
            <script>
            alert("Ce nom n'existe pas");
            </script>
            <?php
        }
    }




    public function forgetpassword($db,$email,$password){
        
        $rc=$db->prepare("SELECT * FROM client WHERE email=?");
        $rc->execute([$email]);
        $numclexist=$rc->rowCount();
        if($numclexist>0){
            $this->generatecodeandsendmail($db,$email,$password);
        }else{
            ?>
            <script>
            alert('Veuillez verifier bien votre adresse email');
            </script>
            <?php
        }
    }

 
        public function generatecodeandsendmail($db,$email,$newpassword){
            $code=rand(0000,9999);
            $rc=$db->prepare("SELECT * FROM client WHERE email=?");
            $rc->execute([$email]);

            $res=$rc->fetch();
            $idcl=$res['id_client'];
            $id_code=$idcl.date('im');
            $req=$db->prepare("INSERT INTO code_fg_pw VALUES(?,?,CURRENT_TIMESTAMP,?)");
            $req->execute([$id_code,$code,$idcl]);
            $rc1=$db->prepare("SELECT * FROM code_fg_pw WHERE id_client=?");
            $rc1->execute([$idcl]);
            $res1=$rc1->fetch();
            $id_codedelete=$res1['id_code'];
            $this->sendtothismail($db,$email);

            //The code send by the client
            $this->getthecodeandupdateclient($db,$email,$code,$newpassword);
            $datestart=strtotime($res1['date_time']);
            $now=time();
            //Delete automatically the all the code for this client after 6 minutes
            if($now-$datestart>=240){
                $rc1=$db->prepare("DELETE FROM code_fg_pw WHERE id_client=?");
                $rc1->execute([$idcl]);
            }

        }

        public function sendtothismail($db,$mail){
            //send the code to the email address of the current client
        }

        public function getthecodeandupdateclient($db,$mail,$code,$newpassword){
            $rc1=$db->prepare("SELECT * FROM code_fg_pw WHERE code=?");
            $rc1->execute([$code]);
            $numclexist=$rc1->rowCount();
            if($numclexist>0){
                $rc1=$db->prepare("UPDATE client SET passwordclient=? WHERE email=?");
                $rc1->execute([$newpassword,$mail]);

                $rc1=$db->prepare("DELETE FROM code_fg_pw WHERE code=?");
                $rc1->execute([$code]);
            }else{
                ?>
                <script>
                alert("Code incorrect,Veuillez reessayer s'il vous plait");
                
                </script>
                <?php
                $this->ifcodeincorect($db,$mail,$newpassword);
                $rc1=$db->prepare("DELETE FROM code_fg_pw WHERE code=?");
                $rc1->execute([$code]);
            }

        }
       public function ifcodeincorect($db,$email,$newpassword){
            $this->generatecodeandsendmail($db,$email,$newpassword);
       }

       public function showallperson($db){
        $rc1=$db->prepare("SELECT  t1.nom,t1.prenom,t2.lot_maison,t1.id_client FROM client AS t1 INNER JOIN adresse_exact_client AS t2
        ON t1.id_client=t2.id_client");
        $rc1->execute();
        return $rc1;
        /*
        $rc2=$db->prepare("SELECT * FROM adresse_exact_client");
        $rc2->execute();
        return $rc2;*/
        
       }
        

       public function getallemployewithfunction($db){
           $req=$db->prepare("SELECT t1.nom_emp, t1.prenom_emp,t1.id_employe,t2.nom FROM employe as t1 INNER JOIN 
                     fonction AS t2 ON t1.id_employe=t2.id_employe");
           $req->execute();
           return $req;

       }
    }



session_start();
require 'database.php';




?>