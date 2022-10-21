<?php
session_start();
require_once 'models/PostModel.php';
$postModel = new PostModel();
require_once 'models/UserModel.php';

$token = md5($_SESSION['id']);
echo $token;
if (!empty($_GET['id'])) {
    if ($_GET['token'] == $token) {
      
        $post_id = $_GET['post_id'];
        $postModel->deletePostById($post_id);
    }
  
}
// if (!empty($_GET['post_id'])) {
//     $post_id = $_GET['post_id'];

//     $postModel->deletePostById($post_id);
// }


header('location: list_posts.php');
