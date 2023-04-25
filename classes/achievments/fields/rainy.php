<?php

namespace ultimates\fields;
use ultimates\achievmentBase;

include_once './classes/achievments/achievmentBase.php';
class rainy extends achievmentBase
{

    public function __construct()
    {
        parent::__construct(0.95, "speed");
    }
}