<?php

namespace ultimates\fractions;

use ultimates\achievmentBase;

include_once './classes/achievments/achievmentBase.php';
class italians extends achievmentBase
{
    public function getName()
    {
        return "italians";
    }
    public function __construct()
    {
        parent::__construct(1.2, "hp");
    }
}
?>