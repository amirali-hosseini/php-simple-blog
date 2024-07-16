<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location:/login.php');
}

require_once '../App/db.php';

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

        $insert_category_query = $db->prepare("INSERT INTO `categories` (`title`,`slug`) VALUES (:title, :slug)");

        $insert_category_query->execute(['title' => $title, 'slug' => $slug]);

        $errors = [];

        header('Location: /Admin/categories_index.php');

    }

}

include_once __DIR__ . '/../Views/admin/categories/create.php';