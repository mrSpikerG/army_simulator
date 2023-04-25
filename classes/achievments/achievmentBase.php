<?php

namespace ultimates;

abstract class achievmentBase
{

    private $buf;
    private $attr;

    public function __construct($buf,$attr)
    {
        $this->attr=$attr;
        $this->buf=$buf;
    }

    /**
     * @return mixed
     */
    public function getAttr()
    {
        return $this->attr;
    }

    /**
     * @return mixed
     */
    public function getBuf()
    {
        return $this->buf;
    }
}

?>