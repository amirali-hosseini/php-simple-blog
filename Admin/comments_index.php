<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location:/login.php');
}

require_once '../App/db.php';

if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    $delete_comment_query = $db->prepare("DELETE FROM `comments` WHERE `id` = :id");
    $delete_comment_query->execute(['id' => $id]);

    header("Location: /Admin/comments_index.php");

} elseif (isset($_GET['approve_id']) && is_numeric($_GET['approve_id'])) {

    $id = $_GET['approve_id'];

    $approve_comment_query = $db->prepare("UPDATE `comments` SET `status` = 1 WHERE `id` = :id");
    $approve_comment_query->execute(['id' => $id]);

    header("Location: /Admin/comments_index.php");

}

$comments = $db->query('SELECT * FROM `comments` ORDER BY `id` DESC');

include_once __DIR__ . '/../Views/admin/comments/index.php';