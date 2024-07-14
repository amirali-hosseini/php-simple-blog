<?php

require_once '../App/db.php';

if (isset($_GET['article_id']) && is_numeric($_GET['article_id'])) {
    $article_id = $_GET['article_id'];
} else {
    header('Location: /index.php');
}

$categories = $db->query("SELECT * FROM `categories` ORDER BY `id` DESC");

$article = $db->prepare("SELECT * FROM `articles` WHERE `id` = :article_id");
$article->execute(['article_id' => $article_id]);

if (!$article->rowCount()) {
    header('Location: /Admin/index.php');
}

$article = $article->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (!empty($_POST['title'])) {
        $title = $_POST['title'];
    } else {
        $errors['title'] = 'The title input can\'t be empty.';
    }

    if (!empty($_POST['body'])) {
        $body = $_POST['body'];
    } else {
        $errors['body'] = 'The body input can\'t be empty.';
    }

    if (!empty($_POST['category_id'])) {
        $category_id = $_POST['category_id'];
    } else {
        $errors['category_id'] = 'The category ID input can\'t be empty.';
    }

    if (!empty($_FILES['image']['name'])) {

        $image = $_FILES['image'];
        $image_name = time() . '_' . $_FILES['image']['name'];

        $from = $image['tmp_name'];
        $to = '../Uploads/articles/' . $image_name;

        $image_upload_result = move_uploaded_file($from, $to);

        if (!$image_upload_result) {

            $errors['image'] = 'The image could not be uploaded.';

        }

    } else {

        $image_name = $article['image'];

    }

    if (!empty($_POST['status'])) {
        $status = $_POST['status'];
    } else {
        $status = $article['status'];
    }

    if (empty($errors)) {

        $insert_comment_query = $db->prepare("UPDATE `articles` SET `title` = :title,`body` = :body,`category_id` = :category_id,`image` = :image,`status` = :status WHERE `id` = :id");

        $insert_comment_query->execute(['title' => $title, 'body' => $body, 'category_id' => $category_id, 'image' => $image_name, 'status' => $status, 'id' => $article_id]);

        header('Location: /Admin/articles_index.php');

    }

}

include_once __DIR__ . '/../Views/admin/articles/edit.php';