<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $_ENV['TITLE'] ?></title>

    <link rel="stylesheet" href="./css/main.css">
    <?= $css ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
    <?= $scripts ?>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary py-3 px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><h3 class="m-0">Linkenin</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-dropdown" aria-controls="navbar-dropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-lg-flex justify-content-lg-end" id="navbar-dropdown">
                <ul class="navbar-nav">
                    <li class="nav-item px-2">
                        <a class="nav-link active" aria-current="page" href="listado.php">Inicio</a>
                    </li>
                    <li class="nav-item px-2 dropdown">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle align-bottom"></i> <?= substr($_SESSION['usuario'] ?? 'invitado', 0, 10) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if(isset($_SESSION['usuario'])) : ?>
                                <li><a class="dropdown-item" href="edit.php">Perfil</a></li>
                                <li><a class="dropdown-item" href="logout.php">Cerrar sesión</a></li>
                            <?php else : ?>
                                <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
                                <li><a class="dropdown-item" href="registro.php">Registrate</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main id="contenido" class="container">       
        <?= $avisos ?> 
        <h1><?= $tituloPagina ?></h1>
        <?= $contenido ?>
    </main>
</body>
</html>