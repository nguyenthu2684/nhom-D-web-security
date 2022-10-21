<?php
// Start the session
session_start();

require_once 'models/PostModel.php';
$postModel = new PostModel();

$posts = $postModel->getPosts();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include 'views/meta.php' ?>
</head>

<body>

    <?php include 'views/header.php' ?>
    <div class="container">
        <?php
        ?>
        <div class="alert alert-warning" role="alert">
            List of users! <br>
            Hacker: http://php.local/list_users.php?keyword=ASDF%25%22%3BTRUNCATE+banks%3B%23%23
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Tên bài viết</th>
                    <th scope="col">Nội dung bài viết</th>
                    <th scope="col">ID Người đăng</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post) { ?>
                    <tr>
                        <th scope="row"><?php echo ($post['post_id']); ?></th>
                        <td>
                            <?php echo ($post['title']); ?>
                        </td>
                        <td>
                            <?php echo ($post['content']); ?>
                        </td>
                        <td>
                            <?php echo ($post['user_id']); ?>
                        </td>
                        <td>
                            <a href="form_user.php?id=<?php echo $user['id'] ?>">
                                <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                            </a>
                            <a href="view_post.php?id=<?php echo $post['id'] ?>">
                                <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                            </a>
                            <a href="delete_post.php?post_id=<?php echo $post['post_id'] ?> token=<?php echo $token; ?>  ">
                                <i class="fa fa-eraser" aria-hidden="true" title="Delete"></i>
                            </a>

                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
       
    </div>
</body>
<?php

echo $_SESSION['id'];

?>

</html>