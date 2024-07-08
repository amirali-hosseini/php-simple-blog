<?php

require_once 'App/db.php';

$categories = $db->query("SELECT * FROM `categories` ORDER BY `id` DESC");

if (isset($_GET['category_id']) && is_numeric($_GET['category_id'])) {

    $articles = $db->prepare("SELECT * FROM `articles` WHERE `category_id` = :category_id ORDER BY `id` DESC");

    $articles->execute(['category_id' => $_GET['category_id']]);

} elseif (isset($_GET['q']) && is_string($_GET['q'])) {

    $articles = $db->prepare("SELECT * FROM `articles` WHERE `title` LIKE :query ORDER BY `id` DESC");

    $articles->execute(['query' => '%' . $_GET['q'] . '%']);

} else {

    $articles = $db->query("SELECT * FROM `articles` ORDER BY `id` DESC");

}

include_once __DIR__ . '/Views/index.php';
