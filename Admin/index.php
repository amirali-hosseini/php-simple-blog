<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location:/login.php');
}

include_once __DIR__ . '/../Views/admin/index.php';

?>