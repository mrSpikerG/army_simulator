<?php

abstract class warriorBase
{

    protected $hp;
    protected $speed;
    protected $damage;
    protected $deffence;

    public function __construct($hp,$speed,$damage,$deffence,$items)
    {
        $this->hp = $hp;
        $this->speed=$speed;
        $this->damage=$damage;
        $this->deffence=$deffence;

        foreach ($items as $item) {
            $this->hp += $item->HPDebuf;
            $this->speed += $item->SpeedDebuf;
            $this->damage += $item->DamageDebuf;
            $this->deffence += $item->DeffenceBuf;
        }
    }

    public abstract function recieveDamage($damage);
    public abstract function giveDamage($damage);


    public function __toString(): string
    {
        return "Warrior  (".$this->hp." hp) <br>speed: " .$this->speed."<br>damage: " .$this->damage."<br>def: " .$this->deffence ;
    }

}
?>