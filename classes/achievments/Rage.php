<?php

namespace ultimates;

include_once './classes/achievments/achievmentBase.php';
class Rage extends achievmentBase
{
    public function __construct()
    {
        parent::__construct(1.3, "damage");
    }
}