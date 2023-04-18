<?php

namespace ultimates\fractions;

use ultimates\achievmentBase;

include_once './classes/achievments/achievmentBase.php';
class romans extends achievmentBase
{
    public function getName()
    {
        return "roman";
    }
    public function __construct()
    {
        parent::__construct(1.3, "def");
    }
}
?>