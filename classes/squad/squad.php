<?php

namespace squad;

use ultimates\inspiration;
use ultimates\Rage;
use ultimates\warShout;
use function array_push;
use function array_splice;
use function count;
use function max;
use function rand;
use function var_dump;

include_once './classes/achievments/inspiration.php';
include_once './classes/achievments/Rage.php';
include_once './classes/achievments/warShout.php';
include_once './classes/achievments/achievmentBase.php';

class squad
{
    private $squad;
    private $minsquad;
    private $maxsquad;
    private $achievments;
    private $fraction;

    public function __construct($fraction, $squad = null)
    {
        $this->fraction = $fraction;
        $this->setAchievments(array(new inspiration(), new Rage(), new warShout()));

        $this->minsquad = 5;
        $this->maxsquad = 25;
        if ($squad === null) {
            $this->squad = array();
            return;
        }

        $this->squad = $squad;
        foreach ($this->squad as $unit) {
            $unit->addBuf($this->fraction);
            $unit->addBuf($this->achievments);
        }
    }

    /**
     * @return mixed
     */
    public function getFraction()
    {
        return $this->fraction;
    }

    public function setAchievments($achievments)
    {
        $this->achievments = $achievments;
    }

    public function randomAchievment()
    {
        foreach ($this->squad as $unit) {
            $unit->removeBuf($this->achievments);
        }
        $arr = array(new inspiration(), new Rage(), new warShout());
        $this->achievments = $arr[rand(0, 2)];
        foreach ($this->squad as $unit) {
            $unit->addBuf($this->achievments);
        }

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

    public function attackSquad($squad)
    {



        $friends = count($this->squad);
        $enemy = count($squad->getSquad());
        $max = max($friends, $enemy);
        for ($i = 0, $e = 0, $f = 0; $i < $max; $i++) {

            if ($e == count($squad->getSquad())) {
                $e = 0;
            }
            if ($f == count($this->squad)) {
                $f = 0;
            }


            if($this->checkForWin($squad)){
                return true;
            }
            $curFriend = $this->squad[$f];
            $curEnemy = $squad->getSquad()[$e];


            if (rand(0, 1)) {
                $dmg = $this->squad[$f]->giveDamage();
                 echo 'friend attack with ' . $dmg . " damage<br>";
                $squad->getSquad()[$e]->recieveDamage($dmg);

                if (!$squad->checkIfDeathOne($e)) {


                    if($this->checkForWin($squad)){
                        return true;
                    }
                    if ($e >= count($squad->getSquad())-1) {
                        $e = 0;
                    }
                    if ($f >= count($this->squad)-1) {
                        $f = 0;
                    }
                    $dmg = $squad->getSquad()[$e]->giveDamage();
                        echo 'enemy attack with ' . $dmg . " damage<br>";
                    $this->squad[$f]->recieveDamage($dmg);
                }
                $this->checkIfDeathOne($f);


                if($this->checkForWin($squad)){
                    return true;
                }
                if ($e >= count($squad->getSquad())-1) {
                    $e = 0;
                }
                if ($f >= count($this->squad)-1) {
                    $f = 0;
                }

            } else {
                $dmg = $squad->getSquad()[$e]->giveDamage();
                 echo 'enemy attack with ' . $dmg . " damage<br>";
                $this->squad[$f]->recieveDamage($dmg);

                if ($this->checkIfDeathOne($f)) {


                    if($this->checkForWin($squad)){
                        return true;
                    }
                    if ($e >= count($squad->getSquad())-1) {
                        $e = 0;
                    }
                    if ($f >= count($this->squad)-1) {
                        $f = 0;
                    }
                    $dmg = $this->squad[$f]->giveDamage();
                     echo 'friend attack with ' . $dmg . " damage<br>";
                    $squad->getSquad()[$e]->recieveDamage($dmg);
                }
                $squad->checkIfDeathOne($e);


                if($this->checkForWin($squad)){
                    return true;
                }
                if ($e >= count($squad->getSquad())-1) {
                    $e = 0;
                }
                if ($f >= count($this->squad)-1) {
                    $f = 0;
                }
            }


            $e++;
            $f++;
            if ($e == count($squad->getSquad())) {
                $e = 0;
            }
            if ($f == count($this->squad)) {
                $f = 0;
            }
        }

    }

    private function checkForWin($squad)
    {
        if ($this->getSquad() === "squad is too small") {
            echo $this->fraction->getName() . ' is lose';
            return true;
        }
        if ($squad->getSquad() === "squad is too small") {
            echo $squad->getFraction()->getName() . ' is lose';
            return true;
        }
    }

    public function checkIfDeath()
    {
        foreach ($this->squad as $key => $unit) {
            if ($unit->getHp() <= 0) {
                echo $this->fraction->getName() . " [" . $key . "] is died<br>";
                $this->removeFromSquad($key);
            }
        }
    }

    public function checkIfDeathOne($index)
    {
        if ($this->squad[$index]->getHp() <= 0) {
            echo $this->fraction->getName() . " [" . $index . "] is died<br>";
            if ($index == 0) {
                $this->randomAchievment();
            }
            $this->removeFromSquad($index);
            return true;
        }
        return false;
    }

    public function addToSquad($warrior)
    {
        if (count($this->squad) > $this->maxsquad) {
            return "squad is too big";
        }

        $warrior->addBuf($this->fraction);
        $warrior->addBuf($this->achievments);
        array_push($this->squad, $warrior);
        return true;
    }

    public function removeFromSquad($index)
    {
        if (count($this->squad) < $this->minsquad) {
            return "squad is too small";
        }
        array_splice($this->squad, $index, 1);
        return true;
    }

    public function getCaptain()
    {
        return $this->squad[0];
    }

    public function setCaptain($index)
    {
        [[$this->squad[0]], [$this->squad[$index]] = [$this->squad[$index]], [$this->squad[0]]];
    }
}