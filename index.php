<?php

require_once 'App/db.php';

$query = "SELECT * FROM `categories` ORDER BY `id` DESC";

$categories = $db->query($query);

include_once __DIR__ . '/Views/index.php';
