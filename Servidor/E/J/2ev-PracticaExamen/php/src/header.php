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