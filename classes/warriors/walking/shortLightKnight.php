<?php

namespace walking;

class shortLightKnight extends lightKnight
{

    public function __construct($armor,$weaponMain,$weaponSide)
    {

        $itemArray=array($armor,$weaponMain);
        if($weaponSide!=null) {
            array_push($itemArray, $weaponSide);
        }
        parent::__construct(100, 80, 30, 30,$itemArray);
    }
    public function recieveDamage($damage)
    {
        // TODO: Implement recieveDamage() method.
    }

    public function giveDamage($damage)
    {
        // TODO: Implement giveDamage() method.
    }
}?>