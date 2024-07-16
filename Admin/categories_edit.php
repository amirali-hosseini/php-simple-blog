<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location:/login.php');
}

require_once '../App/db.php';

if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
} else {
    header('Location: /index.php');
}

$category = $db->prepare("SELECT * FROM `categories` WHERE `id` = :category_id");
$category->execute(['category_id' => $category_id]);

if (!$category->rowCount()) {
    header('Location: /Admin/index.php');
}

$category = $category->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $errors['title'] = 'The title input can\'t be empty.';
    }

    if (!empty($_POST['slug'])) {
        $slug = $_POST['slug'];
    } else {
        $errors['slug'] = 'The slug input can\'t be empty.';
    }

    if (empty($errors)) {

        $insert_category_query = $db->prepare("UPDATE `categories` SET `title` = :title,`slug` = :slug WHERE `id` = :id");

        $insert_category_query->execute(['title' => $title, 'slug' => $slug, 'id' => $category_id]);

        header('Location: /Admin/categories_index.php');

    }

}

include_once __DIR__ . '/../Views/admin/categories/edit.php';