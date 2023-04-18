<?php

namespace ultimates;

include_once './classes/achievments/achievmentBase.php';
class warShout extends achievmentBase
{
    public function __construct()
    {
        parent::__construct(1.5, "speed");
    }
}