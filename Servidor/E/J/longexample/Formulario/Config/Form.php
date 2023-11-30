<?php

namespace Config;

class Form {
    public static $inputs;
    public static $errors;

    function __construct() {}
    
    public function crearInputs($POST) {
        new \Inputs\InputText("Nombre", $POST["Nombre"], 3, 20, "Nombre");
        new \Inputs\InputText("Apellidos", $POST["Apellidos"], 3, 30, "Apellidos");
        new \Inputs\InputRadio("Genero", $POST["Genero"], "Hombre", "Mujer");
        new \Inputs\InputNumber("Salario", $POST["Salario"], 400, 13000);
        new \Inputs\InputDate("Fecha_nacimiento", $POST["Fecha_nacimiento"], 18, "1920-01-01");
        new \Inputs\Select("Localidad", $POST["Localidad"], SINGLE, "Madrid", "Alcorcón", "Getafe");
        new \Inputs\InputText("Usuario", $POST["Usuario"], 3, 20, "Usuario");
        new \Inputs\InputMail("Email", $POST["Email"], "example@example.com", 40);
        new \Inputs\InputPassword("Contraseña", $POST["Contraseña"], 8, 16, "Contraseña");
        new \Inputs\InputCheckbox("Cursos", $POST["Cursos"], "ESO", "Bachillerato", "CFGB", "CFGM", "CFGS");
        new \Inputs\TextArea("Sobre_ti", $POST["Sobre_ti"]);
        // print_r(implode(", ",array_keys(self::$inputs)));
    }

    public function crearForm($action, $method) {

        if(isset($_GET['success'])) : ?>
            <div class="success">Usuario añadido con exito</div>
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

    public function guardarBBDD() {
        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare("INSERT INTO PracticaExamen (Nombre, Apellidos, Genero, Edad, FechaNacimiento, Localidad, Usuario, Email, Contrasenya, Cursos, SobreTi) VALUES (:nombre, :apellidos, :genero, :edad, :fecha_nacimiento, :localidad, :usuario, :email, :contrasenya, :cursos, :sobre_ti)");

        foreach (self::$inputs as $key => $input) {
            if ($input->getType() == \Enum\Type::CHECKBOX->value || $input->getType() == \Enum\Type::SELECT->value) {
                $stmt->bindValue($key, implode(";",($input->getData() == null)?[]:$input->getData()));
            } else if ($input->getType() == \Enum\Type::PASSWORD->value) {
                $stmt->bindValue($key, password_hash($input->getData(), PASSWORD_DEFAULT));
            } else if($input->getType() == \Enum\Type::MAIL->value) {
                $stmt->bindValue($key, $input->getData());
            } else {
                $stmt->bindValue($key, ucwords($input->getData()));
            }
        }

        $stmt->execute();
    }

    public function getListado() {
        $conn = Conn::singleton()->getConn();
        
        $stmt = $conn->query("SELECT id, Nombre, Apellidos, Genero, Edad, fechanacimiento as 'Fecha Nacimiento', Localidad, Usuario, Email, Cursos FROM PracticaExamen");
        
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function deleteRegistros($post) {
        $conn = Conn::singleton()->getConn();

        $stmt = $conn->prepare(sprintf("DELETE FROM PracticaExamen WHERE id IN (%s)", implode(", ",array_fill(0, count($post), "?"))));

        return $stmt->execute($post);
    }
}