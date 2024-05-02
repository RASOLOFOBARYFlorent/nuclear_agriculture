<?php

$host="localhost";
$user="root";
$password="";
$database="solo_agro_nucleaire";
$options=[
    PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8',
    PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
];
try{
    $db=new PDO("mysql:host=".$host.";dbname=".$database,$user,$password,$options);
    
}catch(Exception $e){
    echo $e;
}




?>