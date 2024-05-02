<?php

require 'mainclass.php';
$_SESSION['address_client'][1];
 $email=$_SESSION['email'][1];
 $id=$_SESSION['client'][1];
 $birth=$_SESSION['datebirth'][1];
 $fkt=$_SESSION['address_client'][1];
$name=$_SESSION['nom'];
$contact=$_SESSION['contact'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylelogedin.css">
</head>
<body>
    <div class="links">
        <div class="left abovelinks">
            <a href="#">
                <h2>SoloNT</h2>
                
            </a>
        </div>
        <div class="right abovelinks" id="mainlinks">
            <ul>
                <li><a href="#" id="btncart"><img src="icones/cart2.svg" alt=""><span>Panier</span></a></li>
                <li><a href="#" id="btnnotification">
                    <p id="number"></p>
                    <img src="icones/alarm.svg" alt="">
                    <span>Notifications</span>
                        <!-- notification -->
                        <div class="containernotifications" id="mainnont">
                            <div class="not1" id="notifications">
                                <h1>Bonjour <span>Clients</span></h1>
                                <h1>Le Traceur radioactif que vous avez recomandés le 12-11-2023</h1>
                                <h1>est reporter à 22-12-2023</h1>
                                <h1>à cause de Preparation de materiel necessaire</h1>
                                <h1>Merci de votre comprehensions</h1>
                            </div>
                        </div>
                        <!-- end notification -->
                </a></li>
                
                <li><a href="#" id="btnprofile" class="a">
                    <img src="icones/user.svg" alt="">
                    <span>Profile</span>
                        <div class="profiles">
                            <h1><?=$name;?></h1><br>
                            <h1>Née:<?=$birth;?></h1><br>
                            <h1><?=$fkt;?></h1><br>
                            <h1><?=$email;?></h1><br>
                            <h1><?=$contact;?></h1><br>
                            <button id="modif">Modifier</button>
                            <button id="deconnecter">Se deconnecter</button>
                        </div>
                </a></li>
            </ul>
        </div>
    </div>

    <form action="modify.php" method="post" id="" class="forms1" style="display: none;">
        <h1 class="h1fomr">Changer votre profile</h1>
        <div class="container">
            <div class="nom containerchildform1">
                <label for="name">Nom et prenom</label>
                <input type="text" name="name" id="name" placeholder="Votre Prenom">
            </div>
            <div class="cin containerchildform1">
                <label for="cin">Votre CIN</label>
                <input type="number" name="cin" id="cin" placeholder="Votre CIN">
            </div>
            <div class="dateofbirth containerchildform1">
                <label for="dateofbirth">Date de naissance</label>
                <input type="date" name="dateofbirth" id="dateofbirth" >
            </div>
            <div class="contact containerchildform1">
                <label for="contact">Votre contact</label>
                <input type="number" name="contact" id="contact" placeholder="Votre contact">
            </div>
            <div class="email containerchildform1">
                <label for="email">Votre adresse email</label>
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
                <label for="password">Votre mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe">
            </div>
        </div>
        <input type="submit" value="Changer" name="submitmodifyclients">
    </form>
   <!-- end modification form of the clients -->
    <div class="slogan">
        Everythings maybe bad but we transform it into good and sustainable development
    </div>
    <!-- services -->
    <div class="containerservices">
    <?php
            @$resutlservice=$cart->showservice($db)->fetchAll();
            @$numberservice=$cart->showservice($db)->rowCount();
            for($i=0;$i<$numberservice;$i++){
            $idserv=$resutlservice[$i]['id_service'];
            $img=$resutlservice[$i]['image'];
            $nameservice=$resutlservice[$i]['nom_service'];
            $descriptionservice=$resutlservice[$i]['description'];
            $specificity=$resutlservice[$i]['specificite'];
            $price=$resutlservice[$i]['prix_ha'];

            ?>
        <div class="services">

            <img src="<?=$img?>" alt="">
            <h1><?=$nameservice?></h1>
            <h2><?=$specificity?></h2>
            <p><?=$descriptionservice?>
            </p>
            <div class="priceandcart">
                <h1 id="price">
                <?=$price?> €/Ha
                </h1>
                <a href="?idservtocart=<?=$idserv?>">Ajouter au panier</a>
            </div>

           
          </div>
      <?php
      }
      ?>

        <div class="btn">
            <button id="loadmore">Charger plus</button>
        </div>
    </div>

    <!--end services -->

    <!-- commandes -->
    <div class="containercom" id="commande" style="display: none;width: 100vw;">
        <div class="commande">
            <img src="image/ingenieur-biotechnologie-examinant-feuilles-plantes-pour-maladie-serre.jpg" alt="">
            <h1>Traceur radioactif</h1>
            <h2>Pour savoir le teneur en N,P,K dans le sol</h2>
            <p>Cette technologie d'agriculture nucleaire permet de favoriser la production de produit dans le champs
                et appliquer sur tout le type de semence. Avec cette technologie nucleaire, nous aurons la possibilité d'optimiser la quantité de
                NPK à utilise dans un champs d'agriculture mais avec une meilleure efficacité.
            </p>
            <div class="priceandcart">
                <h1 id="price">
                    Total 320€
                </h1>
                <a href="payer.php">Payer</a>
            </div>
        </div>
        
    </div>
        
    <!-- end commandes -->




    <!-- footer -->
    <div class="footer">
        <h1>Nos experts equipes</h1>
        <div class="footerabove">
            <div class="left ftab">
                <img src="image/img3.jpg" alt="">
                <div class="about">
                    <h2>Rasolofobary Florent</h2>
                     <h3>Specialiste en traceur radioacif et developpeur</h3>
                     <div class="linksftab">
                         <a href=""><img src="icones/facebook0.svg" alt=""></a>
                         <a href=""><img src="icones/linkedin1.svg" alt=""></a>
                         <a href="mailto:rasolofobaryflorent@gmail.com"><img src="icones/email1.svg" alt=""></a>
                     </div>
                </div>
            </div>
            <div class="middle ftab">
                <img src="image/img3.jpg" alt="">
                <div class="about">
                    <h2>Rasolofobary Florent</h2>
                    <h3>Specialiste en traceur radioacif et developpeur</h3>
                    <div class="linksftab">
                        <a href=""><img src="icones/facebook0.svg" alt=""></a>
                        <a href=""><img src="icones/linkedin1.svg" alt=""></a>
                        <a href="mailto:rasolofobaryflorent@gmail.com"><img src="icones/email1.svg" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="right ftab">
                <img src="image/img3.jpg" alt="">
                <div class="about">
                    <h2>Rasolofobary Florent</h2>
                    <h3>Specialiste en traceur radioacif et developpeur</h3>
                    <div class="linksftab">
                        <a href=""><img src="icones/facebook0.svg" alt=""></a>
                        <a href=""><img src="icones/linkedin1.svg" alt=""></a>
                        <a href="mailto:rasolofobaryflorent@gmail.com"><img src="icones/email1.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footerbottom" >
            <div class="ftleftb ftbottom">
                <h1>Liens</h1>
                <div class="internlinks">
                    <a href="">Connexion</a>
                    <a href="">Inscription</a>
                </div>   
            </div>
            <div class="ftmiddleb ftbottom" >
                <h1>Contactez-nous</h1>
                <div class="externlinks">
                    <a href=""><img src="icones/facebook0.svg" alt=""><span>Facebook</span></a>
                    <a href=""><img src="icones/email1.svg" alt=""><span>Email</span></a>
                    <a href=""><img src="icones/linkedin1.svg" alt=""><span>Linkedin</span></a>
                </div>  
            </div>
            <div class="ftrighttb ftbottom">
                <h1>Vos retours</h1>
                <form action="add.php" method="post" id="formfeedback">
                    <div class="container">
                        <div class="email formc">
                            <label for="email">Votre email
                            </label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="feedback formc">
                            <label for="feedback">Message</label>
                            <textarea name="feedback" id="feedback" cols="20" rows="2"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="Envoyer" name="validatefeedback">
                </form>
            </div>
        </div>
    </div>
    <!-- end footer -->


    <script>
        // load more 

        let current=3;

        let services=document.querySelectorAll('.services');
        if(services.length<3){
            let k=services.length;
            for(var i=0;i<k;i++){
               services[i].style.display="block";
               }
        }else{
            for(var i=0;i<current;i++){
               services[i].style.display="block";
         }
        }


        let loadmore=document.getElementById('loadmore');
        loadmore.onclick=()=>{
            for(var k=current;k<current+3;k++){
                   services[k].style.display="block";
            }
            current+=3;
            if(current>=services.length){
                loadmore.style.display="none";
            }
          }

        //   notification
        let not=document.querySelectorAll('#notifications');
        let number=document.getElementById('number');
        let n=not.length;
        if(not.length>=1){
            number.style.display="block";
            number.innerText=n;
        }else{
            number.style.display="none";
        }
        not.forEach(not=>{
            not.addEventListener('click',()=>{
                not.remove();
                n-=1;
                number.innerText=n;
                if(n==0){
                    number.style.display="none";
                }
            })
            
        })

        window.addEventListener('mousedown',()=>{
        // cart
        let cart=document.getElementById('btncart');
        let cartcont=document.getElementById('commande');
        cart.onclick=()=>{
            for(let m=0;m<services.length;m++){
                services[m].style.display="none";
            }
            loadmore.style.display="none";
            cartcont.style.display="inline-block";
        }  
        
        

            // profile
            let slogan=document.querySelector('.slogan');
            let contservice=document.querySelector('.containerservices');
            let formmodify=document.querySelector('.forms1');
            let btnmodif=document.getElementById('modif');
            btnmodif.onclick=()=>{
                formmodify.style.display="block";
                cartcont.style.opacity="40%";
                contservice.style.opacity="40%";
                slogan.style.opacity="40%";
            }

    let dec=document.querySelector('#deconnecter');
    dec.onclick=()=>{
        window.location.href="index.php";
    };
    });



    </script>
</body>
</html>