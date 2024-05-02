<?php
  require 'mainclass.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accceul</title>
    <link rel="stylesheet" href="style/styleclient.css">
</head>
<body>

    <div class="links">
        <div class="left abovelinks">
            <a href="#">
                <h2>SoloNT</h2>
                
            </a>
            <img src="icones/menu1.svg" alt="" id="menuabove">
        </div>
        <div class="right abovelinks" id="mainlinks">
            <ul>
                <li><a href="#" id="btncontact">Contactez-nous</a></li>
                <li><a href="#" id="btninscription">Inscription</a></li>
                <li><a href="#" id="btnconnexion">Connexions</a></li>
            </ul>
        </div>
    </div>
    <div class="main" id="main">
        <div class="explanation">
            <p>The most importants beneficials of <span style="color: blue;">SOLO NUCLEAR TECHNOLOGY</span>
                <br>
                1. "Nuclear agriculture utilizes radiation to induce beneficial mutations in crops, enhancing their traits such as yield, pest resistance, and nutritional value, contributing to improved crop productivity and food security."
<br>
                2. "By applying nuclear techniques, agricultural scientists can develop new crop varieties that are more resilient to climate change, helping to ensure stable agricultural yields in the face of evolving environmental conditions."
                <br>
                3. "The adoption of nuclear agriculture leads to the production of superior plant varieties with enhanced drought tolerance and disease resistance, ultimately reducing the need for chemical pesticides and promoting sustainable farming practices."
                <br>
                
                4. "Nuclear agricultural methods play a crucial role in soil conservation and land management, as they enable the creation of crops that require fewer resources, while simultaneously reducing the impact of agriculture on the environment, marking a significant step forward in sustainable farming practices."
                <br>              
            </p>
        </div>
        <div class="slogan">
            Everythings maybe bad but we transform it into good and sustainable development
        </div>
    </div>
    

    <!-- inscription -->
    
    <!-- inscription -->
    <form action="#" method="POST" id="clientinscription" class="form">
        <h1 class="h1fomr">S'inscrire pour beneficier nos offres</h1>
        <div class="container">
            <div class="nom containerchildform1">
                <label for="name">Nom et prenom</label>
                <input type="text" name="namecl" id="name" placeholder="Votre Nom Prenom" autocomplete="off">
            </div>
            <div class="cin containerchildform1">
                <label for="cin">Votre CIN</label>
                <input type="number" name="cincl" id="cin" placeholder="Votre CIN" autocomplete="off">
            </div>
            <div class="dateofbirth containerchildform1">
                <label for="dateofbirth">Date de naissance</label>
                <input type="date" name="dateofbirthcl" id="dateofbirth"  autocomplete="off">
            </div>
            <div class="contact containerchildform1">
                <label for="contact">Votre contact</label>
                <input type="number" name="contactcl" id="contact" placeholder="Votre contact" autocomplete="off">
            </div>
            <div class="email containerchildform1">
                <label for="email">Votre adresse email</label>
                <input type="email" name="emailcl" id="email" placeholder="Votre email" autocomplete="off">
            </div>
            <div class="password containerchildform1">
                <label for="password">Votre mot de passe</label>
                <input type="password" name="passwordcl" id="password" placeholder="Votre mot de passe" autocomplete="off">
            </div>
            <div class="address containerchildform1">
                <label for="address">Votre Region jusqu'à votre Lot de maison</label>
                <input type="text" name="addresscl" id="address" placeholder="Veuillez saisir tous correctement" autocomplete="off">
            </div>
            <div class="gender containerchildform1">
                <label for="gender">Sexe</label>
                <select name="gendercl" id="gender" autocomplete="off">
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                </select>
            </div>

        </div>
        <input type="submit" value="S'incrire" name="validateregistercl">

    </form>
<?php 
        // inscription
      if(isset($_POST['validateregistercl'])){
            if(!empty($_POST['namecl'])&&!empty($_POST['cincl'])&&!empty($_POST['dateofbirthcl'])&&
            !empty($_POST['contactcl'])&&!empty($_POST['emailcl'])&&!empty($_POST['passwordcl'])&&
            !empty($_POST['gendercl'])&&!empty($_POST['addresscl'])){
                $fullnamercl=explode(' ',$_POST['namecl']);
                $namercl=$fullnamercl[0];
                $firstnamercl=$fullnamercl[1];
                $idrcl=$_POST['cincl'];
                $birthrcl=$_POST['dateofbirthcl'];
                $contrcl=$_POST['contactcl'];
                $emailrcl=$_POST['emailcl'];
                $passwordrcl=$_POST['passwordcl'];
                $genderrcl=$_POST['gendercl'];
                       //addresse
                $address=explode(' ',$_POST['addresscl']);
                $lot=$address['4'];
                $commune=$address['2'];
                $fokotany=$address['3'];
                $district=$address['1'];
                $region=$address['0'];    
            
                
                    // end address
                $re0=$db->prepare('SELECT * FROM client WHERE email=?');
                $re0->execute([$emailrcl]);
                $res=$re0->fetchAll();
                if(count($res)>0){ ?>

                   <script>
                                alert('email deja utilisé');
                                clientinscription.style.display="block";
                                main.style.opacity="40%";
                   </script>
                 <?php }
                else{
                    if($firstnamercl=''){
                        ?>
                    <script>
                        alert("veuillez mettre ras si vous n'avez pas de prenom ou separer le de votre nom");
                        clientinscription.style.display="block";
                         main.style.opacity="40%";
                    </script>
                    <?php
                    }
                    }
                    
                    
                    $passwordrcl=$_POST['passwordcl'];
                    $genderrcl=$_POST['gendercl'];
                    $req=$db->prepare("INSERT INTO client VALUES(?,?,?,?,?,?,?,?,'')");
                    $req->execute([$idrcl,$namercl,$firstnamercl,$emailrcl,$birthrcl,$contrcl,$genderrcl,$passwordrcl]);
                    if(isset($req)){
                        $addressperson->addtoaddresexactwithclient($db,$region,$district,$commune,$fokotany,$lot,$idrcl,'client');
                    }
            }
            else{
                ?>

               <script>
               alert("Vous devez tous remplir");
                clientinscription.style.display="block";
                main.style.opacity="40%";
            </script>
            <?php
        }
    }
        
      ?>
<!-- end inscriptions -->
    <!-- connexion -->

    <form action="add.php" method="POST" id="clientconnexion" class="form">
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
    <script src="script/scriptclient.js"></script>
</body>
</html>