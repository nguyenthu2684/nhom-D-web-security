<?php

require_once 'BaseModel.php';

class PostModel extends BaseModel
{

    public function findPostById($id)
    {
        $sql = 'SELECT * FROM posts WHERE post_id = ' . $id;
        $post = $this->select($sql);

        return $post;
    }

    public function findPost($keyword)
    {
        $sql = 'SELECT * FROM posts WHERE post_name LIKE %' . $keyword . '%' . ' OR user_email LIKE %' . $keyword . '%';
        $post = $this->select($sql);

        return $post;
    }

    /**
     * Authentication post
     * @param $postName
     * @param $postContent
     * @return array
     */
    public function auth($postName, $postContent)
    {
        $sql = 'SELECT * FROM posts WHERE post_name = "' . $postName . '" AND post_content = "' . $postContent . '"';

        $post = $this->select($sql);
        return $post;
    }

    /**
     * Delete post by id
     * @param $id
     * @return mixed
     */
    public function deletePostById($id)
    {
        $sql = 'DELETE FROM posts WHERE post_id = ' . $id;
        return $this->delete($sql);
    }
    /**
     * Delete post by id
     * @param $id
     * @return mixed
     */
    public function deletePostByIdAndUserID($post_id, $user_id)
    {
        // $user_id = , $user_id
        $sql = 'DELETE FROM posts WHERE post_id = "' . $post_id . '" AND ' . $_SESSION['id'] . '= "' . $user_id . '" ';
        return $this->delete($sql);
    }
    // ' . $input['user_id'] . ' 

    /**
     * Update post
     * @param $input
     * @return mixed
     */
    public function updatePost($input)
    {
        $sql = 'UPDATE posts SET 
                 post_name = "' . mysqli_real_escape_string(self::$_connection, $input['post_name']) . '", 
                 post_content="' . $input['post_content'] . '"
                WHERE post_id = ' . $input['post_id'];

        $post = $this->update($sql);

        return $post;
    }

    /**
     * Insert post
     * @param $input
     * @return mixed
     */
    public function insertPost($input)
    {
        $sql = "INSERT INTO `app_web1`.`posts` (`post_name`, `post_content`, `user_id`) VALUES (" .
            "'" . $input['post_name'] . "', '" . $input['post_content'] . "','" . $_SESSION['id'] .  "')";

        $post = $this->insert($sql);

        return $post;
    }

    /**
     * Search post
     * @param array $params
     * @return array
     */
    public function getPost($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM posts WHERE post_name LIKE "%' . $params['post_content'] . '%"';

            //Keep this line to use Sql Injection
            //Don't change
            //Example keyword: abcef%";TRUNCATE banks;##
            $posts = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM posts';
            $posts = $this->select($sql);
        }

        return $posts;
    }
}