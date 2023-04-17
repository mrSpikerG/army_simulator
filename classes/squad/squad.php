<?php

namespace squad;

use function array_push;
use function array_splice;
use function count;

class squad
{
    private $squad;
    private $minsquad;
    private $maxsquad;

    public function __construct($squad = null)
    {
        $this->minsquad=5;
        $this->maxsquad=25;
        if ($squad === null) {
            $this->squad=array();
            return;
        }
        $this->squad = $squad;
    }

    /**
     * @return mixed
     */
    public function getSquad(): mixed
    {
        if (count($this->squad) < $this->minsquad) {
            return "squad is too small";
        }
        if (count($this->squad) > $this->maxsquad) {
            return "squad is too big";
        }

        return $this->squad;
    }

    public function addToSquad($warrior)
    {
        if (count($this->squad) > $this->maxsquad) {
            return "squad is too big";
        }
        array_push($this->squad,$warrior);
        return true;
    }

    public function removeFromSquad($index)
    {
        if (count($this->squad) < $this->minsquad) {
            return "squad is too small";
        }
        array_splice($this->squad,$index,1);
        return true;
    }
}