<?php

namespace ultimates\fractions;

use ultimates\achievmentBase;

include_once './classes/achievments/achievmentBase.php';
class france extends achievmentBase
{
    public function getName()
    {
        return "france";
    }

    public function __construct()
    {
        parent::__construct(1.5, "speed");
    }
}
?>