<?php

namespace ultimates\fractions;

use ultimates\achievmentBase;

include_once './classes/achievments/achievmentBase.php';
class barbarians extends achievmentBase
{
    public function getName()
    {
        return "barbarian";
    }
    public function __construct()
    {
        parent::__construct(1.4, "damage");
    }
}
?>