<?php

namespace Inputs;

define("SINGLE", 0);
define("MULTIPLE", 1);

class Select extends AInput {
    private $mode;
    private $options;

    function __construct($name, $data = null, $mode = SINGLE,...$options) {
        $this->type = \Enum\Type::SELECT->value;
        $this->options = $options;
        $this->mode = $mode;
        parent::__construct($name, $data);
    }

    function validar() {
        
        if($this->data == null) {
            $this->error[] = "$this->name no puede estar vacío";
            \Config\Form::$errors++;
        } else {
            // hay que comprobar todas las opciones de forma individual por si fuera multiple
            foreach ($this->data as $option) {
                if (!in_array($option, $this->options)) {
                    $this->error[] = "$this->name no es válido";
                    \Config\Form::$errors++;
                    // para que no se repita el error, solo ocurra una vez
                    break;
                }
            }
        }


    }

    function imprimirInput() {
        // como el select puede ser multiple lo queremos guardar en un array ponemos en el name unos "[]"
?>
        <div class="input">
            <?= str_replace("_", " ", $this->name) ?>: <br>
            
            <select name="<?= $this->name ?>[]" <?= ($this->mode)?'multiple':'' ?> >

                <?php foreach ($this->options as $option) :?>
                        <option value="<?= $option ?>" <?= in_array($option, ($this->data == null)? [] :$this->data)?'selected':'' ?> ><?= $option ?></option>
                <?php endforeach; ?>

            </select>
            
            <?php parent::imprimirErrores() ?>

        </div>
<?php
    }
}