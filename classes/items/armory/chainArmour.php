<?php

namespace armory;
include_once __DIR__.'/midArmour.php';
class chainArmour extends  midArmour
{

    public function __construct()
    {
        parent::__construct(0, -30, 0, 50);
    }
}

?>