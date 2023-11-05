<?php

session_start();

if (isset($_SESSION['usuario'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['grupo']);
}

header('Location: index.php');
