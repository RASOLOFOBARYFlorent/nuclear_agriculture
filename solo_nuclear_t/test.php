<?php
 require 'mainclass.php';
 

class Exist{
    private static $rregion;
    private static $regions;
    public $db;
    public $name;
    public $anarana;
    public $nomselelect;
    private static $regexist;
    public function __construct($anarana,$name,$db,$nomselelect){
        self::$rregion=$db->prepare("SELECT * FROM $anarana WHERE $nomselelect=?");
        self::$rregion->execute([$name]);
        self::$regexist=self::$rregion->rowCount();
        self::$rregion;
       
    }
    public function existe(){
        

        if(self::$regexist==1){
            self::$regions=self::$rregion->fetch();
            var_dump(self::$regions) ;
            echo 'ef mety';
            echo self::$regions["nom_region"];

        }else{
            echo  'tsy misy ao io zavatra io';
        }
    }

    public function echoreg(){
        
    }
}



// $person=new Person();
// $numbercl=$person->showallperson($db)->rowCount();

// var_dump($result=$person->showallperson($db)->fetchAll());

// for($k=0;$k<$numbercl;$k++){
//     echo $nom=$result[$k]['nom'];
//     echo $pren=$result[$k]['prenom'];

// }


// $rc1=$db->prepare("SELECT t1.date_paiment,t2.id_client FROM paiment AS t3  LEFT JOIN date  AS t1
// ON t1.id_date=t3.id_date
//  LEFT JOIN commande AS t2
// ON t2.id_commande=t3.id_commande;");

// $rc1->execute();
// var_dump($result=$rc1->fetchAll());


/*

$result=$payment->showpayment($db)->fetchAll();

$number=$payment->showpayment($db)->rowCount();

for($k=0;$k<$number;$k++){
    echo $result[$k]['date_paiment'];
    $id[$k]=$result[$k]['id_client'];
    $address=new Address();
    $resultaddress=$address->showaddress($db,$id[$k],'adresse_exact_client','client')->fetch();
    $clientaddress=$resultaddress['lot_maison'];
    $rc2=$db->prepare("SELECT *FROM client WHERE id_client=?");
    $rc2->execute([$id[$k]]);
    $resultrc2=$rc2->fetchAll();
    echo '-----------'.$nom=$resultrc2[$k]['nom'];
    echo $prenom=$resultrc2[$k]['prenom'];


}*/
/*
$employe=new Person();
$employe->getallemployewithfunction($db);
var_dump($employe->getallemployewithfunction($db)->fetchAll());*/


// if(isset($_GET['idservtocart'])){
//     $idser=$_GET['idservtocart'];

//    $cart->stockid();
// $numercart=count($_SESSION['ids']);
// for($l=0;$l<$numercart;$l++){
//     $idsaddtocart=$_SESSION['ids'][$l];
//     $resultaddtocart=$cart->addtocart($db,$idsaddtocart);
//      $idservcart=$resultaddtocart['id_service'];
//      $imgcart=$resultaddtocart['image'];
//      $nameservicecart=$resultaddtocart['nom_service'];
//      $descriptionservicecart=$resultaddtocart['description'];
//      $specificitycart=$resultaddtocart['specificite'];
//      $pricecart=$resultaddtocart['prix_ha'];
//      '</br>';
// }
    
// }

// $today=date('Y-m-d');
// $req=$db->prepare("SELECT * FROM date WHERE date_paiment LIKE '%$today%'");
// $req->execute();
// echo count($issutodaypayment=$req->fetchAll());
// var_dump($issutodaypayment);
// echo $today;
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- connexion -->
    <?php



       if(isset($_POST['validateconnectcl'])){
        $emailcon=$_POST['emailcl'];
        $passwordcon=$_POST['passwordcl'];
        $person->connect($db,$emailcon,$passwordcon);
    }

    ?>
    <form action="#" method="POST" id="clientconnexion" class="form">
        <h1 class="h1fomr">Se connecter</h1>
        <div class="container">
            <div class="email containerchildform1">
                <label for="email">Votre adresse email</label>
                <input type="email" name="emailcl" id="email" placeholder="Votre email">
            </div>
            <div class="fonction containerchildform1">
                <label for="password">Votre mot de passe</label>
                <input type="password" name="passwordcl" id="password" placeholder="Votre mot de passe">
            </div>

        </div>
        <div class="connect">
            <input type="submit" value="Se connecter" name="validateconnectcl" id="connect">
            <a href="passwordforget.php">Mot de passe oublier?</a>
        </div>
    </form>

<!-- end iconnexion -->
</body>
</html> -->







<?php

// require 'mainclass.php';
// $id=$_GET['idclient'];
// $person=new Person();
// //$person->deleteperson($db,'client',$idcldel);
// $r0=$db->prepare('SELECT * FROM commande WHERE id_client=?');
// $r0->execute([$id]);
// $issus=$r0->fetch();
// $isan=$r0->rowCount();
// if($isan>0){
//     $req=$db->prepare("DELETE t4,t3,t2 FROM commande AS t1
//     LEFT JOIN adresse_exact_client AS t2 ON t1.id_client=t2.id_client
//     LEFT JOIN paiment AS t3 ON t1.id_commande=t3.id_commande
//     LEFT JOIN commande_service AS t4 ON t1.id_commande=t4.id_commande
//     WHERE t1.id_client=?");

//     $req->execute([$id]);
//     $req1=$db->prepare("DELETE t6,t5,t4,t7,t8 FROM  mission_service AS t8
//     LEFT JOIN mission AS t7 ON t7.id_mission=t8.id_mission
//     LEFT JOIN commande AS t5 ON t5.id_date=t7.id_date
//     LEFT JOIN client AS t6 ON t6.id_client=t5.id_client
//     LEFT JOIN date AS t4 ON t4.id_date=t5.id_date
//     WHERE t5.id_client=?
//     ");
//     $req1->execute([$id]);
// }else{
//     $req1=$db->prepare("DELETE FROM client WHERE id_client=?
//     ");
//     $req1->execute([$id]);
// }

//$req->prepare("SELECT t1.date,t2.id_date FROM date AS t1 WHERE t1.id_date=t2.id_date");
/*
var_dump($reponse=$payment->showpayment($db)->fetchAll());
$number=$payment->showpayment($db)->rowCount();

foreach($reponse as $reponse){

    echo $reponse['date_paiment'];
    echo $id=$reponse['id_client'];
    $rc2=$db->prepare("SELECT *FROM client WHERE id_client=?");
    $rc2->execute([$id]);
    $resultrc2=$rc2->fetch();
   
    $req=$db->prepare("SELECT t1.lot_maison,t2.nom_fokotany FROM  adresse_exact_client AS t1 INNER JOIN
     fokotany AS t2 ON t1.id_fokotany=t2.id WHERE t1.id_client=?");
    $req->execute([$id]);
    $req->fetch();

    $rc2=$db->prepare("SELECT *FROM client WHERE id_client=?");
    $rc2->execute([$id]);
    $resultrc2=$rc2->fetch();
    
}
*/

?>
       <form action="#" method="post" id="formemployeadd" class="forms">
          <h1 class="h1fomr">Ajouter un nouveau travailleur</h1>
          <div class="container">
              <div class="nom containerchildform1">
                  <label for="name">Nom et prenom</label>
                  <input type="text" name="name" id="name" placeholder="Nom Prenom">
              </div>
              <div class="cin containerchildform1">
                  <label for="cin">Son CIN</label>
                  <input type="number" name="cin" id="cin" placeholder="Son CIN">
              </div>
              <div class="dateofbirth containerchildform1">
                  <label for="dateofbirth">Date de naissance</label>
                  <input type="date" name="dateofbirth" id="dateofbirth" >
              </div>
              <div class="contact containerchildform1">
                  <label for="contact">Son contact</label>
                  <input type="number" name="contact" id="contact" placeholder="Son contact">
              </div>
              <div class="gender containerchildform1">
                  <label for="gender">Sexe</label>
                  <select name="gender" id="gender">
                      <option value="M">Masculin</option>
                      <option value="F">Feminin</option>
                  </select>
              </div>
              <div class="fonction containerchildform1">
                  <label for="fonction">Sa fonction</label>
                  <input type="text" name="fonction" id="fonction" placeholder="Sa fonction">
              </div>
              <div class="address containerchildform1">
                <label for="address">Son adresse</label>
                <input type="text" name="addresscl" id="address" placeholder="Region District Dommune Fokotany Lot" autocomplete="off">
             </div>
          </div>
          <input type="submit" value="Ajouter" name="submitaddemploye">
      </form>



      
<?php
       if(isset($_POST['validateconnectcl'])){
        $emailcon=$_POST['emailcl'];
        $passwordcon=$_POST['passwordcl'];
        $person->connect($db,$emailcon,$passwordcon);
          //header('location:logedin.php');
    }




    if(isset($_POST['submitaddemploye'])){
      if(!empty($_POST['name'])&&!empty($_POST['cin'])&&!empty($_POST['dateofbirth'])&&
      !empty($_POST['contact'])&&!empty($_POST['fonction'])&&
      !empty($_POST['gender'])&&!empty($_POST['address'])){
          $fullnamercl=explode(' ',$_POST['name']);
          $namercl=$fullnamercl[0];
          $firstnamercl=$fullnamercl[1];
          $idrcl=$_POST['cin'];
          $birthrcl=$_POST['dateofbirth'];
          $contrcl=$_POST['contact'];
          $fonctionrcl=$_POST['fonction'];
          $genderrcl=$_POST['gender'];
                 //addresse
          $address=explode(' ',$_POST['address']);
          $lot=$address['4'];
          $commune=$address['2'];
          $fokotany=$address['3'];
          $district=$address['1'];
          $region=$address['0'];    
      
          

              if($firstnamercl=''){
                  ?>
              <script>
                  alert("veuillez mettre ras si vous n'avez pas de prenom ou separer le de votre nom");
                  formeployeadd.style.display="block";
                   employes.style.opacity="40%";
              </script>
              <?php
              }
              
              
              
            
              $genderrcl=$_POST['gender'];
              
              $req=$db->prepare("INSERT INTO employe VALUES(?,?,?,?,?,?)");
              $req->execute([$idrcl,$namercl,$firstnamercl,$birthrcl,$contrcl,$genderrcl]);
              
              if(isset($req)){
                  $addressperson->addtoaddresexactwithclient($db,$region,$district,$commune,$fokotany,$lot,$idrcl,'client');
              }
      }
      else{
        //header('location:dashboard.php');
          ?>

         <script>
         alert("Vous devez tous remplir");
          formeployeadd.style.display="block";
          employes.style.opacity="40%";
      </script>
      <?php
  }
}
  
?>