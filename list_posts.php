<?php
// Start the session
session_start();

require_once 'models/PostModel.php';
$postModel = new PostModel();

$params = [];
if (!empty($_GET['keyword'])) {
    $params['keyword'] = $_GET['keyword'];
}

$posts = $postModel->getPost($params);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>

<body>
    <?php include 'views/header_post.php' ?>
    <div class="container">
        <?php if (!empty($posts)) { ?>
        <div class="alert alert-warning" role="alert">
            List of posts! <br>
            Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23 <br>
            UserID:
            <?php echo $_SESSION['id'];  ?>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) { ?>
                <tr>
                    <th scope="row"><?php echo htmlentities($post['post_id'], ENT_QUOTES, 'UTF-8', false); ?></th>
                    <td>
                        <?php echo htmlentities($post['post_name'], ENT_QUOTES, 'UTF-8', false); ?>
                    </td>
                    <td>
                        <?php echo htmlentities($post['post_content'], ENT_QUOTES, 'UTF-8', false); ?>
                    </td>
                    <td>
                        <?php echo htmlentities($post['user_id'], ENT_QUOTES, 'UTF-8', false); ?>
                    </td>
                    <td>
                        <a href="form_post.php?id=<?php echo $post['post_id'] ?>">
                            <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                        </a>
                        <a href="view_post.php?id=<?php echo $post['post_id'] ?>">
                            <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                        </a>
                        <a href="delete_post.php?post_id=<?php echo $post['post_id'] ?>">
                            <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="alert alert-dark" role="alert">
            This is a dark alert—check it out!
        </div>
        <?php } ?>
    </div>
</body>

</html>