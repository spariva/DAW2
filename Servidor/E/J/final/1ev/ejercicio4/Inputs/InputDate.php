<?php

namespace Inputs;

class InputDate extends AInput {
    
    private $mindate;
    private $maxdate;
    private $minage;
    private const MINDATE = "1980-01-01";
    private const MINAGE = 18;

    function __construct($name, $data, $minage = self::MINAGE ,$mindate = self::MINDATE){
        $this->type = \Enum\Type::DATE->value;
        $this->mindate = new \DateTime($mindate, new \DateTimeZone("Europe/Madrid"));
        $this->minage = $minage;
        $this->maxdate = new \DateTime("now", new \DateTimeZone("Europe/Madrid"));
        $this->maxdate->sub(new \DateInterval("P".$this->minage."Y"));
        parent::__construct($name, $data);
    }

    function validar() {
        parent::validar();

        // if($this->date == null) {
        //     $this->date = new \DateTime("now", new \DateTimeZone("Europe/Madrid"));
        // }

        $fecha = new \DateTime($this->data, new \DateTimeZone("Europe/Madrid"));

        if ($fecha > $this->maxdate || $fecha < $this->mindate) {
            $this->error[] = $fecha->format("Y-m-d")." no válida";
            \Config\Form::$errors++;
        }

    }

    function imprimirInput() {
?>
        <div class="input">
            <label><?= str_replace("_", " ", $this->name) ?>:
                
                <input type="<?= $this->type ?>" name="<?= $this->name ?>" min="<?= $this->mindate->format("Y-m-d") ?>" max="<?= $this->maxdate->format("Y-m-d") ?>" value="<?= ($this->data != null)?$this->data:'' ?>" required>
    
            </label>
            
            <?php parent::imprimirErrores() ?>

        </div>
<?php
    }
}