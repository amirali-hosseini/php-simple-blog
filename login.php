<?php

session_start();

require_once 'App/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = [];

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $errors['email'] = 'The email input can\'t be empty.';
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $errors['password'] = 'The password input can\'t be empty.';
    }

    if (empty($errors)) {

        $get_user_query = $db->prepare("SELECT * FROM `users` WHERE `email` = :email AND `password` = :password");

        $get_user_query->execute(['email' => $email, 'password' => $password]);

        if ($get_user_query->rowCount()) {

            $user = $get_user_query->fetch(PDO::FETCH_ASSOC);

            $errors = [];

            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name'];

            header('Location: /Admin/index.php');

        } else {

            $errors['email'] = 'Something is wrong, please try again.';

        }

    }

}

include_once __DIR__ . '/Views/auth/login.php';