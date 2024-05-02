<?php

class Functions{


    public function getfunctionandadd($db,$function,$idemploye){
        $req1=$db->prepare("INSERT INTO fonction VALUES('',?,?)");
        $req1->execute([$function,$idemploye]);
    }
    
}


?>