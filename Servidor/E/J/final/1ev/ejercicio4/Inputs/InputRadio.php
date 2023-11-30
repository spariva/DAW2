<?php

namespace Inputs;

class InputRadio extends AInput {

    function __construct($name, $data = null, ...$options) {
        $this->type = \Enum\Type::RADIO->value;
        $this->options = $options;
        parent::__construct($name, $data);
    }

    function validar() {
        
        if($this->data == null) {
            $this->error[] = "$this->name no puede estar vacío";
            \Config\Form::$errors++;
        } elseif(!in_array($this->data, $this->options)) {
            $this->error[] = "$this->data no es una opción válida";
            \Config\Form::$errors++;
        }

    }

    function imprimirInput() {
?>
        <div class="input">
            <?= str_replace("_", " ", $this->name) ?>: <br>
            
            <?php foreach ($this->options as $option) :?>
                <label>
                    
                    <input type="<?= $this->type ?>" name="<?= $this->name ?>" value="<?= $option ?>" <?= ($option == $this->data)?'checked':'' ?> >
                    <?= $option ?>

                </label>
            <?php endforeach; ?>

            <?php parent::imprimirErrores() ?>

        </div>
<?php
    }
}