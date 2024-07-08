<?php

if (isset($_GET['article_id']) && is_numeric($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
} else {
    header('Location: /index.php');
}

require_once 'App/db.php';

$categories = $db->query("SELECT * FROM `categories` ORDER BY `id` DESC");

$article = $db->prepare("SELECT * FROM `articles` WHERE `id` = :article_id");
$article->execute(['article_id' => $article_id]);

if (!$article->rowCount()) {
    header('Location: /index.php');
}

$article = $article->fetch(PDO::FETCH_ASSOC);

$article_category = $db->query("SELECT * FROM `categories` WHERE `id` = " . $article['category_id']);
$article_category = $article_category->fetch(PDO::FETCH_ASSOC);

$article_author = $db->query("SELECT `name` FROM `users` WHERE `id` = " . $article['user_id']);
$article_author = $article_author->fetch(PDO::FETCH_ASSOC);

/*
 * Getting related articles by searching the article title in the database.
 * Note: the current article will be removed from the related articles using the ID.
 */
$related_articles = $db->query("SELECT * FROM `articles` WHERE `title` LIKE " . "'%" . $article['title'] . "%'" . " AND NOT `id` = " . $article_id . " ORDER BY `id` DESC LIMIT 3");

include_once __DIR__ . '/Views/single.php';