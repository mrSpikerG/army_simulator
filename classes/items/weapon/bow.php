<?php

namespace weapon;
include_once __DIR__.'/../../itemBufBase.php';
class bow extends \itemBufBase
{
    public function __construct()
    {
        parent::__construct(0, -20, 80, 0);
    }
}

?>