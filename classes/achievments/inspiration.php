<?php

namespace ultimates;

include_once './classes/achievments/achievmentBase.php';
class inspiration extends achievmentBase
{

    public function __construct()
    {
        parent::__construct(1.1, "hp");
    }
}