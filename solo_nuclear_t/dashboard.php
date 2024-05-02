<?php
  require 'mainclass.php';
  //for the payment notification
    $payment->notifyadmin($db);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/dashbord.css">
</head>
<body>

    <!-- leftside of the website -->
    <div class="leftside">
        <div class="profileleft">
            <img src="image/img3.jpg" alt="" class="img">
            <h5>Rasolofobary Florent</h5>
        </div>
        <div class="links">
            <ul>
                <li><a href="#" id="dashboard0"><img src="icones/home.svg" alt="" class="dashboard"><span>Dashboard</span></a></li>
                <li><a href="#" id="clients0"><img src="icones/user.svg" alt="" class="user"><span>Clients</span></a></li>
                <li><a href="#" id="paiments0"><img src="icones/paypal.svg" alt="" class="paypal"><span>Paiments</span></a></li>
                <li><a href="#" id="employes0"><img src="icones/phone.svg" alt=""><span>Employes</span></a></li>
                <li><a href="#" id="services0"><img src="icones/car.svg" alt=""><span>Services</span></a></li>
                <li><a href="#" id="missions0"><img src="icones/event1.svg" alt=""><span>Missions</span></a></li>
            </ul>
        </div>
    </div>

<!-- end left side of website -->

<!-- main container  -->
<div class="main">
    <!-- links -->
    <div class="links">
        <h2 id="changeeachclick">Dashboard</h2>
        <ul>
            
            <li><a href="#" id="notifications">
                <p id="numbertodaypayment"><?=$_SESSION['todaypayment'][1];?></p>
                <div class="containernotification">
                    <img src="icones/alarm.svg" alt="" class="notification">
                    <div class="notifications" >
                        <h1>Issu</h1>
                        <h2>Rasolofobary Florent</h2>
                        <h3>Au total 300$</h3>
                    </div>
                </div>
            </a></li>
            <li><a href="">
                <div class="profilecontent">
                    <img src="image/img3.jpg" alt="" class="profile">
                    <div class="profiles">
                         <h2>Rasolofobary Florent</h2>
                         <h3>rasolofobaryflorent@gmail.com</h3>
                    </div>
                </div>
            </a></li>
        </ul>
    </div>
    <!-- end links -->
<!-- dashboard -->
    <div class="container" id="dashboard">
        <div class="top">
            <div class="left">
                <div class="team topcontent">
                    <img src="icones/user.svg" alt="">
                    <div class="right ">
                        <h1>Teams</h1>
                        <h2>104</h2>
                    </div>
                </div>
                <div class="clientnumber topcontent">
                    <img src="icones/user.svg" alt="">
                    <div class="right">
                        <h1>Clients</h1>
                        <h2>104</h2>
                    </div>
                </div>               
            </div>
            <div class="right">
                <div class="subscribes topcontent">
                    <img src="icones/user.svg" alt="">
                    <div class="right">
                        <h1>Souscriptions</h1>
                        <h2>104</h2>
                    </div>
                </div>
                <div class="currentmission topcontent">
                    <img src="icones/user.svg" alt="">
                    <div class="right">
                        <h1>Missions</h1>
                        <h2>104</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="recentpayment bottomcontainer">
                <h1>Paiments recents</h1>
                <h2 class="h2">Les 10 derniers paiments</h2>
                <div class="paiment bottomcont">
                    <h1>rasolofobary florent</h1>
                    <h2>Traceur nucléaire</h2>
                </div>
            </div>
            <div class="recentclient bottomcontainer">
                <h1>Clients recents</h1>
                <h2 class="h2">Les 10 derniers clienst</h2>
                <div class="client bottomcont">
                    <h1>rasolofobary florent</h1>
                    <h2>Vakinankaratra</h2>
                </div>
                <div class="client bottomcont">
                    <h1>rasolofobary florent</h1>
                    <h2>Vakinankaratra</h2>
                </div>
                <div class="client bottomcont">
                    <h1>rasolofobary florent</h1>
                    <h2>Vakinankaratra</h2>
                </div>
                <div class="client bottomcont">
                    <h1>rasolofobary florent</h1>
                    <h2>Vakinankaratra</h2>
                </div>
                <div class="client bottomcont">
                    <h1>rasolofobary florent</h1>
                    <h2>Vakinankaratra</h2>
                </div>

            </div>
        </div>
    </div>
    <!-- end dashboard -->
    <!-- clients -->

    <div class="clients withtable" id="clients">
        <h1 class="title">
            Tous les clients
        </h1>
        <table>
            <thead>
                <tr class="tr">
                <td>Nom</td>
                <td>Prenom</td>
                <td>
                    Adresse
                </td>
                <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php
                $person=new Person();
                $numbercl=$person->showallperson($db)->rowCount();
                if($numbercl==0){
                    $_SESSION['message'][]='Pas de client inscrit';
                }
                else{
                $result=$person->showallperson($db)->fetchAll();

                
                for($k=0;$k<$numbercl;$k++){
                    
                
        
            ?>
                <tr>
                    <td><?=$nom=$result[$k]['nom']; ?></td>
                    <td><?=$pren=$result[$k]['prenom']; ?></td>
                    <td> <?=$adresse=$result[$k]['lot_maison']?></td>
                    <td><a href="delete.php?idclient=<?=$adresse=$result[$k]['id_client']?>">
                        <img src="icones/cancelx.svg" alt="">
                        <span>Supprimer</span> 
                    </a>
                    <a href="#?idclient=<?=$adresse=$result[$k]['id_client']?>" id="modifyclient">
                        <img src="image/pen.png" alt="">
                        <span>Modifier</span>
                    </a>
                </td>
                </tr>
                <?php }}?>
            </tbody>

        </table>





               <!-- modification form of the clients -->
<?php
@$id=$_GET['idclient'];
$data=['nom','prenom','email','date_birth','contact','sexe','passwordclient,image'];
if(isset($_POST['submitmodifyclients'])){
    $fullnamercl=explode(' ',$_POST['name']);
    $namercl=$fullnamercl[0];
    $firstnamercl=$fullnamercl[1];
    $image=$_POST['cin'];
    $birthrcl=$_POST['dateofbirth'];
    $contrcl=$_POST['contact'];
    $emailrcl=$_POST['email'];
    $passwordrcl=$_POST['password'];
    $genderrcl=$_POST['gender'];
    $datamodify=[$numbercl,$firstnamercl,$emailrcl,$birthrcl,$contrcl,$genderrcl,$passwordrcl,$image];
    $person->modifyperson($db,$data,$datamodify,'client',$id);
}

?>
       <form action="modify.php" method="post" id="formclientmd" class="forms1 formclients">
        <h1 class="h1fomr">Changer un client</h1>
        <div class="container">
            <div class="nom containerchildform1">
                <label for="name">Nom et prenom</label>
                <input type="text" name="name" id="name" placeholder="Votre Nom et Prenom">
            </div>
            <div class="cin containerchildform1">
                <label for="cin">Son image</label>
                <input type="file" name="cin" id="cin" placeholder="Votre CIN">
            </div>
            <div class="dateofbirth containerchildform1">
                <label for="dateofbirth">Date de naissance</label>
                <input type="date" name="dateofbirth" id="dateofbirth" >
            </div>
            <div class="contact containerchildform1">
                <label for="contact">Son contact</label>
                <input type="number" name="contact" id="contact" placeholder="Votre contact">
            </div>
            <div class="email containerchildform1">
                <label for="email">Son adresse email</label>
                <input type="email" name="email" id="email" placeholder="Votre email">
            </div>
            <div class="gender containerchildform1">
                <label for="gender">Sexe</label>
                <select name="gender" id="gender">
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                </select>
            </div>
            <div class="fonction containerchildform1">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe">
            </div>
        </div>
        <input type="submit" value="Valider" name="submitmodifyclients">
    </form>
   <!-- end modification form of the clients -->
    </div>
    <!-- end clients -->

    <!-- paiment -->



    <div class="paiments withtable" id="paiments">
        <h1 class="title">
            Tous les paiments
        </h1>
        <table>
            <thead>
                <tr class="tr">
                <td>Nom</td>
                <td>Prenom</td>
                <td>
                    <h5>Adresse</h5>
                </td>
                <td>Date de paiment</td>
                <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php

            $result=$payment->showpayment($db)->fetchAll();
            foreach($result as $reponse){
                $reponse['date_paiment'];
                $id=$reponse['id_client'];
                $rc2=$db->prepare("SELECT *FROM client WHERE id_client=?");
                $rc2->execute([$id]);
                $resultrc2=$rc2->fetch();
                $address=new Address();
                $resultaddress=$address->showaddress($db,$id,'adresse_exact_client','client')->fetch();
                $rc2=$db->prepare("SELECT *FROM client WHERE id_client=?");
                $rc2->execute([$id]);
                $resultrc2=$rc2->fetch();
               
            ?>
                <tr>
                    <td><?=$resultrc2['nom'];?></td>
                    <td><?=$resultrc2['prenom'];?></td>
                    <td><?=$resultaddress['lot_maison'].' fokotany '.$resultaddress['nom_fokotany'];?></td>
                    <td><?=$reponse['date_paiment'];?></td>
                    <td><a href="delete.php?idpaymdel=<">
                        <img src="icones/cancelx.svg" alt="">
                        <span>Supprimer</span>
                    </a></td>
                </tr>

                <?php
            }
            ?>
            </tbody>

        </table>

    </div>

    <!-- end paiment -->

    <!-- employes -->
    
    <div class="employes withtable" id="employes">
        <h1 class="title">
            Tous les employes
        </h1>
        <table>
            <thead>
                <tr class="tr">
                <td>Nom</td>
                <td>Prenom</td>
                <td>
                    Fonction
                </td>
                <td>Action</td>
                </tr>
            </thead>
            <tbody>
            <?php
            $res=$person->getallemployewithfunction($db)->fetchAll();
            $n=$person->getallemployewithfunction($db)->rowCount();

            for($k=0;$k<$n;$k++){
                $nomem=$res[$k]['nom_emp'];
                $prenomem=$res[$k]['prenom_emp'];
                $fonctem=$res[$k]['nom'];
                $idemp=$res[$k]['id_employe'];
            
            ?>
                <tr>
                    <td><?=$nomem?></td>
                    <td><?=$prenomem?></td>
                    <td><?=$fonctem?> </td>
                    <td><a href="delete.php?id=<?=$idemp?>">
                        <img src="icones/cancelx.svg" alt="">
                    </a>
                    <a href="#??id=<?=$idemp?>" id="modifyemploye">
                        <img src="image/pen.png" alt="">
                    </a>

                </td>
                </tr>
                <?php
                 }?>

                 <tr>
                     <td><a href="#" id="addemploye">
                        <img src="icones/add+.svg" alt="">
                    </a></td>
                 </tr>
            </tbody>

        </table>



       <!-- modification form of the employe -->
       <form action="modify.php" method="post" id="formemployemd" class="forms">
          <h1 class="h1fomr">Changer le nom du travailleur</h1>
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
          <input type="submit" value="Valider" name="submitmodifyemploye">
      </form>
     <!-- end modification form of the employe -->



                      <!-- add form of the employe -->

 
       <form action="add.php" method="post" id="formemployeadd" class="forms">
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
      <!-- end add form of the employe -->

    </div>
    <!-- end employes -->

    
        <!-- services -->
        <div class="services withtable" id="services">
            <h1>
                Tous les services disponibles
            </h1>
            <table>
                <thead>
                    <tr class="tr">
                    <td>Nom</td>
                    <td>Descriptions</td>
                    <td>
                        Specialites
                    </td>
                    <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <?php
            $res2=$cart->showservice($db)->fetchAll();
            $nserv=$cart->showservice($db)->rowCount();

            for($k=0;$k<$nserv;$k++){
                $nomserv=$res2[$k]['nom_service'];
                $descrserv=$res2[$k]['description'];
                $specificiteserv=$res2[$k]['specificite'];
                $idserv=$res2[$k]['id_service'];
            
            ?>
                <tr>
                    <td><?=$nomserv?></td>
                    <td><?=$descrserv?></td>
                    <td><?=$specificiteserv?> </td>
                    <td><a href="delete.php?idserv=<?=$idserv?>">
                        <img src="icones/cancelx.svg" alt="">
                    </a>
                    <a href="#?idserv=<?=$idserv?>" id="modifyservice">
                        <img src="image/pen.png" alt="">
                    </a>
                    <a href="#" id="addservice">
                        <img src="icones/add+.svg" alt="">
                    </a>
                </td>
                </tr>
                <?php
                 }?>
                </tbody>
    
            </table>
  
                 <!-- modification form of the service -->
                 <form action="modify.php" method="post" id="formservicemd" class="forms">
                     <h1 class="h1fomr">Changer le nom du service</h1>
                     <div class="container">
                         <div class="nom containerchildform1">
                             <label for="name">changer le service</label>
                             <input type="text" name="name" id="name" value="<?php ?>">
                         </div>
                         <div class="description containerchildform1">
                             <label for="description">changer la description</label>
                             <textarea name="description" id="description" cols="30" rows="10"></textarea>
                         </div>
                         <div class="nom containerchildform1">
                             <label for="specificity">changer la specificité du service</label>
                             <input type="text" name="specificity" id="specificity" value="<?php ?>">
                         </div>
                         <div class="image containerchildform1">
                             <label for="image">changer l'image de service</label>
                             <input type="file" name="image" id="image">
                         </div>
                     </div>
                     <input type="submit" value="Valider" name="submitmodifyservice">
                 </form>
                <!-- end modification form of the service -->

                 <!-- add form of the service -->
                <form action="add.php" method="post" id="formserviceadd" class="forms1">
                    <h1 class="h1fomr">Ajouter un nouveau service</h1>
                    <div class="container">
                        <div class="nom containerchildform1">
                            <label for="name">Nom du nouveau service</label>
                            <input type="text" name="name" id="name" value="<?php ?>">
                        </div>
                        <div class="description containerchildform1">
                            <label for="description">Description du nouveau service</label>
                            <textarea name="description" id="description" cols="30" rows="6"></textarea>
                        </div>
                        <div class="nom containerchildform1">
                            <label for="specificity">Specificité du service</label>
                            <input type="text" name="specificity" id="specificity" value="<?php ?>">
                        </div>
                        <div class="price containerchildform1">
                            <label for="specificity">Prix par hectare</label>
                            <input type="number" name="price" id="specificity" value="<?php ?>">
                        </div>
                        <div class="image containerchildform1">
                             <label for="image">Image de service</label>
                             <input type="file" name="image" id="image">
                         </div>
                    </div>
                    <input type="submit" value="Valider" name="modifyservice">
                </form>

                 <!-- end add form of the service -->
        </div>
        <!-- end services -->
        

    <!-- missions -->
    <div class="missions withtable" id="missions">
        <h1>
            Toutes les missions en cours
        </h1>
        <table>
            <thead>
                <tr class="tr">
                <td>Nom</td>
                <td>Lieu</td>
                <td>
                    Nombres
                </td>
                <td>Date</td>
                <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Traceur nucléaire</td>
                    <td> Fokotany Marotsiraka, commune Mahaiza, District Betafo, Region Vakinankaratra
                    </td>
                    <td>1</td>
                    <td>07-12-2023</td>
                    <td>
                    <a href="#" id="modifymission">
                        <img src="image/pen.png" alt="">
                    </a>
                </td>
                </tr>
            </tbody>

        </table>
        <div class="pagination">
            Pagination
        </div>
        <!-- modification form of the misssion -->
        <form action="modify.php" method="post" id="formmission" class="formm">
            <h1>Reporter la Titre de la mission</h1>
            <h2>Lieu de la mission</h2>
            <div class="startdate datemission">
                <input type="date" name="" id="" value="<?php echo date('-l-M-y');?>">
                <h5>Reporter le debut  à </h5>
                <input type="date" name="startdate" id="">
            </div>
            <div class="enddate datemission">
                <input type="date" name="" id="" value="<?php ?>">
                <h5>Reporter la fin à</h5>
                <input type="date" name="enddate" id="">
            </div>
            <input type="submit" value="Valider" name="submitmodifymission">
        </form>
        <!-- end modification form of the misssion -->
    </div>
    <!-- end missions -->

</div>

<!-- end of main container  -->



<script src="script/script.js">
</script>

</body>
</html>

<?php

include 'database.php';
$req128=$db->prepare("SELECT * FROM client WHERE EXISTS (SELECT id_client FROM adresse_exact_client WHERE id_fokotany='11')");
$req128->execute();
var_dump($req128->fetchAll());


?>