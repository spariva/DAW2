<?php

namespace Inputs;

class InputCheckbox extends AInput {

    private $options = [];

    function __construct($name, $data = null, ...$options) {
        $this->type = \Enum\Type::CHECKBOX->value;
        $this->options = $options;
        parent::__construct($name, $data);
    }

    function validar() {
        // hay que comprobar todas las opciones de forma individual
        foreach (($this->data == null)?[]:$this->data as $option) {
            if (!in_array($option, $this->options)) {
                $this->error[] = "$this->name no es válido";
                \Config\Form::$errors++;
                // para que no se repita el error, solo ocurra una vez
                break;
            }
        }
    }

    function imprimirInput() {
        // como el checkbox lo queremos guardar en un array ponemos en el name unos "[]"
?>
        <div><?= str_replace("_", " ", $this->name) ?>: <br>
            
            <?php foreach ($this->options as $option) :?>
                <label>
                    
                    <input type="<?= $this->type ?>" name="<?= $this->name ?>[]" value="<?= $option ?>" <?= in_array($option, ($this->data == null)? [] :$this->data)?'checked':'' ?> >
                    <?= $option ?>
                </label>
            <?php endforeach; ?>

            <?php parent::imprimirErrores() ?>

        </div>
<?php
    }
}