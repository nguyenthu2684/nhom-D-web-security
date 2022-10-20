<?php
session_start();

require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; //Add new user
$id = NULL;

$token = $_GET['token'];
if ($_SESSION['token_ss'] == $token ) {
    $id = $_GET['id'];
    $userModel->deleteUserById($id);//Delete existing user
}else{
    header('location: list_users.php');
}

// if (!empty($_GET['id'])) {
//     $id = $_GET['id'];
//     $userModel->deleteUserById($id);//Delete existing user
// }
header('location: list_users.php');
?>