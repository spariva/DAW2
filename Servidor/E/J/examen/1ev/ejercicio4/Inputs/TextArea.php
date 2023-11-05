<?php

namespace Inputs;

class TextArea extends AInput {
    
    function __construct($name, $data) {
        $this->type = \Enum\Type::TEXTAREA->value;
        parent::__construct($name, $data);
    }

    function validar() {
        parent::cleanData();
    }

    function imprimirInput() {
?>
        <div class="input">
            <?= str_replace("_", " ", $this->name) ?>: <br>
            <textarea name="<?= $this->name ?>"><?= $this->data ?></textarea>
        </div>
<?php
    }
}