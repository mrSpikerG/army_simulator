<?php
abstract class itemBufBase {
    public $HPDebuf;
    public $SpeedDebuf;
    public $DamageDebuf;
    public $DeffenceBuf;
    public function __construct($hp,$speed,$damage,$def)
    {
        $this->DeffenceBuf=$def;
        $this->DamageDebuf=$damage;
        $this->SpeedDebuf=$speed;
        $this->HPDebuf=$hp;
    }
}
?>