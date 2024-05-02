<?php



class Address{
    public $nom;
    //data is the information to add to the address
    public $data;


    public function addtoaddressregion($db,$nom,$data){

        $req0=$db->prepare("SELECT * FROM $nom WHERE nom_$nom=?");
        $req0->execute([$data]);
        $dataexist=$req0->rowCount();
        if($dataexist>0){
            echo 'efa misy ao';
        }else{
            $req=$db->prepare("INSERT INTO $nom VALUES('',?)");
            $req->execute([$data]);
            echo 'vita soa amantsara';
        }
    }


    public function addtoaddressdistrict($db,$nameregion,$namedistrict){
        $req0=$db->prepare("SELECT * FROM region WHERE nom_region=?");
        $req0->execute([$nameregion]);
        $dataexist=$req0->rowCount();
        if($dataexist>0){
            $res=$req0->fetch();
            $id_region=$res['id_region'];
            $req=$db->prepare("INSERT INTO district VALUES('',?,?)");
            $req->execute([$namedistrict,$id_region]);
        }else{
            $req=$db->prepare("INSERT INTO region VALUES('',?)");
            $req->execute([$nameregion]);
            $req0=$db->prepare("SELECT * FROM region WHERE nom_region=?");
            $req0->execute([$nameregion]);
            $res=$req0->fetch();
            $id_region=$res['id_region'];
            $req=$db->prepare("INSERT INTO district VALUES('',?,?)");
            $req->execute([$namedistrict,$id_region]);
        }
    }
    public function addtoaddresscommune($db,$region,$namedistrict,$namecommune){
        $req0=$db->prepare("SELECT * FROM district WHERE nom_district=?");
        $req0->execute([$namedistrict]);
        $dataexist=$req0->rowCount();
        if($dataexist>0){
            $res=$req0->fetch();
            $id_district=$res['id_district'];
            $req=$db->prepare("INSERT INTO commune VALUES('',?,?)");
            $req->execute([$namecommune,$id_district]);
        }else{
            $this->addtoaddressdistrict($db,$region,$namedistrict);
            $req0=$db->prepare("SELECT * FROM district WHERE nom_district=?");
            $req0->execute([$namedistrict]);
            $res=$req0->fetch();
            $id_district=$res['id_district'];
            $req=$db->prepare("INSERT INTO commune VALUES('',?,?)");
            $req->execute([$namecommune,$id_district]);

        }
    }

    public function addaddresstofokotany($db,$region,$namedistrict,$namecommune,$fokotany){
        $req0=$db->prepare("SELECT * FROM commune WHERE nom_commune=?");
        $req0->execute([$namecommune]);
        $dataexist=$req0->rowCount();
        if($dataexist>0){
            $res=$req0->fetch();
            $id_commune=$res['id_commune'];
            $req=$db->prepare("INSERT INTO fokotany VALUES('',?,?)");
            $req->execute([$fokotany,$id_commune]);
        }else{
            $this->addtoaddresscommune($db,$region,$namedistrict,$namecommune);
            $req0=$db->prepare("SELECT * FROM commune WHERE nom_commune=?");
            $req0->execute([$namecommune]);
            $res=$req0->fetch();
            $id_commune=$res['id_commune'];
            $req=$db->prepare("INSERT INTO fokotany VALUES('',?,?)");
            $req->execute([$fokotany,$id_commune]);
        }
    }


    public function addtoaddresexactwithclient($db,$region,$namedistrict,$namecommune,$fokotany,$lot,$idclient,$insertto){
        $req0=$db->prepare("SELECT * FROM fokotany WHERE nom_fokotany=?");
        $req0->execute([$fokotany]);
        $dataexist=$req0->rowCount();
        if($dataexist>0){
            $res=$req0->fetch();
            $id_fokotany=$res['id'];
            $req=$db->prepare("INSERT INTO adresse_exact_$insertto VALUES('',?,?,?)");
            $req->execute([$lot,$id_fokotany,$idclient]);
        }else{
            $this->addaddresstofokotany($db,$region,$namedistrict,$namecommune,$fokotany);
            $req0=$db->prepare("SELECT * FROM fokotany WHERE nom_fokotany=?");
            $req0->execute([$fokotany]);
            $res=$req0->fetch();
            $id_fokotany=$res['id'];
            $req=$db->prepare("INSERT INTO adresse_exact_$insertto VALUES('',?,?,?)");
            $req->execute([$lot,$id_fokotany,$idclient]);
        }
    }
    public function showaddress($db,$id,$whoseaddress,$who){
        
        $req=$db->prepare("SELECT t2.lot_maison,t1.nom_fokotany FROM fokotany AS t1 INNER JOIN
     $whoseaddress AS t2 ON t2.id_fokotany=t1.id WHERE id_$who=?");
        $req->execute([$id]);

        return $req;
    }
}

?>