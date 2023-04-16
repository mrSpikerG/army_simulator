<?php


include_once __DIR__.'/../warriorBase.php';
include_once __DIR__.'/../items/living/horse.php';
class horseman extends  warriorBase
{

    protected $horse;
    public function __construct($armor,$weapon)
    {

        $itemArray=array(new horse(),$armor,$weapon);
        parent::__construct(100, 40, 40, 30,$itemArray);
    }

    public function recieveDamage($damage)
    {
        // TODO: Implement recieveDamage() method.
    }

    public function giveDamage($damage)
    {
        // TODO: Implement giveDamage() method.
    }
}
?>