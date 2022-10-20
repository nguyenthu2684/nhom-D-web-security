<?php

require_once 'models/PostModel.php';
$postModel = new PostModel();
require_once 'models/UserModel.php';

if (!empty($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    $postModel->deletePostById($post_id);
}


header('location: list_posts.php');
