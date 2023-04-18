<?php

namespace walking;

class heavyKnight extends \warriorBase
{
    public function __construct($armor,$weaponMain,$weaponSide)
    {

        $itemArray=array($armor,$weaponMain);
        if($weaponSide!=null) {
            array_push($itemArray, $weaponSide);
        }
        parent::__construct(100, 50, 40, 30,$itemArray);
    }

}?>