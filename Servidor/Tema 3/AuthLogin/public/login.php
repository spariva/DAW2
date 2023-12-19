<?php

if (!isset($_SESSION['user'])) {
    if (isset($_COOKIE['rememberUser'])) {
        $_SESSION['rememberUser'] = $_COOKIE['rememberUser'];
    } else {

    header('Location: login.php');
    exit();
    }
}