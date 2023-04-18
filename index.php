<?php

use squad\squad;
use ultimates\fractions\barbarians;
use ultimates\fractions\romans;
use walking\heavyKnight;
use weapon\sword;

include_once  './classes/squad/squad.php';
include_once './classes/warriors/horseman.php';
include_once './classes/warriors/walking/heavyKnight.php';
include_once './classes/items/armory/chainArmour.php';
include_once './classes/items/weapon/bow.php';
include_once './classes/items/weapon/sword.php';
include_once './classes/achievments/fractions/romans.php';
include_once './classes/achievments/fractions/barbarians.php';



$squad1 = new squad(new romans(),array(
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new heavyKnight(new \armory\chainArmour(),new sword(),new sword() ),
    new heavyKnight(new \armory\chainArmour(),new sword(),new sword() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() )
));
$squad2 = new squad(new barbarians(),array(
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new heavyKnight(new \armory\chainArmour(),new sword(),new sword() ),
    new heavyKnight(new \armory\chainArmour(),new sword(),new sword() ),
    new heavyKnight(new \armory\chainArmour(),new sword(),new sword() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new heavyKnight(new \armory\chainArmour(),new sword(),new sword() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() ),
    new horseman(new \armory\chainArmour(),new \weapon\bow() )
));


while ($squad2->attackSquad($squad1)!=true){

}

echo '<p>Winner squad: </p>';
if($squad1->getSquad()==="squad is too small"){
    foreach ($squad2->getSquad() as $unit){
        echo $unit."<br><br>";
    }
}else{
    foreach ($squad1->getSquad() as $unit){
        echo $unit."<br><br>";
    }
}





?>