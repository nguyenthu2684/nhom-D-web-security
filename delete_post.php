<?php
require_once 'models/PostModel.php';
$postModel = new PostModel();

$post = NULL; //Add new user
$post_id = NULL;
$user_id = null;

if (!empty($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    // $user_id = $_GET['user_id'];
    // $user_id = $_GET['user_id'];, $user_id)
    $postModel->deletePostByIdAndUserID($post_id); //Delete existing user
}
header('location: list_posts.php');