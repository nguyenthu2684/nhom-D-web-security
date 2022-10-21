<?php
// Start the session
session_start();
require_once 'models/PostModel.php';
$postModel = new PostModel();

$post = NULL; //Add new user
$post_id = NULL;

if (!empty($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $post = $postModel->findPostById($post_id); //Update existing user
}


if (!empty($_POST['submit'])) {

    if (!empty($post_id)) {
        $postModel->updatePost($_POST);
    } else {
        $postModel->insertPost($_POST);
    }
    header('location: list_posts.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Post form</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header.php' ?>
    <div class="container">

        <?php if ($post || !isset($post_id)) { ?>
        <div class="alert alert-warning" role="alert">
            Post form
        </div>
        <form method="POST">
            <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="post_name" placeholder="Name"
                    value='<?php if (!empty($post[0]['post_name'])) echo $post[0]['post_name'] ?>'>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input class="form-control" name="post_content" placeholder="Content"
                    value='<?php if (!empty($post[0]['post_content'])) echo $post[0]['post_content'] ?>'>
            </div>

            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php } else { ?>
        <div class="alert alert-success" role="alert">
            User not found!
        </div>
        <?php } ?>
    </div>
</body>

</html>