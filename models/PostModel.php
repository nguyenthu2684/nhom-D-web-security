<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


require_once 'BaseModel.php';
require_once 'UserModel.php';
class PostModel extends BaseModel {

    public function findPostById($id) {
        $sql = 'SELECT * FROM posts WHERE id = '.$id;
        $post = $this->select($sql);

        return $post;
    }

  

    /**
     * Authentication user
     * @param $userName
     * @param $password
     * @return array
     */
    public function auth($title, $content, $user_id) {
        
        $sql = 'SELECT * FROM posts WHERE title = "' . $title . '" AND content = "'.$content. '" AND user_id = "'.$user_id.'"';

        $post = $this->select($sql);
        return $post;
    }

    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deletePostById($post_id) {
      	
        $sql = 'DELETE FROM posts WHERE post_id = " '.$post_id .' "AND user_id  = "'.$_SESSION['id']. '"' ;
       
        $result = $this->query($sql);
        return $result;
    }

    /**
     * Update user
     * @param $input
     * @return mixed
     */
    public function updateUser($input) {
        $sql = 'UPDATE users SET 
                 name = "' . mysqli_real_escape_string(self::$_connection, $input['name']) .'", 
                 password="'. md5($input['password']) .'"
                WHERE id = ' . $input['id'];

        $user = $this->update($sql);

        return $user;
    }

    /**
     * Insert user
     * @param $input
     * @return mixed
     */
    public function insertUser($input) {
        $sql = "INSERT INTO `app_web1`.`users` (`name`, `password`) VALUES (" .
                "'" . $input['name'] . "', '".md5($input['password'])."')";

        $user = $this->insert($sql);

        return $user;
    }

    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getPosts() {
        //Keyword
       
        //Keep this line to use Sql Injection
        //Don't change
        //Example keyword: abcef%";TRUNCATE banks;##
       
            $sql = 'SELECT * FROM posts';
            
            $posts = $this->select($sql);
       

        return $posts;
    }
}