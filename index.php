<?php
include_once './classes/warriors/horseman.php';
include_once './classes/items/armory/chainArmour.php';
include_once  './classes/items/weapon/bow.php';

$unit1 = new horseman(new \armory\chainArmour(),new \weapon\bow() );
echo $unit1;


?>