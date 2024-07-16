<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location:/login.php');
}

require_once '../App/db.php';

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    $delaete_category_query = $db->prepare("DELETE FROM `categories` WHERE `id` = :id");
    $delete_category_query->execute(['id' => $id]);

    header("Location: /Admin/categories_index.php");
}

$categories = $db->query('SELECT * FROM `categories` ORDER BY `id` DESC');

include_once __DIR__ . '/../Views/admin/categories/index.php';