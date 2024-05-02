<?php
require 'database.php';
function loadclass($nameclass){
    require $nameclass.'.php';
}

spl_autoload_register('loadclass');

$cart=new Cartservice();
$person=new Person();
$payment=new Payment();
$functions=new Functions();
$addressperson=new Address();


?>