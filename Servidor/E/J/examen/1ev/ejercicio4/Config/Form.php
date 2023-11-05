<?php

namespace Config;

class Form {
    public static $inputs;
    public static $errors;

    function __construct() {}
    
    public function crearInputs($POST) {
        new \Inputs\InputText("Nombre", $POST["Nombre"], 3, 20, "Nombre del queso");
        new \Inputs\InputText("Direccion", $POST["Direccion"], 3, 30, "Direccion de envios");
        new \Inputs\InputCheckbox("Extras", $POST["Extras"], "Caja madera", "Tarjeta regalo", "Envio urgente", "Panecillos", "Membrillo");
        // print_r(implode(", ",array_keys(self::$inputs)));
    }

    public function crearForm($action, $method) {

        if(isset($_GET['success'])) : ?>
            <div class="success">Gracias por su pedido</div>
<?php   endif;?>
        <form action="<?= $action ?>" method="<?= $method ?>">
            <?php
                foreach (self::$inputs as $input) {
                    $input->imprimirInput();
                }
            ?>
            
            <div class="input">
                <input type="submit" name="submit" value="submit">
            </div>
        </form>
<?php
    }

    public function validarForm() {
        foreach (self::$inputs as $input) {
            $input->validar();
        }
    }

    public function esValido() {
        return (self::$errors == 0);
    }
}