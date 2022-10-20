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
     <?php include 'views/header.php'?>
    <div class="container">
     
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
                    <?php foreach ($posts as $post) {?>
                        <tr>
                            <th scope="row"><?php echo htmlentities( $post['post_id'], ENT_QUOTES, 'UTF-8', false);?></th>
                            <td>
                                <?php echo htmlentities ($post['title'], ENT_QUOTES, 'UTF-8', false);?>
                            </td>
                            <td>
                                <?php echo htmlentities ($post['content'], ENT_QUOTES, 'UTF-8', false);?>
                            </td>
                            <td>
                                <?php echo htmlentities ($post['user_id'], ENT_QUOTES, 'UTF-8', false);?>
                            </td>
                            <td>
                                <a href="form_user.php?id=<?php echo $user['id'] ?>">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true" title="Update"></i>
                                </a>
                                <a href="view_post.php?id=<?php echo $post['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true" title="View"></i>
                                </a>
                                <a href="delete_post.php?post_id=<?php echo $post['post_id']?> user_id=<?php echo $_SESSION['id']?>  ">
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