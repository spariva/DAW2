<?php
    spl_autoload_register(function ($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    $form = new Config\Form();

    print_r($_POST['id']);
    if(isset($_POST['delete'])) {
        if (!empty($_POST['id']) && $form->deleteRegistros($_POST['id'])) {
            header("Location: listado.php?delete");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="main">
        <h3>Listado de registros</h3>
        <?php if(isset($_GET['delete'])) : ?>
            <div class="success">Se han borrado los registros correctamente</div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="list_options">
                <button name="delete" name="delete" value="delete"><i class="bi bi-trash3-fill"></i> Borrar</button>
            </div>
            <table>
                <tr>
                    <?php foreach ($form->getListado()[0] as $key => $fila) : ?>
                        <th><?= ($key != "id")?$key:'' ?></th>
                    <?php endforeach; ?>
                </tr>
    
                <?php foreach ($form->getListado() as $key => $fila) : ?>
                    <tr>
                        <?php foreach ($fila as $key => $campo) : ?>
                            <?php if($key == "id") : ?>
                                <td><input type="checkbox" name="id[]" id="id" value="<?= $campo ?>"></td>
                            <?php else: ?>
                                <td><?= $campo ?></td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        </form>

        <a href="./index.php">Inicio</a>
    </div>
</body>
</html>