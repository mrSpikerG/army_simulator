<?php

use ultimates\achievmentBase;

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

    public function recieveDamage($damage){
        $val = $this->damage/$this->deffence/5;
        //echo $val;
        $this->hp =  $this->hp-$damage*(1-$val);
    }
    public function giveDamage(){
        $val = rand($this->damage-$this->damage/10,$this->damage+$this->damage/10);
        return $val;
    }

    public function addBuf($bufs){
        foreach ($bufs as $item){
            if($item->getAttr()==="hp"){
                $this->hp = $this->hp*$item->getBuf();
            }
            if($item->getAttr()==="speed"){
                $this->speed = $this->speed*$item->getBuf();
            }
            if($item->getAttr()==="def"){
                $this->deffence = $this->deffence*$item->getBuf();
            }
            if($item->getAttr()==="damage"){
                $this->damage = $this->damage*$item->getBuf();
            }
        }
    }

    public function removeBuf($bufs){
        foreach ($bufs as $item){
            if($item->getAttr()==="hp"){
                $this->hp = $this->hp/$item->getBuf();
            }
            if($item->getAttr()==="speed"){
                $this->speed = $this->speed/$item->getBuf();
            }
            if($item->getAttr()==="def"){
                $this->deffence = $this->deffence/$item->getBuf();
            }
            if($item->getAttr()==="damage"){
                $this->damage = $this->damage/$item->getBuf();
            }
        }
    }

    /**
     * @return mixed
     */
    public function getHp()
    {
        return $this->hp;
    }
    public function __toString(): string
    {
        return "Warrior  (".$this->hp." hp) <br>speed: " .$this->speed."<br>damage: " .$this->damage."<br>def: " .$this->deffence ;
    }

}
?>