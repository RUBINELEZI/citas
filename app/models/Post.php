<?php


class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPost(){
        $this->db->query('SELECT *,
                              posts.id as postId,
                              users.id as userId,
                              posts.created_at as postCreated,
                              users.created_at as userCreated
                              FROM posts
                              INNER JOIN users
                              ON posts.user_id = users.id
                              ORDER BY posts.created_at DESC 
                                        ');

        $results =  $this->db->resultSet();

        return $results;
    }

    public function addPost($data){
        $this->db->query('INSERT INTO posts (title,post,user_id) VALUES (:title, :post,:user_id)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':post', $data['post']);
        $this->db->bind(':user_id', $data['user_id']);

        if ($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getPostById($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id' , $id);
        $row = $this->db->single();

        return $row;
    }
}