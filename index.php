<?php

require_once 'App/db.php';

$categories = $db->query("SELECT * FROM `categories` ORDER BY `id` DESC");

$articles = $db->query("SELECT * FROM `articles` ORDER BY `id` DESC");

include_once __DIR__ . '/Views/index.php';
