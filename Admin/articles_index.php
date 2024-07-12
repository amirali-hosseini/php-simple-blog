<?php

require_once '../App/db.php';

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    $delete_article_query = $db->prepare("DELETE FROM `articles` WHERE `id` = :id");
    $delete_article_query->execute(['id' => $id]);

    header("Location: /Admin/articles_index.php");
}

$articles = $db->query('SELECT * FROM `articles` ORDER BY `id` DESC');

include_once __DIR__ . '/../Views/admin/articles/index.php';