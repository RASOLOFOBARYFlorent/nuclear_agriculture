<?php


require 'mainclass.php';
 
?>

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
        header('location:dashboard.php');
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
