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

    } else {
        $errors['image'] = 'The image input can\'t be empty.';
    }

    if (!empty($_POST['status'])) {
        $status = $_POST['status'];
    } else {
        $status = 0;
    }

    if (empty($errors)) {

        $from = $image['tmp_name'];
        $to = '../Uploads/articles/' . $image_name;

        $user_id = 1;

        $image_upload_result = move_uploaded_file($from, $to);

        if ($image_upload_result) {

            $insert_article_query = $db->prepare("INSERT INTO `articles` (`title`,`body`,`category_id`,`user_id`,`image`,`status`) VALUES (:title, :body, :category_id, :user_id, :image, :status)");

            $insert_article_query->execute(['title' => $title, 'body' => $body, 'category_id' => $category_id, 'user_id' => $user_id, 'image' => $image_name, 'status' => $status]);

            $errors = [];

            header('Location: /Admin/articles_index.php');

        } else {

            $errors['image'] = 'The image could not be uploaded.';

        }

    }

}

$categories = $db->query('SELECT * FROM `categories`');

include_once __DIR__ . '/../Views/admin/articles/create.php';