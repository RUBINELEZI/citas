<?php

class Post {
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProfilePostsById($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id' , $id);
        $row = $this->db->resultSet();

        return $row;
    }
}